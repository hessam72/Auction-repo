<template >
  <div class="home-container">
  <hero-section></hero-section>
  <live-auctions></live-auctions>
  <reviews-section></reviews-section>

</div>
</template>

<script>
import heroSection from "../../../components/homepage_sections/hero.vue";
import liveAuctions from "../../../components/homepage_sections/liveAuctions.vue";
import reviewsSection from "../../../components/homepage_sections/reviews.vue";

export default {
  components: {
    heroSection,
    liveAuctions,
    reviewsSection
  },
};
</script>

<style lang="scss" scoped>
.home-container{
  background: rgb(177,194,219);
  background: linear-gradient(90deg, rgba(177,194,219,1) 0%, rgba(232,232,232,1) 41%); }
</style>