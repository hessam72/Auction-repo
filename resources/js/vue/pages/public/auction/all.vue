<template>

  <auction-list :auctions="auctions"></auction-list>
</template>
  
  <script>
import auctionList from "../../../components/auctions/list.vue";
import { sendGet, sendPost } from "@/modules/api.js";
import { mapGetters, mapActions } from "vuex";

export default {

  data() {
    return {
      auctions: [],
      localUrl: "auctions",
      rawAuctionsUrl: "auctions/raw",
      pusher_data:'no data yet...',
    };
  },
  computed: {
    ...mapGetters(["baseUrl", "storedAuctions", "findAuction"]),
  },
  methods: {
    ...mapActions(["setAuctions" , "setSingleAuction"]),
    // pusher management 
    connect(){
      console.log('starting connection....')
      let vm = this;
      window.Echo.private('my-channel').listen('.my-event' , e=>{
        console.log(e)
        vm.upadteAnAuctionState(e);
        
      })
    },
    disconnect(){
      window.Echo.leave('my-channel');
    },
    fetchAuctions() {
      console.log("start sending");
      sendGet(
        this.baseUrl + this.localUrl, //url
        {}, //body
        { Accept: "application/json" } //headers
      )
        .then((data) => {
          console.log(data);

          this.auctions = data.data;
          this.saveAuctions();
        })
        .catch((err) => {
          console.log(err);
        });
    },
    saveAuctions() {
      let data = [];
      for (let i = 0; i < this.auctions.length; i++) {
        data.push({
          id: this.auctions[i].id,
          current_winner_id: this.auctions[i].current_winner_id,
          current_price: this.auctions[i].current_price,
          timer: this.auctions[i].timer,
          status: this.auctions[i].status,
        });
      }
      this.setAuctions(data);
    },
    upadteAnAuctionState(item){
      //find the auction in store with id
      // set new values
      console.log('calling setsingle auction')
      this.setSingleAuction(item)

     
    }
  },
  created() {
   
    this.fetchAuctions();
  },
  beforeDestroy(){
    this.disconnect();
  },
  mounted() {
    this.connect();
  },
  components: {
    auctionList,
  },
};
</script>
  
  <style>
</style>