<template>
    <nav-bar-section :is_single_nav="true"></nav-bar-section>
    <hero-section :special_offer></hero-section>
  <!-- v-if="auctions.length > 0" -->
    <main-section
      
        :auctions="JSON.parse(JSON.stringify(this.auctions))"
        :is_loading_more="inline_loading"
        @loadMore="fetchAuctions"
        @fetchData="loadMore"
    ></main-section>
    <fixed-buttons></fixed-buttons>
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
            categories: [],
            special_offer: null,
            localUrl: "auctions",
            spUrl: "special_offer",
            searchUrl: "auctions/search",
            filterUrl: "auctions/filter",
           
            is_loading: false,
            inline_loading: false,
            skip: 0,
            take: 3,
        };
    },
    computed: {
        ...mapGetters(["baseUrl", "storedAuctions", "findAuction"]),
    },
    methods: {
        ...mapActions([
            "setAuctions",
            "setSingleAuction",
            "setBiddingQueues",
            "setSingleBiddingQueue",
        ]),
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
                    console.log(this.special_offer);
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
                    current_price: this.auctions[i].current_price,
                    timer: this.auctions[i].timer,
                    status: this.auctions[i].status,
                });
                queues.push(this.auctions[i].bidding_queues);
            }
            this.setAuctions(data);
            this.setBiddingQueues(queues);
        },

        searchAuctions(val) {
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
                    this.auctions = response.data.data;
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
                sort_by:filters.sortBy,
                min:filters.min,
                max:filters.max,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.filterUrl,
                data: body,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    console.log(response)
                    this.auctions = response.data.data;
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});

        },
    },
    created() {
        this.fetchAuctions();
        this.fetchSpecialOffer();
    },
    mounted() {
        // receiving global emit
        this.emitter.on("search-auctions", (value) => {
            this.searchAuctions(value);
        });
        this.emitter.on("filter-auctions", (value) => {
            this.filterAuctions(value);
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
