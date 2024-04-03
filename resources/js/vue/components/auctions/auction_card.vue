<template>
    <div class="item-container relative">
        <div v-if="no_new_bidders" class="no-new-bidders">no new bidders</div>
        <div @click="toggleBookmark()" class="bookmark-container">
            <ion-icon
                v-if="!temp_bookmark"
                :class="[is_bookmarked ? 'bookmarked' : '', 'icon-bg']"
                name="bookmark"
            ></ion-icon>
            <!-- templrary bookmark before refetching from database -->
            <ion-icon
                v-else
                :class="[
                    current_bookmark_status ? 'bookmarked' : '',
                    'icon-bg',
                ]"
                name="bookmark"
            ></ion-icon>
        </div>
        <div class="rounded-t-3xl overflow-hidden">
            <div class="auction-img">
                <p class="card-title">{{ title }}</p>
                <img
                    v-if="image"
                    class="w-full"
                    :src="'/storage/' + image.image"
                    alt="Sunset in the mountains"
                />
                <img
                    v-else="image"
                    class="w-full"
                    :src="'/storage/images/default/default_auction_pic.png'"
                    alt="Sunset in the mountains"
                />
            </div>
            <div class="content flex flex-col gap-2.5 py-5 px-7">
                <div v-if="status === 100" class="header flex flex-col gap-1">
                    <p :key="live_price" class="mycolor live-price">
                        ${{ live_price }}
                    </p>
                    <p :key="live_price" class="mycolor current-winner">
                        {{ current_winner_username }}
                    </p>
                </div>
                <div
                    v-else-if="status === 1"
                    class="header flex flex-col gap-1"
                >
                    <p class="starting_time">{{ start_time }}</p>
                    <p class="current-winner">Bid during last 9 seconds.</p>
                </div>
                <div
                    v-else-if="status === 3"
                    class="header flex flex-col gap-1"
                >
                    <p class="starting_time">We Have A Winner</p>
                    <p class="current-winner">{{ current_winner_username }}</p>
                </div>
                <!-- if auction is live then using timer  -->
                <div v-if="status === 100" class="auction-timer">
                    <vue-countdown
                        @end="live_countDown_ended(auction_id)"
                        :time="convertDateToMilliSeconds(timer)"
                        v-slot="{ hours, minutes, seconds }"
                    >
                        <div class="count-down">
                            <div class="number">{{ hours }}</div>
                            <div class="seperator">:</div>
                            <div class="number">{{ minutes }}</div>
                            <div class="seperator">:</div>
                            <div class="number">{{ seconds }}</div>
                        </div>
                    </vue-countdown>
                </div>
                <div v-if="status === 3" class="auction-timer">
                    <div class="count-down">
                        <div style="padding: .7rem 1rem;" class="number">
                            <ion-icon class="trophy" name="trophy"></ion-icon>
                        </div>
                        <div class="seperator">:</div>
                        <div  style="padding: .7rem 1rem;"class="number">
                            <ion-icon class="trophy" name="trophy"></ion-icon>
                        </div>
                        <div class="seperator">:</div>
                        <div style="padding: .7rem 1rem;" class="number">
                            <ion-icon class="trophy" name="trophy"></ion-icon>
                        </div>
                    </div>
                </div>
                <!-- if its comming soon then using start time for countdown -->
                <div v-else-if="status === 1" class="auction-timer">
                    <vue-countdown
                        :time="convertDateToMilliSeconds(start_time)"
                        v-slot="{ hours, minutes, seconds }"
                    >
                        <div class="count-down">
                            <div class="number">{{ hours }}</div>
                            <div class="seperator">:</div>
                            <div class="number">{{ minutes }}</div>
                            <div class="seperator">:</div>
                            <div class="number">{{ seconds }}</div>
                        </div>
                    </vue-countdown>
                </div>
                <router-link
                    v-if="status === 100"
                    :to="{ name: 'auction-index', params: { id: auction_id } }"
                >
                    <button
                        class="bid-now-btn rounded-full relative border hover:border-violet-600 duration-500 group cursor-pointer text-sky-50 overflow-hidden h-14 bg-violet-950 p-2 flex justify-center items-center font-extrabold w-full"
                    >
                        <div
                            class="absolute z-10 w-48 h-48 rounded-full group-hover:scale-150 transition-all duration-500 ease-in-out bg-violet-900 delay-150 group-hover:delay-75"
                        ></div>
                        <div
                            class="absolute z-10 w-40 h-40 rounded-full group-hover:scale-150 transition-all duration-500 ease-in-out bg-violet-800 delay-150 group-hover:delay-100"
                        ></div>
                        <div
                            class="absolute z-10 w-32 h-32 rounded-full group-hover:scale-150 transition-all duration-500 ease-in-out bg-violet-700 delay-150 group-hover:delay-150"
                        ></div>
                        <div
                            class="absolute z-10 w-24 h-24 rounded-full group-hover:scale-150 transition-all duration-500 ease-in-out bg-violet-600 delay-150 group-hover:delay-200"
                        ></div>
                        <div
                            class="absolute z-10 w-16 h-16 rounded-full group-hover:scale-150 transition-all duration-500 ease-in-out bg-violet-500 delay-150 group-hover:delay-300"
                        ></div>
                        <p class="z-10">BID NOW</p>
                    </button></router-link
                >

                <!-- <button v-if="status === 1" class="btn-primary w-full">Bid Now</button> -->
                <button
                    v-else-if="status === 1"
                    class="w-full startingsoon-btn"
                >
                    Starting Soon {{ status }}
                </button> 
                <button
                    v-else-if="status === 3"
                    class="w-full startingsoon-btn"
                >
                    Auction Ended
                </button>
                <button class="btn-secoundary">
                    Buy it Now for ${{ buy_now_price }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { param } from "jquery";
import {
    translateAuctionStatus,
    convertDateToMilliSeconds,
} from "@/modules/utilities.js";
export default {
    data() {
        return {
            updateBookmarkUrl: "bookmark/toggle",
            temp_bookmark: false,
            current_bookmark_status: false,
        };
    },
    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken"]),
    },
    mounted() {
        this.current_bookmark_status = this.is_bookmarked;
    },

    methods: {
        translateAuctionStatus,
        convertDateToMilliSeconds,

        toggleBookmark() {
            let config = {
                Authorization: this.UserAuthToken,
            };
            const body = {
                auction_id: this.auction_id,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.updateBookmarkUrl,
                data: body,
                headers: config,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    console.log(this.is_bookmarked);
                    this.temp_bookmark = true;
                    this.current_bookmark_status =
                        !this.current_bookmark_status;
                    this.$emit("refreshData");
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});
        },
        live_countDown_ended(id) {
            // TODO - now sending end auction emitt from two sources from index and card - commenting from card fornow
            return;
            console.log("emitting from auction card");

            this.emitter.emit("live_timer_end", id);
        },
    },
    props: {
        timer: {},
        start_time: {},
        buy_now_price: Number,
        auction_id: {},
        current_winner_username: {
            default: null,
        },
        current_winner_id: {
            default: null,
        },

        live_price: {
            type: Number,
            default: 0,
        },
        title: String,
        image: {},
        is_bookmarked: {
            type: Boolean,
            default: false,
        },
        // status 1=>active  // 0=>deactive // 3=>finished // 100=>running //  200=> no new bidders
        status: {
            default: 1,
        },
        no_new_bidders: {
            type: Boolean,
            default: false,
        },
    },
    emits: ["refreshData"],
};
</script>

