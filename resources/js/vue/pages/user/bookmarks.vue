<template>
    <page-title :title="'Bookmarks'"></page-title>
    <div class="bookmarks-container">
        <auction-card
        @refreshData="fetchData"
            v-for="(item, index) in this.bookmarks"
            :key="index"
            :auction_id="item.auction.id"
            :start_time="item.auction.start_time"
            :timer="item.auction.timer"
            :buy_now_price="item.auction.product.price"
            :current_winner_username="item.auction.current_winner.username"
            :live_price="item.auction.current_price"
            :title="item.auction.product.title"
            :image="item.auction.product.galleries[0]"
            :is_bookmarked="
                check_bookmark_status(item.auction.bookmarks, user.id)
            "
            :status="item.auction.status"
        >
        </auction-card>
    </div>
    <inline-loading :is_loading_more></inline-loading>
    <InfiniteLoading @infinite="loadData" />
</template>

<script setup>
import InfiniteLoading from "v3-infinite-loading";

import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<script>
import { check_bookmark_status } from "@/modules/utilities/auctionUtils.js";
import { mapGetters, mapActions } from "vuex";
import AuctionCard from "../../components/auctions/auction_card.vue";
export default {
    data() {
        return {
            is_loading: false,
            is_loading_more: false,

            fetchrl: "bookmark/user_bookmark",
            bookmarks: [],
        };
    },
    methods: {
        check_bookmark_status,
        fetchData() {
            let config = {
                Authorization: this.UserAuthToken,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.fetchrl,
                headers: config,
            })
                .then((response) => {
                    console.log(response.data.data);
                    this.bookmarks = response.data.data;
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});
        },
        loadData($state) {
            //calling the api
            // alert('load more');
            this.is_loading_more = true;
            setTimeout(() => {
                this.is_loading_more = false;
            }, 2000);
        },
    },
    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken", "user"]),
    },
    created() {
        this.fetchData();
    },
    components: {
        AuctionCard,
    },
};
</script>

<style lang="scss" scoped>
.bookmarks-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    row-gap: 4rem;
    column-gap: 3rem;
    padding: 3rem 5rem;
}
</style>
