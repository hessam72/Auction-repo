<template>
  <hero-section></hero-section>
 
 <main-section></main-section>
</template>
<script>
import heroSection from "../../../components/auctions/hero.vue";

import mainSection from "../../../components/auctions/mainSection.vue";
export default {
  components: {
    heroSection,
   
    mainSection
  },
};
</script>
<style lang="scss" scoped>
</style>