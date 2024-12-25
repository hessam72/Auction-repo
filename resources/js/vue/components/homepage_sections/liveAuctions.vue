<template>
    <div id="auctions" class="section-seperator">
        <div class="divider"></div>
        <span class="and">
            <ion-icon name="ribbon"></ion-icon>
        </span>
        <div class="divider"></div>
    </div>
    <div class="section-container mobile-w-full">
        <h2 class="section-title">Featured Auctions</h2>
        <div class="auction-container">
            <!-- only four -->

            <auction-card
                v-for="(item, index) in this.auctions"
                :key="index"
                :auction_id="item.id"
                :start_time="item.start_time"
                :timer="item.timer"
                :buy_now_price="item.product.price"
                :current_winner_username="item.current_winner.username"
                :live_price="item.current_price"
                :title="item.product.title"
                :image="item.product.galleries[0]"
                :is_bookmarked="check_bookmark_status(item.bookmarks, user)"
                :status="item.status"
            >
            </auction-card>
        </div>
        <!-- <div class="more-container">
            <router-link :to="{name:'auctions'}"> -->
        <!-- <button class="more-btn">
                View All <ion-icon name="share-alt"></ion-icon>
            </button> -->
        <more-btn :url_name="'auctions'"></more-btn>

        <!-- </router-link>
        </div> -->
    </div>
</template>

<script>
import AuctionCard from "../auctions/auction_card.vue";
import {check_bookmark_status} from "@/modules/utilities/auctionUtils.js"
import { mapGetters } from "vuex";
export default {
    props: ["auctions"],
    methods:{
        check_bookmark_status,
    }, computed: {
        ...mapGetters(["user"]),
    },
    components: {
        AuctionCard,
    },
};
</script>

<style lang="scss" scoped>
.section-seperator {
    margin-top: 5rem;
}

.sub-title {
    text-align: center;
    //   margin: 1.5rem;
    font-size: 1.2rem;
    // color: #e70606;
}
.auction-container {
    display: flex;
    gap: 3rem;
    justify-content: space-between;
}
</style>
