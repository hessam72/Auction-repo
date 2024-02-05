<template>
  <tool-bar @search="search" @filter="filter"></tool-bar>
  <auction-list :auctions="auctions"></auction-list>

  <pagination :links="links" :meta="meta"></pagination>
</template>
  
  <script>
import auctionList from "../../../components/auctions/list.vue";
import toolBar from "../../../components/utilities/toolBar.vue";
import pagination from "../../../components/utilities/pagination.vue";
import { sendGet, sendPost } from "@/modules/api.js";
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      auctions: [],
      localUrl: "auctions",
      rawAuctionsUrl: "auctions/raw",
      searchUrl: "auctions/search",
      filterUrl: "auctions/filter",
      pusher_data: "no data yet...",
      links: null,
      meta: null,
    };
  },
  computed: {
    ...mapGetters(["baseUrl", "storedAuctions", "findAuction"]),
  },
  methods: {
    ...mapActions(["setAuctions", "setSingleAuction" , "setBiddingQueues" , "setSingleBiddingQueue"]),
    // pusher management
    connect() {
      let vm = this;
      window.Echo.channel("my-channel")
      .listen(".my-event", (e) => {
        console.log("*******pusher recieved from my event.....***********");
        console.log(e);
        return;
        vm.upadteAnAuctionState(e);
      })
      .listen(".test-event", (e) => {
        console.log("******schedule task response***********");
        console.log(e);
        return;
        
      });
    },
    disconnect() {
      window.Echo.leave("my-channel");
    },
    fetchAuctions() {
      var url = this.baseUrl + this.localUrl;
      if (this.$route.query.page) {
        url = url + "?page=" + this.$route.query.page;
      }

      axios
        .get(url)
        .then((response) => {
          this.auctions = response.data.data;
          this.saveAuctions();
          this.links = response.data.links;
          this.meta = response.data.meta;
        })
        .catch(function (error) {
          throw error.response.data.message;
        })
        .finally(function () {
          // always executed
        });
    },
    saveAuctions() {
      let data = [];
      let queues=[];
      for (let i = 0; i < this.auctions.length; i++) {
        data.push({
          id: this.auctions[i].id,
          current_winner_id: this.auctions[i].current_winner_id,
          current_price: this.auctions[i].current_price,
          timer: this.auctions[i].timer,
          status: this.auctions[i].status,
         
        
        });
        queues.push(this.auctions[i].bidding_queues);
      }
      this.setAuctions(data);
      this.setBiddingQueues(queues)
    },
    upadteAnAuctionState(item) {
    console.log('*****item*******')
    console.log(item)
      // add 10 seccound to now
      var t = new Date();
      t = t.setSeconds(t.getSeconds() + 5);
      item.data.timer = t;

      console.log("***************new timer***********");
      console.log(item);
      this.setSingleAuction(item);
      var next_queue=item.data.bidding_queues;
      if(item.data.bidding_queues === null){
        next_queue={
          auction_id:item.data.id,
          is_empthy:true
        }
      }
      this.setSingleBiddingQueue(next_queue);
    },
    search(text) {
      const body = {
        search: text,
      };

      sendPost(
        this.baseUrl + this.searchUrl, //url
        body, //body
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
    filter(filter_id) {
      const body = {
        filter_id: filter_id,
      };

      axios
        .post(this.baseUrl + this.filterUrl, {
          params: body,
        })
        .then((response) => {
          console.log(response.data);
          this.auctions = response.data.data;
          this.saveAuctions();
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
    this.fetchAuctions();
  },
  beforeDestroy() {
    this.disconnect();
  },
  mounted() {
    this.connect();
  },
  watch: {
    $route(to, from) {
      // check to see if rout is correct

      //then
      this.fetchAuctions();
      // react to route changes...
    },
  },
  components: {
    auctionList,
    toolBar,
    pagination,
  },
};
</script>
  
  <style>
</style>