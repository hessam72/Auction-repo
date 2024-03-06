<template>
  <nav-bar-section  :is_single_nav="true"></nav-bar-section>
  <hero-section></hero-section>
 
 <main-section></main-section>
 <fixed-buttons></fixed-buttons>
</template>
<script>
import heroSection from "../../../components/auctions/hero.vue";
import navBarSection from "../../../components/global/navbar.vue";

import mainSection from "../../../components/auctions/mainSection.vue";
import fixedButtons from "../../../components/utilities/fixedButtons.vue";
export default {
  components: {
    heroSection,
    fixedButtons,
    mainSection,
    navBarSection
  },
};
</script>
<style lang="scss" scoped>
</style>