<template>
  <div class="hero-container flex w-full relative">
    <!-- slider -->
    <!-- <div class="slider w-full absolute z-10">
      <vueper-slides
        :bullets="false"
        :touchable="false"
        :infinite="true"
        fade
        :arrows="false"
        :pause-on-hover="false"
        autoplay
       

      >
        <vueper-slide
          v-for="(slide, i) in slides"
          :key="i"
          :image="slide.image"
        />
      </vueper-slides>
    </div> -->

    <div class="content w-full px-10 flex flex-col gap-7 py-14 z-20">
      <div class="w-6/12">
        <h1 class="header text-5xl text-slate-200">Win What You Desire</h1>
        <p class="sub-header text-1xl text-slate-200">
          It is a long established fact that a reader will be distracted by the
          readable content of a page when looking at its layout. The point of
          using Lorem Ipsum is that it has a more-or-less normal distribution of
          letters.
        </p>
        <div class="flex gap-7 mt-8">
          <button
            class="transition ease-in-out bg-sky-500 hover:bg-sky-700 p-3 rounded text-slate-900"
          >
            Start Bidding
          </button>
          <button
            class="transition ease-in-out bg-sky-200 hover:bg-sky-400 p-3 rounded text-slate-900"
          >
            How it Works
          </button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";

export default {
  data: () => ({
    slides: [
      // {
      //   // You can also provide a URL for the image.
      //   image: "/assets/img/backgrounds/iphone-bg.jpg",
      // },
      // {
      //   // You can also provide a URL for the image.
      //   image: "/assets/img/backgrounds/mac-bg.jpg",
      // },
       {
        // You can also provide a URL for the image.
        image: "/assets/img/backgrounds/ps5-bg.png",
      },

      // Other slides.
    ],
  }),
  components: { VueperSlides, VueperSlide },
};
</script>

<style lang="scss">
.vueperslides__parallax-wrapper {
  //   height: 30rem;
}
</style>
<style lang="scss" scoped>
.hero-container {
  // height: 60vh;
}
.slider {
  height: 100%;
  overflow: hidden;
}
.content {
  background: rgb(0, 0, 0);
  background: linear-gradient(90deg, rgba(0,0,0,1) 23%, rgba(0,0,0,0) 85%);
    height: 100%;
}
.header{
    margin-bottom: 2rem;
letter-spacing: .1rem;
}
.sub-header{
    line-height: 1.9rem;
letter-spacing: .01rem;
}
</style>
