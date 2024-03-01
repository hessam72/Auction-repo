<template>
    <nav class="bg-grey-light w-full rounded-md">
        <ol class="list-reset flex">
            
            <li v-for="(item , index) in history">
                <a :href="item.url"
                    class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">{{item.name}}</a>
           
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">></span>
                </li>
           
            
            <li class="text-neutral-500 dark:text-neutral-400">{{current}}</li>
        </ol>
    </nav>
</template>
<script>
export default{
    props:["history" , "current"]
}
</script>
<style lang="scss" scoped>
nav{
    padding: 0.5rem 5rem;
    background-color: #08001ad9;
    border-radius: 0;
}
</style>