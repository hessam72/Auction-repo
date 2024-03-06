<template>
    <nav class="bg-grey-light w-full rounded-md">
        <ol class="list-reset flex">
            
            <li v-for="(item , index) in history" :key="index">
                <router-link :to="item.url"
                    class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">{{item.name}}</router-link>
           
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">></span>
                </li>
           
            
            <li class="text-neutral-200 dark:text-neutral-400">{{current}}</li>
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
  background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
  border-radius: 0;
  border-top: 1px solid #aaa;
  border-bottom: 1px solid #aaa;

}
</style>