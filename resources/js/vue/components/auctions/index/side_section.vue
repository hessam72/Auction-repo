<template>
  <div class="side-section flex flex-col">
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
        </div>
</template>
<script>
import AuctionCard from "../auction_card.vue";

export default {
    components: {
        AuctionCard,
    }, 
}
</script>
<style lang="scss" scoped>

.side-section {
    width: 25%;
height:70vh;
    .item-container {
        width: 80%;
        margin: auto;
        margin-top: 5rem;
        filter: grayscale(1);
        -webkit-filter: grayscale(1);
        transition: all .4s ease;

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