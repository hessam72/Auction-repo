<template>
 
  <auction-list :auctions="auctions"></auction-list>
</template>
  
  <script>
import auctionList from "../../../components/auctions/list.vue";
import { sendGet } from "@/modules/utilities.js";
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      auctions: [],
      localUrl: "auctions",
    };
  },
  computed: {
    ...mapGetters(["baseUrl"]),
  },
  methods: {

    fetchAuctions() {
      console.log("start sending");
      sendGet(
        this.baseUrl + this.localUrl, //url
        {}, //body
        { Accept: "application/json" } //headers
      )
        .then((data) => {
          console.log(data);
          
            this.auctions=data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created() {
    this.fetchAuctions();
  },
  components: {
    auctionList,
  },
};
</script>
  
  <style>
</style>