<template>
    <div>
        <nav-bar-section :is_single_nav="true"></nav-bar-section>
        <hero-section :special_offer></hero-section>
        <!-- v-if="auctions.length > 0" -->

        <main-section
            :test_auctions="test_auctions"
            :is_loading_more="inline_loading"
            @loadMore="fetchAuctions"
            @fetchData="loadMore"
        ></main-section>
        <fixed-buttons></fixed-buttons>
    </div>
</template>
<script>
import heroSection from "../../../components/auctions/hero.vue";
import navBarSection from "../../../components/global/navbar.vue";

import mainSection from "../../../components/auctions/mainSection.vue";
import fixedButtons from "../../../components/utilities/fixedButtons.vue";
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {
            auctions: [],
            test_auctions: [],
            categories: [],
            special_offer: null,
            localUrl: "auctions",
            spUrl: "special_offer",
            searchUrl: "auctions/search",
            filterUrl: "auctions/filter",
            submitbBidFromBuddyUrl: "auction/bidding/storeBidBuddyBid",

            is_loading: false,
            inline_loading: false,
            skip: 0,
            take: 3,
            test_val: 0,
        };
    },
    computed: {
        ...mapGetters([
            "baseUrl",
            "storedAuctions",
            "findAuction",
            "findBiddingQueue",
            
        ]),
    },
    methods: {
        ...mapActions([
            "setAuctions",
            "setSingleAuction",
            "setBiddingQueues",
            "setSingleBiddingQueue",
            "addAuction",
            "addBiddingQueue",
        ]),
        
        connect() {
            let vm = this;
            window.Echo.channel("my-channel")
                .listen(".my-event", (e) => {
                    // listening for user direct submit bid
                    vm.upadteAnAuctionState(e.data);

                    console.log(e);
                })
                .listen(".auto-bidding-event", (e) => {
                    // listening for bidbuddy submit bid
                    console.log("auto bidding is running");
                    // loop for updating every incomming bid budy's bid
                    for (let i = 0; i < e.data.length; i++) {
                        vm.upadteAnAuctionState(e.data[i]);
                    }
                })
                .listen(".win-event", (e) => {
                    // listening for bidbuddy submit bid
                    console.log("winner");
                    console.log(e);

                    vm.upadteAnAuctionState(e.data);

                    console.log("******** we have a winner ***********");
                    console.log(e);
                });
        },
        disconnect() {
            window.Echo.leave("my-channel");
        },
        loadMore() {
            this.inline_loading = true;
            this.skip = this.auctions.length;
            //           setTimeout(() => {

            // }, 300);
            this.fetchAuctions(1);
        },
        fetchAuctions(loading_more = 0) {
            if (!loading_more) this.is_loading = true;
            var url = this.baseUrl + this.localUrl;
            // if (this.$route.query.page) {
            url = url + "?skip=" + this.skip + "&take=" + this.take;
            // }

            axios
                .get(url)
                .then((response) => {
                    console.log(response)
                    if (loading_more) {
                        // attach to the end of existing array

                        this.auctions = this.auctions.concat(
                            response.data.data
                        );
                    } else {
                        this.auctions = response.data.data;
                    }

                    // console.log(JSON.parse(  JSON.stringify(this.auctions)));
                    this.saveAuctions();
                })
                .catch((error) => {
                    throw error.response.data.message;
                })
                .finally(() => {
                    // always executed

                    this.is_loading = false;
                    this.inline_loading = false;
                });
        },

        fetchSpecialOffer() {
            this.is_loading = true;
            var url = this.baseUrl + this.spUrl;

            axios
                .get(url)
                .then((response) => {
                    this.special_offer = response.data.data;
                })
                .catch((error) => {
                    throw error;
                })
                .finally(() => {
                    // always executed

                    this.is_loading = false;
                });
        },

        // save in store
        saveAuctions() {
            let data = [];
            let queues = [];

            for (let i = 0; i < this.auctions.length; i++) {
                data.push({
                    id: this.auctions[i].id,
                    current_winner_id: this.auctions[i].current_winner_id,
                    current_winner_username:
                        this.auctions[i].current_winner.username,
                    current_price: this.auctions[i].current_price,
                    timer: this.auctions[i].timer,
                    status: this.auctions[i].status,
                });
                queues.push(this.auctions[i].bidding_queues);
            }
            this.setAuctions(data);
            this.setBiddingQueues(queues);
        },
        // for user direct bid
        upadteAnAuctionState(item) {
            // add 10 seccound to now
            // var t = new Date();
            // t = t.setSeconds(t.getSeconds() + 10);
            // item.timer = t;

            this.setSingleAuction(item);
            var next_queue = item.bidding_queues;
            if (item.bidding_queues === null) {
                next_queue = {
                    auction_id: item.id,
                    is_empthy: true,
                };
            }
            // this.setSingleBiddingQueue(next_queue);

            // firing emit to all auction indexes

            // this.emitter.emit("update-live-auction", item);
        },

        searchAuctions(val) {
            console.log("searching...");
            const body = {
                search: val,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.searchUrl,
                data: body,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    console.log(response);
                    this.auctions = response.data.data;
                    this.test_auctions = this.auctions;

                    this.saveAuctions();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});
        },
        filterAuctions(filters) {
            const body = {
                category_id: filters.category_id,
                sort_by: filters.sortBy,
                min: filters.min,
                max: filters.max,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.filterUrl,
                data: body,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    this.auctions = response.data.data;
                    this.test_auctions = this.auctions;

                    this.saveAuctions();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});
        },
        endAuction(id) {
            let bidding_queue = this.findBiddingQueue(id);
            console.log(bidding_queue);

            // check to see if there is bid buddy
            if (bidding_queue != null) {
                console.log("running bid");
                this.runBidBudies(bidding_queue, id);
            } else {
                console.log("we have a winner");
            }
        },
        runBidBudies(bidding_queue, auction_id) {
            if (!bidding_queue)
                bidding_queue = this.findBiddingQueue(auction_id);
            if (bidding_queue.is_empthy) {
                alert("your bot is done");
                return;
            }

            axios
                .post(this.baseUrl + this.submitbBidFromBuddyUrl, {
                    bid_buddy_id: bidding_queue.bid_buddy_id,
                    auction_id: bidding_queue.auction_id,
                    bidding_queue_id: bidding_queue.id,
                })
                .then((response) => {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
        },
        
    },
    created() {
        this.fetchAuctions();
        this.fetchSpecialOffer();
    },
    beforeDestroy() {
        this.disconnect();
    },
    mounted() {
        this.connect(); //connect to Pusher
        setTimeout(() => {
            this.test_auctions = this.auctions;
        }, 1000);
        // receiving global emit
        this.emitter.on("search-auctions", (value) => {
            this.searchAuctions(value);
        });
        this.emitter.on("filter-auctions", (value) => {
            this.filterAuctions(value);
        });
        this.emitter.on("live_timer_end", (auction_id) => {
            this.endAuction(auction_id);
        });
       
    },
    watch: {
        $route(to, from) {
            // check to see if rout is correct
            if (to.name != "auctions") return;
            //then
            this.fetchAuctions();
            // react to route changes...
        },
    },

    components: {
        heroSection,
        fixedButtons,
        mainSection,
        navBarSection,
    },
};
</script>
<style lang="scss" scoped></style>
