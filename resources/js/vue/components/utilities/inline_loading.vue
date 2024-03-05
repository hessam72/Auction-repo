<template>
  <Transition>
    <div  class="loading-container">
        <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
            role="status">
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
    </div>
  </Transition>
</template>

<script>
export default {
  props:["is_loading_more"]
};
</script>

<style lang="scss" scoped>
.loading-container {

width: 100%;
margin: auto;
text-align: center;
margin-bottom: -2rem;

}
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>