<template>
    <div>
        <single-nav></single-nav>

        <bread-crumps
            v-bind:history="history"
            :current="current"
        ></bread-crumps>
        <div class="index-container flex">
            <div class="main-section">
                <div class="first-section flex">
                    <div class="gallery-container">
                        <div class="header flex flex-col">
                            <h2>{{ product.title }}</h2>
                            <h3>
                                {{ product.short_desc }}
                            </h3>
                            <p>buy it now for ${{ product.price }}</p>
                        </div>
                        <div class="gallery">
                            <div class="slider">
                                <div
                                    v-for="(item, index) in product.galleries"
                                    class="slide"
                                >
                                    <img :src="'/storage/' + item.image" />
                                    <!-- <p>rutrum tellus a tempus :)</p> -->
                                </div>
                            </div>
                            <button id="next_slide">
                                <ion-icon name="fastforward"></ion-icon>
                            </button>
                        </div>
                    </div>
                    <div class="kernel-container flex flex-col">
                        <div class="tags flex">
                            <div
                                @click="toggleBookmark()"
                                v-if="
                                    check_bookmark_status(
                                        auction.bookmarks,
                                        user
                                    )
                                "
                                class="icon-container"
                            >
                                <ion-icon
                                    class="saved"
                                    name="bookmark"
                                ></ion-icon>
                                <p>Remove Bookmark</p>
                            </div>
                            <div
                                @click="toggleBookmark()"
                                v-else
                                class="icon-container"
                            >
                                <ion-icon
                                    class="not-saved"
                                    name="bookmark"
                                ></ion-icon>
                                <p>Bookmark Auction</p>
                            </div>
                            <div class="icon-container">
                                <ion-icon name="lock"></ion-icon>
                                <p>
                                    ${{ auction.no_jumper_limit }} No Jumper
                                    Limit
                                </p>
                            </div>
                        </div>
                        <div class="kernel">
                            <div
                                class="k-header flex justify-between items-center"
                            >
                                <h2>Current Bid</h2>
                                <!-- <h2 class="price">${{ auction.current_price }}</h2> -->
                                <h2
                                    :key="
                                        findAuctionInStore(auction.id)
                                            .current_price
                                    "
                                    class="price mycolor"
                                >
                                    ${{
                                        findAuctionInStore(auction.id)
                                            .current_price
                                    }}
                                </h2>
                            </div>
                            <div class="current-winner-section">
                                <div class="size">
                                    <div class="pic-container">
                                        <div class="border-wrap">
                                            <img
                                                class="user_img"
                                                :src="
                                                    '/storage/' +
                                                    current_winner.profile_pic
                                                "
                                            />
                                        </div>
                                    </div>
                                    <div class="winner-info">
                                        <!-- <h3>{{ current_winner.username }}</h3> -->
                                        <h3
                                            :key="
                                                findAuctionInStore(auction.id)
                                                    .current_winner_username
                                            "
                                            class="mycolor"
                                        >
                                            {{
                                                findAuctionInStore(auction.id)
                                                    .current_winner_username
                                            }}
                                        </h3>
                                        <h4>Current Heighest bidder</h4>
                                        <h4>
                                            <ion-icon name="pin"></ion-icon>
                                            <!-- {{ current_winner.city.name }} -->
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="history-section">
                                <div class="flex flex-col">
                                    <div
                                        class="overflow-x-auto sm:-mx-6 lg:-mx-8"
                                    >
                                        <div
                                            class="relative inline-block min-w-full py-2 sm:px-6 lg:px-8"
                                        >
                                            <div class="tabel-mask">.</div>
                                            <div
                                                class="tabel-container overflow-hidden"
                                            >
                                                <table
                                                    class="min-w-full text-left text-sm font-light"
                                                >
                                                    <thead
                                                        style="
                                                            background-color: #2e1a58cc;
                                                        "
                                                        class="tabel-header border-b bg-neutral-500 font-medium dark:border-neutral-500"
                                                    >
                                                        <tr>
                                                            <th
                                                                scope="col"
                                                                class="px-6 py-4"
                                                            >
                                                                Bid
                                                            </th>
                                                            <th
                                                                scope="col"
                                                                class="px-6 py-4"
                                                            >
                                                                User
                                                            </th>
                                                            <th
                                                                scope="col"
                                                                class="px-6 py-4"
                                                            >
                                                                Time
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            v-for="(
                                                                item, index
                                                            ) in all_participaints"
                                                            class="tabel-row bg-neutral-100 dark:border-neutral-500"
                                                        >
                                                            <td
                                                                class="whitespace-nowrap"
                                                            >
                                                                ${{
                                                                    item.bid_price
                                                                }}
                                                            </td>
                                                            <td
                                                                class="whitespace-nowrap"
                                                            >
                                                                {{
                                                                    item.user
                                                                        .username
                                                                }}
                                                            </td>
                                                            <td
                                                                class="whitespace-nowrap"
                                                            >
                                                                {{
                                                                    item.created_at
                                                                }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timer-section">
                                <h3>Time Left</h3>
                                <div class="auction-timer">
                                    <vue-countdown
                                        @end="endAuction(auction.id)"
                                        :time="
                                            convertDateToMilliSeconds(
                                                findAuctionInStore(auction.id)
                                                    .timer
                                            )
                                        "
                                        v-slot="{ hours, minutes, seconds }"
                                    >
                                        <div class="count-down">
                                            <div class="number">
                                                {{ hours }}
                                            </div>
                                            <div class="seperator">:</div>
                                            <div class="number">
                                                {{ minutes }}
                                            </div>
                                            <div class="seperator">:</div>
                                            <div class="number">
                                                {{ seconds }}
                                            </div>
                                        </div>
                                        <!-- to sent backend for calculating heighest bidder time -->
                                        <!-- Timer: {{ remaining_seccounds =seconds +1}} how to do that with vue-countdown? -->
                                    </vue-countdown>
                                </div>
                            </div>
                            <div
                                class="btn-container flex justify-between items-center"
                            >
                                <button
                                    v-if="!disable_bidding"
                                    @click="submitBid()"
                                    class="bid-now"
                                >
                                    Bid
                                </button>

                                <div class="flex">
                                    <button
                                        @click="submitBiBuddy()"
                                        class="launch-buddy"
                                    >
                                        Lunch Buddy
                                    </button>
                                    <input
                                        type="number"
                                        v-model="bidBodyCount"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- users -->
                <users-section :participaints :winners></users-section>
                <product-content :product></product-content>
                <reviews-section :product_id="product.id"></reviews-section>
            </div>
            <side-section :auctions="side_auctions"></side-section>
        </div>
        <fixed-buttons></fixed-buttons>
        <loading :is_loading="is_loading"></loading>
    </div>
</template>
<script>
import singleNav from "../../../components/global/singleNav.vue";
import usersSection from "../../../components/auctions/index/users_section.vue";
import productContent from "../../../components/auctions/index/product_content.vue";
import sideSection from "../../../components/auctions/index/side_section.vue";
import reviewsSection from "../../../components/auctions/index/reviews.vue";
import breadCrumps from "../../../components/global/breadCrumps.vue";
import { init_elastic_slider } from "@/modules/utilities/elastic_slider.js";
import fixedButtons from "../../../components/utilities/fixedButtons.vue";
import { check_bookmark_status } from "@/modules/utilities/auctionUtils.js";
import { mapGetters, mapActions } from "vuex";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import { useToast } from "vue-toastification";
import { convertDateToMilliSeconds } from "@/modules/utilities.js";
export default {
    setup() {
        // Get toast interface
        const toast = useToast();

        return { toast };
    },
    data() {
        return {
            history: [
                {
                    name: "Home",
                    url: "/vue/v1",
                },
                {
                    name: "Auctions",
                    url: "/vue/v1/auctions",
                },
            ],
            updateBookmarkUrl: "bookmark/toggle",
            current: "Index",
            fetchUrl: "auctions/index",
            auction: null,
            product: null,
            bidBodyCount: 0,
            current_winner: null,
            side_auctions: [],
            participaints: [],
            all_participaints: [],
            winners: [],
            // comments: [],
            is_loading: false,
            text: null,
            richText: {
                ops: [
                    { insert: "Gandalf", attributes: { bold: true } },
                    { insert: " the " },
                    { insert: "Grey", attributes: { color: "#cccccc" } },
                ],
            },
            message: "",
            seconds: 0,
            remaining_seccounds: 0,
            bidBodyCount: 0,

            disable_bidding: false,
            //   localUrl: "auctions/",

            bidUrl: "auction/bidding/create",
            CreateBuddyUrl: "auction/bidding/storeBidBuddy",
            submitbBidFromBuddyUrl: "auction/bidding/storeBidBuddyBid",
        };
    },
    computed: {
        ...mapGetters([
            "baseUrl",
            "user",
            "UserAuthToken",
            "findBiddingQueue",
            "storedAuctions",
            "findAuction",
        ]),
    },
    components: {
        fixedButtons,
        singleNav,
        breadCrumps,
        usersSection,
        productContent,
        reviewsSection,
        sideSection,
        QuillEditor,
    },
    methods: {
        check_bookmark_status,
        convertDateToMilliSeconds,

        ...mapActions([
            "setSingleAuction",
            "setSingleBiddingQueue",
            "addAuction",
            "addBiddingQueue",
        ]),
        connect() {
            let vm = this;
            window.Echo.channel("my-channel")
                .listen(".my-event", (e) => {
                    // vm.updateAuction(e.data);
                    console.log("new auction data");
                    console.log(e);
                })
                .listen(".test-event", (e) => {
                    return;
                });
        },
        disconnect() {
            window.Echo.leave("my-channel");
        },
        findAuctionInStore(id) {
            return this.findAuction(id);
        },
        // updateAuction(data){
        // //   console.log('incommming update')
        // //   console.log(data)
        // //     if(this.auction.id == data.id){
        // //         // this is currect data

        // //         console.log(this.storedAuctions)
        // //     }
        // },
        generateRichText(data) {
            var d = JSON.parse(data);

            var contents = [];
            for (var i = 0; i < d.ops.length; i++) {
                if (d.ops[i].insert === null) {
                    // continue;
                    contents.push({
                        insert: "\n",
                        attributes: d.ops[i].attributes,
                    });
                } else if (d.ops[i].attributes === undefined) {
                    contents.push({
                        insert: d.ops[i].insert,
                    });
                } else if (
                    d.ops[i].insert === null ||
                    d.ops[i].attributes === undefined
                ) {
                    contents.push({
                        insert: "\n",
                    });
                } else {
                    contents.push({
                        insert: d.ops[i].insert,
                        attributes: d.ops[i].attributes,
                    });
                }
            }
            console.log("contents");
            console.log(contents);
            this.text = contents;
        },
        fetchData() {
            this.is_loading = true;
            var url = this.fetchUrl;
            var body = {
                id: this.$route.params.id,
            };

            axios({
                method: "post",
                url: url,
                data: body,
            })
                .then((response) => {
                    this.auction = response.data.auction;
                    this.product = this.auction.product;

                    this.generateRichText(this.product.description);
                    this.current_winner = this.auction.current_winner;
                    this.side_auctions = response.data.side_auctions;
                    this.participaints = response.data.participaints;
                    this.all_participaints = response.data.all_participaints;
                    this.winners = response.data.winners;

                    var store_data = {
                        id: this.auction.id,
                        current_winner_id: this.auction.current_winner_id,
                        current_winner_username:
                            this.auction.current_winner.username,
                        current_price: this.auction.current_price,
                        timer: this.auction.timer,
                        status: this.auction.status,
                    };
                    this.addBiddingQueue(this.auction.bidding_queues);
                    this.addAuction(store_data);
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },

        
        submitBid() {
            // sending user bid
            // validate so only auth users can submit bids
            if (this.user.id === undefined || this.user.id === null) {
                this.toast.error("You must be loged in to Bid");
                return;
            }
            const body = {
                auction_id: this.auction.id,
                remaining_time: this.remaining_seccounds,
                user_id: this.user.id,
            };

            axios
                .post(this.baseUrl + this.bidUrl, body, {
                    Accept: "application/json",
                })
                .then((response) => {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    // always executed
                });
        },
       
        toggleBookmark() {
            let config = {
                Authorization: this.UserAuthToken,
            };
            const body = {
                auction_id: this.auction.id,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.updateBookmarkUrl,
                data: body,
                headers: config,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    console.log(response);
                    this.fetchData();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});
        },
        // edning auction event are now proccessing from both index and list page
        // TODO make end auction login in single file for all components

        endAuction(id) {
            return;
            let bidding_queue = this.findBiddingQueue(id);
            console.log(id);

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
        submitBiBuddy() {
            if (this.user.id === undefined || this.user.id === null) {
                this.toast.error("You must be loged in to Activate BidBuddy");
                return;
            }
            if(this.bidBodyCount <= 1){
                this.toast.error("Insufficient Number Of Bids");
                return;
            }
            axios
                .post(this.baseUrl + this.CreateBuddyUrl, {
                    count: this.bidBodyCount-1,// first bid will be excuted as direct bid and after that with buddy
                    user_id: this.user.id,
                    auction_id: this.auction.id,
                })
                .then((response) => {
                    console.log(response.data);
                    this.bidBodyCount=0;
                    // after submitting buddy run one bid for user as direct bid to start bidding process
                    this.submitBid();
                })
                .catch( (error)=> {
                    console.log(error);
                    this.toast.error(error.response.data.error);
                })
                .finally(()=> {
                    // always executed
                });
        },
        //     live_countDown_ended(id){
        //       console.log('emitting from auction index:' + id)
        //       this.emitter.emit("live_timer_end", id);
        //    }
    },
    beforeDestroy() {
        this.disconnect();
    },
    mounted() {
        // this.connect(); //connect to Pusher
        // Elastic Slider (c) 2014 // Taron Mehrabyan // Ruben Sargsyan
        init_elastic_slider();

        // listening to event after pusher on auction list recieved new data
        // this.emitter.on("update-live-auction", (value) => {
        //     this.updateAuction(value);
        // });
    },
    created() {
        // alert(this.$route.params.id)
        this.fetchData();
    },
    watch: {
        // sec is from old component
        seconds(val) {
            console.log("new seccound: " + val);
        },
        $route(to, from) {
            // check to see if rout is correct
            if (to.name != "auction-index") return;

            //then
            // this.fetchData();
            // react to route changes...
        },
    },
};
</script>
<style lang="scss" scoped>
.index-container {
    min-height: 70vh;
    width: 100%;
}

.main-section {
    width: 75%;
}
.mycolor {
    animation: flash_change 1s;
}
.first-section {
    margin-bottom: 3rem;
    padding-bottom: 3rem;
    border-bottom: 1.5px solid #777;
}
.tabel-mask {
    height: 14rem;
    position: absolute;
    width: auto;
    left: 2rem;
    right: 2rem;
    background: linear-gradient(
        180deg,
        rgba(93, 24, 249, 0.13351278011204482) 39%,
        rgba(229, 229, 224, 1) 100%
    );
}
.gallery-container {
    width: 50%;
    position: relative;
    padding: 0 2rem;

    .gallery {
        height: 40rem;
        width: auto;
        position: relative;
        margin-top: -4rem;

        button {
            position: absolute;
            padding: 0.5rem 2rem;
            bottom: 0;
            left: 37%;
            box-shadow: 0 2px 8px #333;
            border-radius: 50px;
            display: flex;
            transition: all 0.5s ease;
            color: #261749;
            z-index: 3;

            ion-icon {
                font-size: 2.5rem;
            }
        }

        button:hover {
            background-color: #261749;
            color: #fff;

            ion-icon {
                color: #fff;
            }
        }
    }

    .header {
        color: #221d37de;
        padding: 4rem 0 0 3rem;
        gap: 1rem;

        h2 {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            margin-bottom: 1.5rem;
        }

        h3 {
            font-size: 1.3rem;
            letter-spacing: 0.5px;
            font-weight: 500;
        }
    }
}

.kernel-container {
    padding: 0 2rem;
    width: 50%;

    .tags {
        justify-content: right;
        align-items: center;
        text-align: center;
        gap: 3rem;
        padding-top: 4rem;
        color: #35334c;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        .icon-container {
            ion-icon {
                font-size: 2.7rem;
                cursor: pointer;
            }

            .not-saved {
                color: #aaa;
                cursor: pointer;
                transition: all 0.3s ease;
            }
        }
    }

    .kernel {
        margin-top: 1.5rem;
        box-shadow: 0 2px 20px #3b2670;
        padding: 0 2rem;
        border-radius: 20px;
        border: 1px solid #fff;
        background-color: #e3e3e3a3;
        z-index: 9;
        .k-header {
            padding: 1.5rem 0.5rem;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            border-bottom: 1.8px solid #999;
            color: #261749;

            .price {
                color: #5dd01c;
            }
        }
    }
}

.auction-kernel-container {
}

.participaints {
}

.product-info-container {
}

.reviews-container {
}

.tabel-row {
    td {
        padding: 0.4rem;
        padding-left: 1.3rem;
    }
}

.tabel-container {
    border-radius: 10px;
    // width: 90%;
    margin: auto;
    height: 14rem;
    overflow: hidden;
}

.tabel-header {
    tr {
        th {
            color: #fff;
        }
    }
}

.size {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 1rem;
    padding-left: 0.6rem;
    margin-bottom: 1rem;
    border-bottom: 1.8px solid #999;
    padding-bottom: 0.8rem;

    h3 {
        color: #4838ab;
        margin-right: 10px;
        letter-spacing: 1px;
        font-size: 1.6rem;
        font-weight: 600;
    }

    h4 {
        color: #444;
        margin-right: 10px;
        letter-spacing: 0.7px;
        font-size: 1rem;
        font-weight: 500;
    }
}

.pic-container {
    position: relative;
    display: flex;
    justify-content: flex-start;
    gap: 0.5rem;
    flex-direction: column;
    align-items: center;
    margin-bottom: 1rem;

    .title {
        // padding-top: 1.5rem;
        z-index: 1;

        .name {
            font-size: 1.1rem;
            color: #fff;
            font-weight: 500;
        }

        .winner {
            font-size: 0.8rem;
            color: #ddd;
        }
    }

    .border-wrap {
        background: linear-gradient(to right, rgb(99 80 215), rgb(236 236 236));

        border-radius: 100px;

        .user_img {
            width: 9rem;
            border-radius: 200px;
            height: 9rem;
            filter: grayscale(100%);
            box-shadow: 0 3px 5px rgb(115 114 114);
            color: white;
            padding: 0.15rem;
            text-align: center;
        }
    }

    .quote-icon {
        opacity: 0.071;
        position: absolute;
        top: 0;
        right: -1rem;
        width: 5rem;
        height: 5rem;
    }
}

.winner-info {
    text-align: left;
    padding-left: 0.7rem;
    line-height: 2;
}

.timer-section {
    margin-top: 1rem;
    border-bottom: 1px solid #888;
    padding-bottom: 1rem;

    h3 {
        font-size: 1rem;
        font-weight: 600;
        color: #210000;
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .auction-timer {
        .count-down {
            margin-left: 20%;

            .number {
                background-color: #77141f;
                box-shadow: inset 0px 5px 9px 0px #f00;
            }
        }
    }
}

.btn-container {
    margin: 2rem 0;

    button {
        padding: 1.2rem 3rem;
        background-color: #372065;
        border-radius: 15px;
        color: #fff;
        font-size: 1.3rem;
        font-weight: 500;
        transition: all 0.5s ease;
    }

    button:hover {
        transform: scale(0.95);
        box-shadow: 0 8px 15px #997add;
        border-radius: 35px;
    }
}

.history-section {
    border-bottom: 1px solid #888;
    padding-bottom: 1rem;
}

.auction-timer {
    margin: auto;

    .count-down {
        display: flex;
        gap: 0.1rem;
        text-align: center;
        padding: 0.6rem 1rem;
        // border: 1px solid;
        width: 85%;
        margin: auto;

        .number {
            border-radius: 9px;
            font-weight: 600;
            background-color: var(--color-primary);
            color: #fff;
            padding: 1rem;
            width: 4.5rem;
            font-size: 1.3rem;
        }

        .seperator {
            padding: 0.5rem;
            color: var(--color-primary);
            font-weight: 600;
        }
    }
}
</style>