<style lang="scss" scoped>
.auction-img {
    width: 100%;

    img {
        height: 13rem;
    }
}

.item-container {
    margin-bottom: 3rem;
    border-radius: 30px;
    box-shadow: 0 2px 14px #3a3a3a8c;

    .content {
        border-bottom-right-radius: 30px;
        border-bottom-left-radius: 30px;
        background: linear-gradient(
            0deg,
            var(--color-primary-tint-1),
            rgb(255, 255, 255) 95%
        );
    }
}
.mycolor {
    animation: flash_change 1s;
}

.bookmark-container {
    position: relative;
    font-size: 2.7rem;
    top: -1.2rem;
    right: -1rem;
    color: #ececec;
    cursor: pointer;

    .icon-bg {
        position: absolute;
        color: var(--color-primary-tint-1);
        right: 0;
        cursor: pointer;
        z-index: 11;
    }

    .icon-border {
        position: absolute;
        z-index: 20;
        color: #00000059;
        right: 0;
    }
}
.trophy{
    font-size: 1.7rem;
    color: gold;
}
.no-new-bidders {
    position: absolute;
    background-color: #f9f937;
    width: 100%;
    text-align: center;
    transform: rotateY(0deg) rotate(-20deg);
    top: 20%;
    clip-path: polygon(100% 0, 95% 48%, 100% 100%, 0% 100%, 5% 50%, 0% 0%);
    color: #222;
}

.btn-primary:hover {
    transform: scale(0.9);
    box-shadow: 0 8px 15px #997add;
}

.startingsoon-btn {
    background-color: #b1b2c8;
    border-radius: 50px;
    padding: 0.74rem;
    color: #fff;
    font-size: 1.4rem;
    font-weight: 600;
    //   text-shadow: 0 4px 5px #80808082;
    margin-bottom: 0.4rem;
}

.btn-secoundary {
    color: #444;
    border-bottom: 1px solid;
    width: 70%;
    margin: auto;
}

.btn-primary {
    background-color: var(--color-primary);
    border-radius: 50px;
    padding: 0.5rem;
    color: #fff;
    font-size: 1.7rem;
    font-weight: 600;
    text-shadow: 0 4px 5px #80808082;
    margin-bottom: 0.4rem;
    transition: all 0.5s ease;
}

.card-title {
    text-align: center;
    font-size: 1rem;
    color: #444;
    font-weight: 400;
    background-color: #fff;
    padding-top: 0.6rem;
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
        }

        .seperator {
            padding: 0.5rem;
            color: var(--color-primary);
            font-weight: 600;
        }
    }
}

.header {
    .live-price {
        border-radius: 20px;
        text-align: center;
        font-size: 2rem;
        color: rgb(93, 208, 28);
        text-shadow: 0 1px 1px rgba(20, 255, 0, 0.51);
    }

    .starting_time {
        border-radius: 20px;
        text-align: center;
        font-size: 1.6rem;
        color: #777;
        margin-bottom: 0.6rem;
    }

    .current-winner {
        text-align: center;
        font-size: 0.8rem;
        color: #555;
    }
}

.bookmarked {
    color: var(--color-primary-tint-5) !important;
    filter: drop-shadow(2px 2px 2px #888) !important;
}

.bid-now-btn {
    width: 90%;
    margin: auto;
    height: 4rem;
    font-size: 1.2rem;
    filter: grayscale(0.55);
}
</style>
