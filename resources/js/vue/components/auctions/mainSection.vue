<template>
    <div>
        <search-section></search-section>
        <div class="main-container">
            <!-- <div v-show="show_backdrop" class="backdrop">.</div> -->
            <auction-card
                v-for="(item, index) in JSON.parse(
                    JSON.stringify(this.auctions)
                )"
                :key="index"
                :start_time="item.start_time"
                :timer="item.timer"
                :buy_now_price="item.product.price"
                :current_winner_username="item.current_winner.username"
                :live_price="item.current_price"
                :title="item.product.title"
                :image="item.product.galleries[0]"
                :is_bookmarked="check_bookmark_status(item.bookmarks, 2)"
                :status="item.status"
            >
            </auction-card>
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
    </div>
</template>

<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<script>
import AuctionCard from "./auction_card.vue";

import searchSection from "./searchSection.vue";
import auctions from "../../store/modules/auctions";
export default {
    props: {
        auctions: {},
        is_loading_more: {
            default: false,
        },
    },
    data() {
        return {
        
            show_more: false,
            show_more2: false,
        };
    },
    methods: {
        check_bookmark_status(auction_bookmarks, auth_user_id) {
            var bookmarked = false;
            auction_bookmarks.forEach(function (item, index) {
                if (item.user_id === auth_user_id) bookmarked = true;
            });
            return bookmarked;
        },
        loadData($state) {
            //calling the api
            

            this.$emit('loadMore'  );
            // setTimeout(() => {
            //     this.is_loading_more = false;
            //     if (this.show_more) {
            //         this.show_more2 = true;
            //     }
            //     this.show_more = true;
            // }, 2000);
        },
    },
    components: {
        searchSection,
        AuctionCard,
    },
    mounted() {
        //        console.log('this.auctions')
        //        console.log(JSON.parse(JSON.stringify(
        // this.auctions)))
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
