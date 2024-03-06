<template>
 <div class="nav-container">
      <nav-bar-section :is_single_nav="is_single_nav"></nav-bar-section>
    </div>
</template>
<script>
import navBarSection from "./navbar.vue";

export default{
    data() {
        return {
            is_single_nav:true,
        }
    },
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