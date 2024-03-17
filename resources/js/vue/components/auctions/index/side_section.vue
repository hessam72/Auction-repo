<template>
    <div class="side-section flex flex-col">
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
</template>
<script>
import AuctionCard from "../auction_card.vue";
import { check_bookmark_status } from "@/modules/utilities/auctionUtils.js";
import { mapGetters } from "vuex";

export default {
    props: ["auctions"],
    methods: {
        check_bookmark_status,
    },
    computed: {
        ...mapGetters(["user"]),
    },
    components: {
        AuctionCard,
    },
};
</script>
<style lang="scss" scoped>
.side-section {
    width: 25%;
    height: 70vh;
    .item-container {
        width: 80%;
        margin: auto;
        margin-top: 5rem;
        filter: grayscale(1);
        -webkit-filter: grayscale(1);
        transition: all 0.4s ease;
    }

    .item-container:hover {
        filter: grayscale(0);
        -webkit-filter: grayscale(0);
    }
}

.side-section:last-child {
    margin-bottom: 7rem;
}
</style>
