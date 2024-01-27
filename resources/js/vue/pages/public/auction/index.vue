<template>
  <div v-if="auction!=null" class="mx-6">
    <!-- header -->
    <div class="flex justify-between">
      <p>{{ auction.product.title }}</p>
      <p>{{ auction.product.short_desc }}</p>
      <p>Category: {{ auction.product.category.title }}</p>
      <p>No Jumper Limit: {{ auction.no_jumper_limit }}</p>
    </div>
    <!-- content -->
    <div class="grid grid-cols-2">
      <!-- left side -->
      <div class="">
        <!-- gllery -->
        <div class="p-5 sm:p-8">
          <img
            v-for="(item, index) in auction.product.galleries"
            :key="index"
            :src="'/storage/' + item.image"
          />
        </div>
        <div>last winners list</div>
      </div>

      <!-- right side -->
      <div class="flex flex-col">
        <div class="flex justify-between">
          <p>current bid:</p>
          <p>{{ auction.current_price }}$</p>
        </div>
        <div class="">
          <h4>current winner</h4>
        </div>
        <!-- bidders list -->
        <div class="w-full">
          <table class="table-fixed w-full">
            <thead>
              <tr>
                <th>Bid</th>
                <th>User</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>205$</td>
                <td>Malcolm Lockyer</td>
                <td>5:53:04 PM</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- timer -->
        <div class="">
          <vue-countdown
            @end="endAuction()"
            :time="60 * 1000"
            v-slot="{ seconds }"
          >
            Timer: {{ seconds }}
          </vue-countdown>
        </div>
        <div class="">
          <!-- show if user auth and has bids and timer is not 0 -->
          <button
          v-if="!disable_bidding"
            @click="submitBid()"
            class="bg-cyan-500 hover:bg-cyan-600 rounded-md px-5 py-3"
          >
            Bid
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
import { sendGet, sendPost } from "@/modules/utilities.js";
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      auction: null,
      disable_bidding:false,
      localUrl: "auctions/",
      bidUrl: "auction/bidding/create",
    };
  },
  computed: {
    ...mapGetters(["baseUrl"]),
  },
  methods: {
    fetchAuction() {
      console.log("start sending");

      sendGet(
        this.baseUrl + this.localUrl + this.$route.params.id, //url
        {}, //body
        { Accept: "application/json" } //headers
      )
        .then((data) => {
          console.log(data);
          this.auction = data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    endAuction() {
      console.log("Aution is over");
      // this.disable_bidding=true;
    },
    submitBid() {
      // sending user bid
      const body = {
        auction_id: this.auction.id,
        bid_price: this.auction.current_price
      };
      console.log(body)
    
      sendPost(
        this.baseUrl + this.bidUrl, //url
        body, //body
        { Accept: "application/json" } //headers
      )
        .then((data) => {
          console.log(data);
         alert('bid submitted')
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created() {
    this.fetchAuction();
  },
  components: {},
};
</script>
  
  <style>
</style>