<template>
    <search-section></search-section>
    <div class="main-container">
        <!-- <div v-show="show_backdrop" class="backdrop">.</div> -->
        <auction-card
            :time="7 * 60 * 60 * 1000"
            :buy_now_price="1300"
            :current_winner_username="'ali_ggory'"
            :live_price="54.3"
            :title="'macbook pro m1'"
            :image="'/storage/images/product_images/macbook-1.jpeg'"
            :is_bookmarked="true"
            :status="1"
        ></auction-card>
        <auction-card
            :time="7 * 3 * 60 * 1000"
            :buy_now_price="750"
            :start_time="'Today at 5:58 PM'"
            :title="'iphone 13 pink'"
            :image="'/storage/images/product_images/iphone-3.jpg'"
            :status="2"
        ></auction-card>

        <auction-card
            :time="7 * 60 * 20 * 1000"
            :buy_now_price="2300"
            :current_winner_username="'sara_joens'"
            :live_price="35.3"
            :title="'macbook air m2'"
            :image="'/storage/images/product_images/macbook-2.jpg'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="true"
        ></auction-card>
        <auction-card
            :time="3 * 60 * 20 * 1000"
            :buy_now_price="2450"
            :current_winner_username="'ashley_joens'"
            :live_price="15.34"
            :title="'playstation 5'"
            :image="'/storage/images/product_images/ps5-2.png'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="false"
        ></auction-card>
        <auction-card
            :time="7 * 3 * 60 * 1000"
            :buy_now_price="750"
            :start_time="'Today at 5:58 PM'"
            :title="'iphone 13 pink'"
            :image="'/storage/images/product_images/iphone-3.jpg'"
            :status="2"
        ></auction-card>
        <auction-card
            :time="7 * 3 * 60 * 1000"
            :buy_now_price="750"
            :start_time="'Today at 5:58 PM'"
            :title="'iphone 13 pink'"
            :image="'/storage/images/product_images/iphone-3.jpg'"
            :status="2"
        ></auction-card>

        <auction-card
            :time="7 * 60 * 20 * 1000"
            :buy_now_price="2300"
            :current_winner_username="'sara_joens'"
            :live_price="35.3"
            :title="'macbook air m2'"
            :image="'/storage/images/product_images/macbook-2.jpg'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="true"
        ></auction-card>
        <auction-card
            :time="3 * 60 * 20 * 1000"
            :buy_now_price="2450"
            :current_winner_username="'ashley_joens'"
            :live_price="15.34"
            :title="'playstation 5'"
            :image="'/storage/images/product_images/ps5-2.png'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="false"
        ></auction-card>

        <auction-card
            v-if="show_more"
            :time="7 * 60 * 60 * 1000"
            :buy_now_price="1300"
            :current_winner_username="'ali_ggory'"
            :live_price="54.3"
            :title="'macbook pro m1'"
            :image="'/storage/images/product_images/macbook-1.jpeg'"
            :is_bookmarked="true"
            :status="1"
        ></auction-card>
        <auction-card
            v-if="show_more"
            :time="7 * 60 * 20 * 1000"
            :buy_now_price="2300"
            :current_winner_username="'sara_joens'"
            :live_price="35.3"
            :title="'macbook air m2'"
            :image="'/storage/images/product_images/macbook-2.jpg'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="true"
        ></auction-card>

        <auction-card
            v-if="show_more"
            :time="7 * 60 * 20 * 1000"
            :buy_now_price="2300"
            :current_winner_username="'sara_joens'"
            :live_price="35.3"
            :title="'macbook air m2'"
            :image="'/storage/images/product_images/macbook-2.jpg'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="true"
        ></auction-card>
        <auction-card
            v-if="show_more"
            :time="3 * 60 * 20 * 1000"
            :buy_now_price="2450"
            :current_winner_username="'ashley_joens'"
            :live_price="15.34"
            :title="'playstation 5'"
            :image="'/storage/images/product_images/ps5-2.png'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="false"
        ></auction-card>

        <auction-card
            v-if="show_more2"
            :time="7 * 3 * 60 * 1000"
            :buy_now_price="750"
            :start_time="'Today at 5:58 PM'"
            :title="'iphone 13 pink'"
            :image="'/storage/images/product_images/iphone-3.jpg'"
            :status="2"
        ></auction-card>

        <auction-card
            v-if="show_more2"
            :time="7 * 60 * 20 * 1000"
            :buy_now_price="2300"
            :current_winner_username="'sara_joens'"
            :live_price="35.3"
            :title="'macbook air m2'"
            :image="'/storage/images/product_images/macbook-2.jpg'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="true"
        ></auction-card>
        <auction-card
            v-if="show_more2"
            :time="3 * 60 * 20 * 1000"
            :buy_now_price="2450"
            :current_winner_username="'ashley_joens'"
            :live_price="15.34"
            :title="'playstation 5'"
            :image="'/storage/images/product_images/ps5-2.png'"
            :is_bookmarked="false"
            :status="1"
            :no_new_bidders="false"
        ></auction-card>
    </div>
    <inline-loading
        style="
            margin-bottom: 7rem;
            margin-top: -5rem;
            z-index: 999999999;
            position: relative;
        "
        :is_loading_more
    ></inline-loading>

    <InfiniteLoading @infinite="loadData" />
</template>

<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<script>
import AuctionCard from "./auction_card.vue";

import searchSection from "./searchSection.vue";
export default {
    data() {
        return {
            is_loading_more: false,
            show_more: false,
            show_more2: false,
        };
    },
    methods: {
        loadData($state) {
            //calling the api
            // alert('load more');
            this.is_loading_more = true;
            setTimeout(() => {
                this.is_loading_more = false;
                if (this.show_more) {
                    this.show_more2 = true;
                }
                this.show_more = true;
            }, 2000);
        },
    },
    components: {
        searchSection,
        AuctionCard,
    },
};
</script>

<style lang="scss" scoped>
.main-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 1rem;
    padding: 1rem 5rem;
    margin-top: 3rem;
    position: relative;
    margin-bottom: 8rem;
}

.loading-container {
    width: 100%;
    margin: auto;
    text-align: center;
    margin-top: -7rem;
    margin-bottom: 6rem;
}

.section-seperator {
    margin-top: 5rem;
}
</style>
