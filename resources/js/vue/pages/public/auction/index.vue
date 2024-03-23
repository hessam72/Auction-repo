<template>
  <div v-if="auction != null && storedAuctions[0].id != null" class="mx-6">
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
        <div  v-if="auction.product.galleries.length >0" class="p-5 sm:p-8">
          <img
         
            v-for="(item, index) in auction.product.galleries"
            :key="index"
            :src="'/storage/' + item.image"
          /> 
      
        </div>
        <div  v-else class="p-5 sm:p-8">
          <img
         
            
           
          :src="'/storage/images/default/default_auction_pic.png'"
          /> 
      
        </div>
        <div>last winners list</div>
      </div>

      <!-- right side -->
      <div class="flex flex-col">
        <div class="flex justify-between">
          <p>current bid:</p>
          <p>{{ findAuctionInStore(auction.id).current_price }}$</p>
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
        <div
          v-if="
            convertDateToMilliSeconds(findAuctionInStore(auction.id).timer) > 0
          "
          class=""
        >
          <vue-countdown
            @end="endAuction()"
            :time="
              convertDateToMilliSeconds(findAuctionInStore(auction.id).timer)
            "
            v-slot="{ seconds }"
          >
            <!-- to sent backend for calculating heighest bidder time -->
            Timer: {{ remaining_seccounds =seconds +1}}
          </vue-countdown>
        </div>
        <div>
          <!-- show if user auth and has bids and timer is not 0 -->
          <button
            v-if="!disable_bidding"
            @click="submitBid()"
            class="bg-cyan-500 hover:bg-cyan-600 rounded-md px-5 py-3"
          >
            Bid
          </button>
          <div class="flex">
            <button
              @click="submitBiBuddy()"
              class="bg-yellow-500 hover:bg-cyan-600 rounded-md px-5 py-3"
            >
              submit Buddy
            </button>
            <input type="number" v-model="bidBodyCount" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <button
    @click="this.runBidBudies()"
    class="bg-cyan-500 hover:bg-cyan-600 rounded-md px-5 py-3"
  >
    activate bid buddy
  </button>

  {{ storedAuctions }}
</template>

  <script>
import { sendGet, sendPost } from "@/modules/api.js";
import { mapActions, mapGetters } from "vuex";
import { convertDateToMilliSeconds } from "@/modules/utilities.js";
export default {
  data() {
    return {
      is_loading:false,
      message: "",
      seconds: 0,
      remaining_seccounds:0,
      bidBodyCount: 0,
      auction: null,
      disable_bidding: false,
      localUrl: "auctions/",
      bidUrl: "auction/bidding/create",
      CreateBuddyUrl: "auction/bidding/storeBidBuddy",
      submitbBidFromBuddyUrl: "auction/bidding/storeBidBuddyBid",
    };
  },
  computed: {
    ...mapGetters([
      "baseUrl",
      "findBiddingQueue",
      "storedAuctions",
      "findAuction",
    ]),
  },
  watch: {
    seconds(val) {
      console.log("new seccound: " + val);
    },
    $route(to, from) {
      // Put your logic here...
      if(to.name==="auction-index"){
        this.fetchAuction();
      }
    },
  },
  

  methods: {
    convertDateToMilliSeconds,
    ...mapActions([
      "setSingleAuction",
      "setSingleBiddingQueue",
      "addAuction",
      "addBiddingQueue",
    ]),

    findAuctionInStore(id) {
      return this.findAuction(id);
    },

    fetchAuction() {
      console.log("fetching auction");

      sendGet(
        this.baseUrl + this.localUrl + this.$route.params.id, //url
        {}, //body
        { Accept: "application/json" } //headers
      )
        .then((data) => {
     
          
          this.auction = data.data;

      
          // if (this.storedAuctions[0].id === null) {
          //   alert('new to store')
            // nothing in store
            var x = {
              id: this.auction.id,
              current_winner_id: this.auction.current_winner_id,
              current_price: this.auction.current_price,
              timer: this.auction.timer,
              status: this.auction.status,
            };

            this.addBiddingQueue(this.auction.bidding_queues);
            this.addAuction(x);
          // }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    endAuction() {
      console.log("Aution is about to be over test");
      let bidding_queue = this.findBiddingQueue(this.auction.id);
      console.log(bidding_queue);

      // check to see if there is bid buddy

      if (bidding_queue != null) {
        console.log("running bid");
        this.runBidBudies(bidding_queue);
      }else{
        // alert('we have a winner')
      }
    },
    runBidBudies(bidding_queue) {
      if (!bidding_queue)
        bidding_queue = this.findBiddingQueue(this.auction.id);
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
    submitBid() {
      // sending user bid
   
      const body = {
        auction_id: this.auction.id,
      remaining_time: this.remaining_seccounds,
      };
     
      axios
        .post(  this.baseUrl + this.bidUrl, body,{ Accept: "application/json" } )
        .then((response) => {
          console.log(response.data);
          
        })
        .catch(function (error) {
          console.log(error);
        })
        .finally( ()=> {
          // always executed
          this.is_loading=false;
        });
    
    },
    submitBiBuddy() {
      axios
        .post(this.baseUrl + this.CreateBuddyUrl, {
          count: this.bidBodyCount,
          user_id: 2,
          auction_id: this.auction.id,
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
  },
  created() {
    if(!this.auction){
         this.fetchAuction();
    }
 
  },
  mounted() {},
  components: {},
};
</script>
  
  <style>
</style>