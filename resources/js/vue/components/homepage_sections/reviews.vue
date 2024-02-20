<template>
  <div class="section-container">
    <h2 class="section-title">Our Reviews</h2>

    <div class="reviews-container flex gap-2.5">
      <div class="review w-4/12 flex flex-col gap-1.5">
        <div class="pic-container">
          <img :src="'/storage/images/default/default_auction_pic.png'" />
        </div>
        <div class="title">
          <p>user name</p>
        </div>
        <div class="desc">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum
            consectetur molestias velit consequatur assumenda sed itaque
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.pic-container {
  img {
    width: 10rem;
    border-radius: 200px;
    height: 10rem;
    margin: auto;
  }
}
</style>