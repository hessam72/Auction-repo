<template>
  <div class="mother-container">
  
  <router-view class="main-container" v-slot="{ Component }">
    <keep-alive>
      <component :is="Component" />
    </keep-alive>
  </router-view>
  <footer-section></footer-section>
  </div>
</template>

<script>
import footerSection from "./components/global/footer.vue";
export default {
  components: {
  
    footerSection,
  },
};
</script>

<style lang="scss">
@import url("../../css/scss/main.scss");


.mother-container{
  position:relative;
}
</style>