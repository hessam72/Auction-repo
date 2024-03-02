<template>
    <single-nav></single-nav>
    <bread-crumps v-bind:history="history" :current="current"></bread-crumps>
   <menu-section></menu-section>
   <div class="main-section flex">
      <user-info></user-info>
      <router-view></router-view>
   </div>
 
  
   <fixed-buttons></fixed-buttons>
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
            history: [
                {
                    name: "Home",
                    url: "/vue/v1"
                },
                
            ],
            current: "user"
        }
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
  </style>