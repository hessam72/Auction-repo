<template>
  <div class="hero-container flex w-full relative">
    <!-- slider -->
    <div class="slider w-full absolute z-10">
      <vueper-slides
        :bullets="false"
        :touchable="false"
        :infinite="true"
        fade
        :arrows="false"
        :pause-on-hover="false"
        autoplay
      >
        <!-- autoplay -->
        <vueper-slide
          v-for="(slide, i) in slides"
          :key="i"
          :image="slide.image"
        />
      </vueper-slides>
    </div>

    <div class="content w-full px-20 flex flex-col gap-7 py-14 z-20">
      <div class="hero-countdown">
        ends in:
        <div class="timer">
          <vue-countdown
            :time="3 * 60 * 60 * 1000"
            v-slot="{ hours, minutes, seconds }"
          >
            <div class="count-down">
              <div class="number">{{ hours }}</div>
              <div class="seperator">:</div>
              <div class="number">{{ minutes }}</div>
              <div class="seperator">:</div>
              <div class="number">{{ seconds }}</div>
            </div>
          </vue-countdown>
        </div>
      </div>
      <div class="hero-countdown buy">
        Purchase It Now!
       
      </div>
      <div class="banner-content w-6/12">
        <h1 class="header text-5xl text-slate-200">Our Special Offer</h1>
        <p class="sub-header text-1xl text-slate-200">
          It is a long established fact that a reader will be distracted by the
          readable content of a page when looking at its layout. The point of
          using Lorem Ipsum is that it has a more-or-less normal distribution of
          letters.
        </p>
        <!-- <div class="flex gap-7 mt-8">
          <button
            class="transition ease-in-out bg-sky-500 hover:bg-sky-700 px-3 py-1.5 rounded text-slate-900 rounded-full"
          >
            But Now
          </button>
        </div> -->
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
      {
        //   // You can also provide a URL for the image.
        image: "/assets/img/backgrounds/iphone-bg.jpg",
      },
      {
        //   // You can also provide a URL for the image.
        image: "/assets/img/backgrounds/mac-bg.jpg",
      },
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
.timer {
  .count-down {
    display: flex;
    gap: 0.1rem;
    text-align: center;
    padding: 0.6rem 1rem;
    // border: 1px solid;
    width: 85%;
    margin: auto;
    .number {
      padding: 0.5rem;
  border-radius: 3px;
  color: #eee;
  font-weight: 600;
  width: 3rem;
  border: 1px solid;
    }
    .seperator {
      padding: 0.5rem;
      color: #eee;
      font-weight: 600;
    }
  }
}
.hero-countdown {
  background-color: #b72b05;
  -webkit-clip-path: polygon(
    100% 0,
    90% 51%,
    100% 100%,
    0% 100%,
    11% 52%,
    0% 0%
  );
  clip-path: polygon(
    108.5% -1px,
    101.5% 46.54%,
    100% 100%,
    0% 100%,
    6% 52%,
    0% 0%
  );
  color: #fff;
  text-transform: uppercase;
  font-weight: bold;
  width: 20rem;
  position: absolute;
  top: 7.5rem;
  right: 0rem;
  text-align: center;
  display: flex;
  width: 25rem;
  justify-content: center;
  align-items: center;
  padding: 0;
}
.buy{
  background-color: #0ea5e9;
  padding: 1rem;
  left: 0rem;
  bottom: 2rem;
  position: absolute;
  top: auto;
  clip-path: polygon(105.7% -11px, 87.50% 48.90%, 100% 100%, 0% 100%, -2.8% 44.92%, 0% 0%);
cursor:pointer;
}
.banner-content{
  margin: auto;
  text-align: center;
}
.vueperslides__parallax-wrapper {
  //   height: 30rem;
}
</style>
<style lang="scss" scoped>
.slider {
  height: 100%;
  overflow: hidden;
}
.content {
  background: rgb(41, 24, 76);
  background: linear-gradient(
    90deg,
    rgba(41, 24, 76, 1) 7%,
    rgba(77, 115, 173, 0.14607841427586654) 100%
  );
  height: 100%;
}
.header {
  margin-bottom: 2rem;
  letter-spacing: 0.1rem;
  margin-top: 3.5rem;
}
.sub-header {
  line-height: 1.9rem;
  letter-spacing: 0.01rem;
}
</style>
