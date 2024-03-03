<template>
  <div>
  <single-nav></single-nav>
  <bread-crumps v-bind:history="history" :current="current"></bread-crumps>
  <menu-section :x="x" :page_title="page_title"></menu-section>
  <div class="main-section flex">
    <user-info></user-info>
    <div class="main-content">
      <router-view></router-view>
    </div>

  </div>


  <fixed-buttons></fixed-buttons>
</div>
</template>

<script>
import singleNav from "../../components/global/singleNav.vue";
import breadCrumps from "../../components/global/breadCrumps.vue";
import menuSection from "../../components/user/menu.vue";
import userInfo from "../../components/user/userInfo.vue";


import fixedButtons from "../../components/utilities/fixedButtons.vue";
export default {
  data() {
    return {
      page_title: "dashboard",

      history: [
        {
          name: "Home",
          url: "/vue/v1"
        },

      ],
      current: "user"
    }
  },
  watch: {
    // '$route'(to, from) {
    //   this.page_title = to.name;
    //   console.log(this.page_title + "first")

    // }
  },
  components: {
    breadCrumps,
    fixedButtons,
    singleNav,
    userInfo,
    menuSection
  },
};
</script>

<style lang="scss" scoped>
.main-section {
  position: relative;
  z-index: 2;
  margin-bottom: 4rem;

}

.main-content {
  width: 80%;
  margin-bottom:5rem;
  // padding-top: 3rem;
}
</style>