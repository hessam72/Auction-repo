<template>
  <nav-bar-section></nav-bar-section>
  <router-view v-slot="{ Component }">
    <keep-alive>
      <component :is="Component" />
    </keep-alive>
  </router-view>
  <!-- <footer-section></footer-section> -->
</template>

<script>

import navBarSection from "./components/utilities/navbar.vue";
import footerSection from "./components/utilities/footer.vue";
export default {
components:{
  navBarSection,
footerSection
}
}
</script>

<style>
@import url('../../css/scss/main.scss');

</style>