<template>
  <tool-bar @search="search" @filter="filter"></tool-bar>
  <auction-list :auctions="auctions"></auction-list>

  <pagination :links="links" :meta="meta"></pagination>
  <loading class="loading" v-if="is_loading"></loading
  >
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
      searchUrl: "auctions/search",
      filterUrl: "auctions/filter",
      links: null,
      meta: null,
      is_loading:false,
    };
  },
  computed: {
    ...mapGetters(["baseUrl", "storedAuctions", "findAuction"]),
  },
  methods: {
    ...mapActions([
      "setAuctions",
      "setSingleAuction",
      "setBiddingQueues",
      "setSingleBiddingQueue",
    ]),
    // pusher management
    connect() {
      let vm = this;
      window.Echo.channel("my-channel")
        .listen(".my-event", (e) => {
         

          vm.upadteAnAuctionState(e);
        })
        .listen(".test-event", (e) => {
         
          return;
        });
    },
    disconnect() {
      window.Echo.leave("my-channel");
    },
    fetchAuctions() {
      this.is_loading=true;
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
        .catch( (error)=> {
          throw error.response.data.message;
        })
        .finally( ()=> {
          // always executed
        
          this.is_loading=false;
        });
    },
    saveAuctions() {
      let data = [];
      let queues = [];
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
      this.setBiddingQueues(queues);
    },
    upadteAnAuctionState(item) {
    
      // add 10 seccound to now
      var t = new Date();
      t = t.setSeconds(t.getSeconds() + 10);
      item.data.timer = t;

      this.setSingleAuction(item);
      var next_queue = item.data.bidding_queues;
      if (item.data.bidding_queues === null) {
        next_queue = {
          auction_id: item.data.id,
          is_empthy: true,
        };
      }
      this.setSingleBiddingQueue(next_queue);
    },
    search(text) {
      const body = {
        search: text,
      };
      axios
        .post( this.baseUrl + this.searchUrl, body ,  { Accept: "application/json" } )
        .then((response) => {
          console.log(response.data.data);
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
    filter(filter_id) {
      this.is_loading=true;
      const body = {
        filter_id: filter_id,
      };
    
      // set the value for you, you will need to manually set the X-XSRF-TOKEN header to match the value of the XSRF-TOKEN cookie that is set by this route
     
      axios
        .post(this.baseUrl + this.filterUrl, body )
        .then((response) => {
          console.log(response.data);
          this.auctions = response.data.data;
          this.saveAuctions();
        })
        .catch(function (error) {
          console.log(error);
        })
        .finally( ()=> {
          // always executed
          this.is_loading=false;
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