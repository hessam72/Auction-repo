<template>
    <div class="hero-container flex w-full relative">
        <div class="content w-full px-20 flex flex-col gap-7 py-14 z-20">
            <div class="hero-badge countdown">
              
                
                  <vue3-flip-countdown
                :countdownSize="'2.2rem'"
                :labelSize="'.9rem'"
                :deadline="'2024-4-12 00:40:00'"
                :mainColor="'#eee'"
                :secondFlipColor="'#eee'"
                :mainFlipBackgroundColor="'#222'"
                :secondFlipBackgroundColor="'#222'"
                :labelColor="'#fff'"
                
            />
            </div>
            <div data-tooltip="SAVE $38" class="button">
                <div class="button-wrapper">
                    <div class="text">Buy Now</div>
                    <span class="icon">
                        <svg
                            style="width: 2rem; height: 2rem"
                            viewBox="0 0 16 16"
                            class="bi bi-cart2"
                            fill="currentColor"
                            height="25"
                            width="25"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"
                            ></path>
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
           
            <!-- <count-down :time="2 *3 * 60 * 60 * 1000"></count-down> -->
        </div>
    </div>
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Monoton"
        rel="stylesheet"
    /> -->
</template>

<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
import NeonHeader from "./neon_header.vue";
import CountDown from "../utilities/count_down.vue";
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
    components: { VueperSlides, VueperSlide, NeonHeader, CountDown },
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

    width: 20rem;
    top: 7.5rem;
    right: 0rem;
    width: 25rem;
    padding: 0;
    opacity: 0;
    // animation-fill-mode:forwards ;
    // -webkit-animation-fill-mode:forwards ;

    animation: slideFromLeft 0.7s cubic-bezier(0.87, 0, 0.13, 1) 1s 1 normal
        both;
}

.buy {
    background-color: #0ea5e9;
    padding: 0.75rem;
    left: 2rem;
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
    animation: slideFromRight 0.7s cubic-bezier(0.85, 0, 0.15, 1) 1.6s 1 normal
        both;
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
    background: radial-gradient(
        circle,
        var(--color-secondary) 0%,
        var(--color-primary) 100%
    );
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
.button {
    --width: 100px;
    --height: 40px;
    --tooltip-height: 35px;
    --tooltip-width: 90px;
    --gap-between-tooltip-to-button: 18px;
    --button-color: #222;
    --tooltip-color: #fff;
    width: 20rem;
    height: 3.5rem;
    background: #c72a4e;
    position: absolute;
    text-align: center;
    border-radius: 0.45em;
    transition: background 0.3s;
    cursor: pointer;

    text-shadow: 0 1px 8px rgba(255, 255, 255, 0.5019607843);
    letter-spacing: 1.1px;
    font-size: 1.7rem;
    font-weight: 500;
    box-shadow: -7px 6px 19px 0px #fed8e159;
    animation: slideFromRight 0.7s cubic-bezier(0.85, 0, 0.15, 1) 1.2s 1 normal
        both;
    left: 2rem;
    bottom: 2rem;
}

.button::before {
    position: absolute;
    content: attr(data-tooltip);
    width: var(--tooltip-width);
    height: var(--tooltip-height);
    background-color: #555;
    font-size: 0.9rem;
    color: #fff;
    border-radius: 0.25em;
    line-height: var(--tooltip-height);
    bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) + 10px);
    left: calc(50% - var(--tooltip-width) / 2);
}

.button::after {
    position: absolute;
    content: "";
    width: 0;
    height: 0;
    border: 10px solid transparent;
    border-top-color: #555;
    left: calc(50% - 10px);
    bottom: calc(100% + var(--gap-between-tooltip-to-button) - 10px);
}

.button::after,
.button::before {
    opacity: 0;
    visibility: hidden;
    transition: all 0.5s;
}

.text {
    display: flex;
    align-items: center;
    justify-content: center;
}

.button-wrapper,
.text,
.icon {
    overflow: hidden;
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    color: #fff;
}

.text {
    top: 0;
}

.text,
.icon {
    transition: top 0.5s;
}

.icon {
    color: #fff;
    top: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon svg {
    width: 24px;
    height: 24px;
}

.button:hover {
    background: #a01a38;
}

.button:hover .text {
    top: -100%;
}

.button:hover .icon {
    top: 0;
}

.button:hover:before,
.button:hover:after {
    opacity: 1;
    visibility: visible;
}

.button:hover:after {
    bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) - 20px);
}

.button:hover:before {
    bottom: calc(var(--height) + var(--gap-between-tooltip-to-button));
}
</style>
