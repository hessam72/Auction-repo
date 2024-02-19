<template>
  <div class="mother-container">
  <nav-bar-section></nav-bar-section>
  <router-view class="main-container" v-slot="{ Component }">
    <keep-alive>
      <component :is="Component" />
    </keep-alive>
  </router-view>
  <footer-section></footer-section>
  </div>
</template>

<script>
import navBarSection from "./components/global/navbar.vue";
import footerSection from "./components/global/footer.vue";
export default {
  components: {
    navBarSection,
    footerSection,
  },
};
</script>

<style>
@import url("../../css/scss/main.scss");

.mother-container{
  position:relative;
}
</style>