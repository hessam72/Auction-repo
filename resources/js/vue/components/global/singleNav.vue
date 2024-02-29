<template>
 <div class="nav-container">
      <nav-bar-section></nav-bar-section>
    </div>
</template>
<script>
import navBarSection from "./navbar.vue";

export default{
    components: {
   
        navBarSection
    },
}
</script>
<style scoped lang="scss">
.nav-container{
    .main-nav{
        position: relative;
        padding-bottom: 1.5rem;
    }
   
    background: rgb(38, 23, 72);
    background: linear-gradient(90deg, #261748 0%, rgb(85, 114, 169) 100%);
}
</style>