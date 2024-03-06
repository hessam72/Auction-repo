<template>
    <div class="page-title-container">
        <h1>{{ title }}</h1>
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
</style>