<template>
    <div class="hero-container flex w-full relative">
     

        <div class="content w-full px-20 flex flex-col gap-7 py-14 z-20">
            <div class="hero-badge countdown">
                ends in:
                <div class="timer">
                    <vue-countdown :time="3 * 60 * 60 * 1000" v-slot="{ hours, minutes, seconds }">
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
            <div data-tooltip="Price:-$20" class="buy-button">
<div class="button-wrapper">
  <div class="buy-text">Buy Now</div>
    <span class="buy-icon">
      <svg viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
</svg>
    </span>
  </div>
</div>

            <!-- <div class="hero-badge buy">Purchase It Now!</div> -->
            <div class="banner-content w-6/12">
               <!-- <h1 class=" header text-5xl text-slate-200"> -->
                  
   <neon-header class="header"></neon-header>
                <!-- </h1> -->
             
                <!-- <p class="sub-header text-1xl text-slate-200">
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout. The point of using Lorem Ipsum is that it has a
                    more-or-less normal distribution of letters.
                </p> -->
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
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
</template>

<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
import NeonHeader from "./neon_header.vue"
export default {
    data: () => ({
        slides: [
            {
                //   // You can also provide a URL for the image.
                title: "discount Offer",
                content: "15% off on our 250 Bids Package",
                image: "/assets/img/backgrounds/iphone-bg.jpg",
            },
            {
                //   // You can also provide a URL for the image.
                title: "Buy it Now",
                content: "Buy Iphone Now For Half of Price",
                image: "/assets/img/backgrounds/mac-bg.jpg",
            },
            {
                title: "Live Auction",
                content: "Live Mackbook auction now",
                // You can also provide a URL for the image.
                image: "/assets/img/backgrounds/ps5-bg.png",
            },

            // Other slides.
        ],
    }),
    components: { VueperSlides, VueperSlide,NeonHeader },
};
</script>

<style lang="scss">
.anim-up-entrance {
    animation: upEntrance 2s ease 0s 1 normal none;

}

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
            font-weight: 600;
            width: 3rem;
            background-color: #fff;
            color: #000;
        }

        .seperator {
            padding: 0.5rem;
            color: #eee;
            font-weight: 600;
        }
    }
}

.hero-badge {
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;

    position: absolute;

    text-align: center;
    display: flex;

    justify-content: center;
    align-items: center;
}

.countdown {
    background-color: #b72b05;
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 8% 100%);

    clip-path: polygon(0 0, 100% 0, 100% 100%, 8% 100%);
    width: 20rem;
    top: 7.5rem;
    right: 0rem;
    width: 25rem;
    padding: 0;
    opacity: 0;
    // animation-fill-mode:forwards ;
    // -webkit-animation-fill-mode:forwards ;

    animation: slideFromLeft .7s cubic-bezier(0.87, 0, 0.13, 1) 2s 1 normal both;
}

.buy {
    background-color: #0ea5e9;
    padding: 0.75rem;
    left: 0rem;
    bottom: 2rem;
    position: absolute;
    top: auto;
    -webkit-clip-path: polygon(0 0, 100% 0%, 89% 100%, 0% 100%);

    clip-path: polygon(0 0, 100% 0%, 89% 100%, 0% 100%);

    cursor: pointer;
    width: 20rem;
    text-shadow: 0 1px 8px #ffffff80;
    letter-spacing: 1.1px;
    opacity: 0;
    animation: slideFromRight .7s cubic-bezier(0.85, 0, 0.15, 1) 2s 1 normal both;
}

.banner-content {
    margin: auto;
    text-align: center;
    height: 23rem;
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
    background: rgb(77, 115, 173);
    background: radial-gradient(circle, var(--color-secondary) 0%, var(--color-primary) 100%);
        height: 100%;
}

.header {
    margin-bottom: 2rem;
    letter-spacing: 0.1rem;
    margin-top: 1rem;
    font-weight: 800;
    text-shadow: 0 0.5px 7px #333;
    line-height: 1.3;
}

.sub-header {
    line-height: 1.9rem;
    letter-spacing: 0.01rem;
}

//buy now
.buy-button {
  --width: 100px;
  --height: 35px;
  --tooltip-height: 35px;
  --tooltip-width: 90px;
  --gap-between-tooltip-to-button: 18px;
  --button-color: #222;
  --tooltip-color: #fff;
  width: var(--width);
  height: var(--height);
  background: var(--button-color);
  position: relative;
  text-align: center;
  border-radius: 0.45em;
  font-family: "Arial";
  transition: background 0.3s;
}

.buy-button::before {
  position: absolute;
  content: attr(data-tooltip);
  width: var(--tooltip-width);
  height: var(--tooltip-height);
  background-color: #555;
  font-size: 0.9rem;
  color: #fff;
  border-radius: .25em;
  line-height: var(--tooltip-height);
  bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) + 10px);
  left: calc(50% - var(--tooltip-width) / 2);
}

.buy-button::after {
  position: absolute;
  content: '';
  width: 0;
  height: 0;
  border: 10px solid transparent;
  border-top-color: #555;
  left: calc(50% - 10px);
  bottom: calc(100% + var(--gap-between-tooltip-to-button) - 10px);
}

.buy-button::after,.buy-button::before {
  opacity: 0;
  visibility: hidden;
  transition: all 0.5s;
}

.buy-text {
  display: flex;
  align-items: center;
  justify-content: center;
}

.buy-button-wrapper,.buy-text,.buy-icon {
  overflow: hidden;
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  color: #fff;
}

.buy-text {
  top: 0
}

.buy-text,.buy-buy-icon {
  transition: top 0.5s;
}

.buy-icon {
  color: #fff;
  top: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.buy-icon svg {
  width: 24px;
  height: 24px;
}

.buy-button:hover {
  background: #222;
}

.buy-button:hover .buy-text {
  top: -100%;
}

.buy-button:hover .buy-icon {
  top: 0;
}

.buy-button:hover:before,.buy-button:hover:after {
  opacity: 1;
  visibility: visible;
}

.buy-button:hover:after {
  bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) - 20px);
}

.buy-button:hover:before {
  bottom: calc(var(--height) + var(--gap-between-tooltip-to-button));
}




</style>