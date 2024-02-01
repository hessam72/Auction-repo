<template>
  <nav v-if="links && meta" aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px text-base h-10">
      <!-- <li>
        <router-link
          v-if="links.prev"
          :to="{ name: 'home', query: { page: 2 } }"
          class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          >Previous</router-link
        >
      </li> -->
      <li v-for="n in meta.total" :key="n">
        <router-link
        :to="{ name: 'home', query: { page: n } }"
          class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          >{{n}}</router-link>
        
      </li>

      <!-- <li>
        <router-link
          v-if="links.next"
          :to="links.next"
          class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          >Next</router-link
        >
      </li> -->
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    links: {},
    meta: {},
  },
};
</script>

<style>
</style>