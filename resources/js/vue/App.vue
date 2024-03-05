<template>
  <div class="mother-container">
  
  <router-view class="main-container" v-slot="{ Component }">
    <keep-alive>
      <component :is="Component" />
    </keep-alive>
  </router-view>
  <div id="footer">
  <footer-section></footer-section></div>
  </div>
</template>

<script>
import footerSection from "./components/global/footer.vue";
export default {
  components: {
  
    footerSection,
  },
  watch:{
  '$route' (to, from){
    var footer = document.getElementById("footer");
    if(to.name === "auth"){
      // hide footer
     
      footer.classList.add("hide");
    }else{
      footer.classList.remove("hide");
    }
   
  }
},
};
</script>

<style lang="scss">
@import url("../../css/scss/main.scss");
@import url("../../css/var/variables.css");



.hide{
  display: none;
}

.mother-container{
  position:relative;
}
</style>