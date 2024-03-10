<template>
    <nav-bar-section :is_single_nav="true"></nav-bar-section>
    <hero-section></hero-section>

    <main-section
        v-if="auctions.length > 0"
        :auctions="JSON.parse(JSON.stringify(this.auctions))"
        :is_loading_more="inline_loading"
        @loadMore="loadMore"
    ></main-section>
    <fixed-buttons></fixed-buttons>
</template>
<script>
import heroSection from "../../../components/auctions/hero.vue";
import navBarSection from "../../../components/global/navbar.vue";

import mainSection from "../../../components/auctions/mainSection.vue";
import fixedButtons from "../../../components/utilities/fixedButtons.vue";
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {
            auctions: [],
            localUrl: "auctions",
            is_loading: false,
            inline_loading: false,
            skip: 0,
            take: 3,
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
        loadMore() {
          this.inline_loading =true;
            this.skip = this.auctions.length;
  //           setTimeout(() => {
   
  // }, 300);
            this.fetchAuctions(1);
        },

        fetchAuctions(loading_more = 0) {
            this.is_loading = true;
            var url = this.baseUrl + this.localUrl;
            // if (this.$route.query.page) {
            url = url + "?skip=" + this.skip + "&take=" + this.take;
            // }

            axios
                .get(url)
                .then((response) => {
                    if (loading_more) {
                        // attach to the end of existing array

                        this.auctions = this.auctions.concat(
                            response.data.data
                        );
                    } else {
                        this.auctions = response.data.data;
                    }

                    // console.log(JSON.parse(  JSON.stringify(this.auctions)));
                    this.saveAuctions();
                })
                .catch((error) => {
                    throw error.response.data.message;
                })
                .finally(() => {
                    // always executed

                    this.is_loading = false;
                    this.inline_loading =false;
                });
        },
        // save in store
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
    },
    created() {
        this.fetchAuctions();
    },
    watch: {
        $route(to, from) {
            // check to see if rout is correct
            if (to.name != "auctions") return;
            //then
            this.fetchAuctions();
            // react to route changes...
        },
    },

    components: {
        heroSection,
        fixedButtons,
        mainSection,
        navBarSection,
    },
};
</script>
<style lang="scss" scoped></style>
