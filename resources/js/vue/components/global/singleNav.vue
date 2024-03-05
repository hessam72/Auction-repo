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
   
    background: var(--color-primary);
    background: linear-gradient(90deg, var(--color-primary) 0%, var(--color-secondary) 100%)
}
</style>