<template>
  <tool-bar @search="search" @filter="filter"></tool-bar>
  <auction-list :auctions="auctions"></auction-list>
  <pagination :links="links"  :meta="meta"></pagination>

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
      links:null,
      meta:null,
    };
  },
  computed: {
    ...mapGetters(["baseUrl", "storedAuctions", "findAuction"]),
  },
  methods: {
    ...mapActions(["setAuctions", "setSingleAuction"]),
    // pusher management
    connect() {
      console.log("starting connection....");
      let vm = this;
      window.Echo.private("my-channel").listen(".my-event", (e) => {
        console.log(e);
        vm.upadteAnAuctionState(e);
      });
    },
    disconnect() {
      window.Echo.leave("my-channel");
    },
    fetchAuctions() {
      console.log("start sending");
      
      var url = this.baseUrl + this.localUrl;
      if(this.$route.query.page){
      
        url = url + "?page=" + this.$route.query.page
      }

      // url = url + "?per_page=1"
      
      console.log(url)
      
          sendGet(
            url, //url
            {}, //body
            { Accept: "application/json" } //headers
          )
            .then((data) => {
              console.log(data);
              this.auctions = data.data;
              this.saveAuctions();
              this.links=data.links;
              this.meta=data.meta;

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
    upadteAnAuctionState(item) {
      //find the auction in store with id
      // set new values
      console.log("calling setsingle auction");
      this.setSingleAuction(item);
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

      sendPost(
        this.baseUrl + this.filterUrl, //url
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
    '$route' (to, from) {
      // check to see if rout is correct

      //then
      this.fetchAuctions();
      // react to route changes...
    }
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