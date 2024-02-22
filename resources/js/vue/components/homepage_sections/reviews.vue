<template>
  <div class="section-container">
    <h2 class="section-title">Our Reviews</h2>

    <div class="reviews-container flex gap-2.5">
      <div class="review w-4/12 flex flex-col gap-1.5">
        <div class="pic-container">
          <div class="border-wrap">
          <img
            class="user_img"
            :src="'/storage/images/user_profiles/150-9.jpg'"
          />
        </div>
          <img
            class="quote-icon"
            :src="'/storage/images/utilities/quote.png'"
          />

          <div class="title">
            <p class="name">Sara Brown</p>
            <p class="winner">Winner of: Iphone</p>
          </div>
        </div>

        <div class="desc">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum
            consectetur molestias velit consequatur 
          </p>
        </div>
      </div>
   
      <div class="review w-4/12 flex flex-col gap-1.5">
        <div class="pic-container">
          <div class="border-wrap">
          <img
            class="user_img"
            :src="'/storage/images/user_profiles/150-11.jpg'"
          />
          </div>
          <img
            class="quote-icon"
            :src="'/storage/images/utilities/quote.png'"
          />

          <div class="title">
            <p class="name">Joe jefry</p>
            <p class="winner">Winner of: Iphone</p>
          </div>
        </div>

        <div class="desc">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum
            consectetur molestias velit
          </p>
        </div>
      </div>
      <div class="review w-4/12 flex flex-col gap-1.5">
        <div class="pic-container">
          <div class="border-wrap">
          <img
            class="user_img"
            :src="'/storage/images/user_profiles/150-7.jpg'"
          />
          </div>
          <img
            class="quote-icon"
            :src="'/storage/images/utilities/quote.png'"
          />

          <div class="title">
            <p class="name">Sara Brown</p>
            <p class="winner">Winner of: Iphone</p>
          </div>
        </div>

        <div class="desc">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum
            consectetur molestias velit consequatur
          </p>
        </div>
      </div>
      <div class="review w-4/12 flex flex-col gap-1.5">
        <div class="pic-container">
          <div class="border-wrap">
          <img
            class="user_img"
            :src="'/storage/images/user_profiles/150-2.jpg'"
          />
          </div>
          <img
            class="quote-icon"
            :src="'/storage/images/utilities/quote.png'"
          />

          <div class="title">
            <p class="name">Kim Brown</p>
            <p class="winner">Winner of: Iphone</p>
          </div>
        </div>

        <div class="desc">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum
            consectetur molestias velit consequatur 
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
  position: relative;
  display: flex;
  justify-content: start;
  gap: 1rem;
  .title {
    padding-top: 1.5rem;
    z-index:1;
    .name {
      font-size: 1.1rem;
      color: #fff;
      font-weight: 500;
    }
    .winner {
      font-size: 0.8rem;
      color: #ddd;
    }
  }
.border-wrap{
 
  background: linear-gradient(to right, rgb(14, 165, 233), rgb(186, 230, 253));
    border-radius: 100px;
  .user_img {
    width: 6rem;
border-radius: 200px;
height: 6rem;
filter: grayscale(100%);
box-shadow: 0 1px 5px rgba(114, 114, 115, 0.5411764706);
color: white;
padding: .15rem;
text-align: center;
    
  }
}
  .quote-icon {
    opacity: 0.071;
    position: absolute;
    top: 0;
    right: -1rem;
    width: 5rem;
    height: 5rem;
  }
}
.review {
  background: rgb(42, 26, 78);
  background: linear-gradient(
    90deg,
    rgba(42, 26, 78, 0.699) 2%,
    rgba(76, 112, 171, 0.644) 95%
  );
  border-radius: 20px;
  box-shadow: 0 2px 10px gray;
  padding: 1rem 2rem;
}
.desc {
  font-size: 0.9rem;
  color: #f9f9f9;
  letter-spacing: 0.4px;
  line-height: 1.8;
}
</style>