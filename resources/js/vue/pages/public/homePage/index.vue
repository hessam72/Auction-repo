<template>
    <div class="home-container">
        <nav-bar-section :is_single_nav="false"></nav-bar-section>

        <hero-section></hero-section>
        <statictic-count :statistics></statictic-count>
        <live-auctions :auctions></live-auctions>
        <reviews-section></reviews-section>
        <recent-winners :winners></recent-winners>
        <faq-section></faq-section>
        <pricing-plans :packages></pricing-plans>
        <fixed-buttons></fixed-buttons>
    </div>
</template>

<script>
import heroSection from "../../../components/homepage_sections/hero.vue";
import staticticCount from "../../../components/homepage_sections/statictic_count.vue";
import liveAuctions from "../../../components/homepage_sections/liveAuctions.vue";
import reviewsSection from "../../../components/homepage_sections/reviews.vue";
import recentWinners from "../../../components/homepage_sections/recentWinners.vue";
import faqSection from "../../../components/homepage_sections/faq.vue";
import pricingPlans from "../../../components/homepage_sections/pricingPlans.vue";
import fixedButtons from "../../../components/utilities/fixedButtons.vue";
import navBarSection from "../../../components/global/navbar.vue";

import { init_home_scroll } from "@/modules/utilities/homepage_scroll.js";
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            auctions: [],
            winners: [],
            packages: [],
            statistics: {},
            auctionsUrl: "auctions",
            winnersUrl: "winners/all",
            bidPackageUrl: "bid_packages/all",
            statisticsUrl: "statistics/home",
            is_loading: false,
        };
    },
    methods: {
        fetchAuctions() {
            this.is_loading = true;
            var url = this.baseUrl + this.auctionsUrl;

            url = url + "?from_home=1";
            axios
                .get(url)
                .then((response) => {
                    this.auctions = response.data.data;
                    console.log(this.auctions);
                })
                .catch((error) => {
                    throw error.response.data.message;
                })
                .finally(() => {
                    // always executed

                    this.is_loading = false;
                });
        },
        fetchLatestWinners() {
            this.is_loading = true;
            var url = this.baseUrl + this.winnersUrl;

            url = url + "?from_home=1";
            axios
                .post(url)
                .then((response) => {
                    this.winners = response.data.data;
                    console.log(this.winners);
                })
                .catch((error) => {
                    throw error.response.data.message;
                })
                .finally(() => {
                    // always executed

                    this.is_loading = false;
                });
        },
        fetchThreeBidPackage() {
            this.is_loading = true;
            var url = this.baseUrl + this.bidPackageUrl;

            url = url + "?from_home=1";
            axios
                .post(url)
                .then((response) => {
                    this.packages = response.data.data;
                    console.log(this.packages);
                })
                .catch((error) => {
                    throw error.response.data.message;
                })
                .finally(() => {
                    // always executed

                    this.is_loading = false;
                });
        },
        fetchStatistics() {
            this.is_loading = true;
            var url = this.baseUrl + this.statisticsUrl;

            axios
                .post(url)
                .then((response) => {
                    this.statistics = response.data;
                    console.log(this.statistics);
                })
                .catch((error) => {
                    throw error;
                })
                .finally(() => {
                    // always executed

                    this.is_loading = false;
                });
        },
    },
    mounted() {
        init_home_scroll();
    },
    created() {
        this.fetchAuctions();
        this.fetchLatestWinners();
        this.fetchThreeBidPackage();
        this.fetchStatistics();
    },
    computed: {
        ...mapGetters(["baseUrl"]),
    },
    watch: {
        $route(to, from) {
            // Put your logic here...
            if (to.name === "home") {
                document.getElementById("site_nav").classList.remove("sticky");
            }
        },
    },
    components: {
        heroSection,
        liveAuctions,
        reviewsSection,
        recentWinners,
        faqSection,
        pricingPlans,
        fixedButtons,
        navBarSection,
        staticticCount,
    },
};
</script>

<style lang="scss" scoped>
.home-container {
    background: rgb(177, 194, 219);
    background: linear-gradient(
        90deg,
        var(--color-secondary-tint-2),
        rgba(232, 232, 232, 1) 41%
    );
}
</style>
