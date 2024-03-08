<template>
    <div id="auctions" class="section-seperator">
        <div class="divider"></div>
        <span class="and">
            <ion-icon name="ribbon"></ion-icon>
        </span>
        <div class="divider"></div>
    </div>
    <div class="section-container">
        <h2 class="section-title">Featured Auctions</h2>
        <div class="auction-container">
           
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

export default {
    components:{
        AuctionCard
    }
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
