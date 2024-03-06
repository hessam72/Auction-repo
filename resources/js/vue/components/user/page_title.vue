<template>
    <div class="page-title-container">
        <h1>{{ title }}</h1>
        <hr class="header-hr" />
    </div>
</template>
<script>

export default {
    props:["title"],
}
</script>

<style lang="scss" scoped>
.page-title-container{
    width:100%;
    padding: 2rem 0 0 2rem;
    font-size: 1.6rem;
    font-weight: 500;
    color:var(--color-primary-tint-6);

}
.header-hr {
    height: 4px;
    // background: linear-gradient(99deg, rgba(176, 141, 255, 0.78) 0%, rgba(45, 20, 89, 0.8744091387) 100%);
    border: none;
    margin-top: 0.8rem;
    width: 95%;
    border-radius: 50px;
    background: linear-gradient(-45deg, #492B89, #782B89, #2B3D89, #2B8978);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
   
    transition: all .3s ease;
    
}
</style>