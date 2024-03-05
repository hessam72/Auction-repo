<template>
    <div id="hero-section" style="position: relative">
        <div id="head-line" class="hero-container flex w-full relative">
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

            <div class="content w-full px-20 flex flex-col gap-7 py-14 z-20">
                <div class="w-6/12">
                    <h1 class="header text-5xl text-slate-200">
                        Win What You Desire
                    </h1>
                    <p class="sub-header text-1xl text-slate-200">
                        It is a long established fact that a reader will be
                        distracted by the readable content of a page when
                        looking at its layout. The point of using Lorem Ipsum is
                        that it has a more-or-less normal distribution of
                        letters.
                    </p>
                    <div class="flex gap-7 mt-8">
                        <button
                            class="cta transition ease-in-out bg-sky-500 hover:bg-sky-700 px-3 py-1.5 rounded text-slate-900 rounded-full"
                        >
                            Start Bidding
                        </button>
                        <button
                            class="seccoundary transition ease-in-out bg-sky-200 hover:bg-sky-400 px-3 py-1.5 rounded text-slate-900 rounded-full"
                        >
                            Learn more
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <svg
            class="editorial"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 "
            preserveAspectRatio="none"
        >
            <defs>
                <path
                    id="gentle-wave"
                    d="M-160 44c30 0 
    58-18 88-18s
    58 18 88 18 
    58-18 88-18 
    58 18 88 18
    v44h-352z"
                />
                <linearGradient id="grad1" x1="0%" x2="100%" y1="0%" y2="0%">
                    <stop offset="10%" stop-color="rgb(178 195 219)" />
                    <stop offset="80%" stop-color="rgb(232 232 232)" />
                </linearGradient>
            </defs>
            <g class="parallax1">
                <use
                    xlink:href="#gentle-wave"
                    x="50"
                    y="3"
                    fill="rgb(41, 24, 76)"
                />
            </g>
            <g class="parallax2">
                <use
                    xlink:href="#gentle-wave"
                    x="50"
                    y="0"
                    fill="rgb(77, 115, 173) "
                />
            </g>
            <!-- <g class="parallax3">
            <use xlink:href="#gentle-wave" x="50" y="9" fill="#3461c1" />
        </g> -->
            <g class="parallax4">
                <use
                    xlink:href="#gentle-wave"
                    x="50"
                    y="6"
                    fill="url(#grad1)"
                />
                />
            </g>
        </svg>
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
.vueperslides__parallax-wrapper {
    //   height: 30rem;
}
</style>
<style lang="scss" scoped>
.hero-container {
    height: 60vh;
}
.slider {
    height: 100%;
    overflow: hidden;
}
.content {
    background: rgb(41, 24, 76);
    // background: linear-gradient(90deg, rgba(41,24,76,1) 7%, rgba(77,115,173,0.14607841427586654) 100%);   height: 100%;
    background: linear-gradient(
        90deg,
        var(--color-primary),
        var(--color-secondary)
    );
    padding-top: 4rem;
}
.header {
    margin-bottom: 2rem;
    letter-spacing: 0.1rem;
    margin-top: 6rem;
}
.sub-header {
    line-height: 1.9rem;
    letter-spacing: 0.01rem;
}
.editorial {
    display: block;
    width: 100%;
    height: 60px;
    max-height: 60px;
    margin: 0;
    z-index: 99;
    bottom: 0;
    position: absolute;
    left: 0px;
    float: left;
}
.cta {
    color: #e8e8e8;
    font-size: 1.5rem;
    padding: 0.6rem 2rem;
    font-weight: 600;
    background-color: var(--color-secondary);
    box-shadow: 0 2px 10px var(--color-primary-tint-4);
}
.seccoundary {
    color: #fff;
    background-color: var(--color-primary);
    padding: 0.6rem 1.5rem;
}
.parallax1 > use {
    // animation: move-forever1 10s linear infinite;
    &:nth-child(1) {
        animation-delay: -2s;
    }
}
.parallax2 > use {
    // animation: move-forever2 8s linear infinite;
    &:nth-child(1) {
        animation-delay: -2s;
    }
}
.parallax3 > use {
    // animation: move-forever3 6s linear infinite;
    &:nth-child(1) {
        animation-delay: -2s;
    }
}
.parallax4 > use {
    // animation: move-forever4 4s linear infinite;
    &:nth-child(1) {
        animation-delay: -2s;
    }
}
@keyframes move-forever1 {
    0% {
        transform: translate(85px, 0%);
    }
    100% {
        transform: translate(-90px, 0%);
    }
}
@keyframes move-forever2 {
    0% {
        transform: translate(-90px, 0%);
    }
    100% {
        transform: translate(85px, 0%);
    }
}
@keyframes move-forever3 {
    0% {
        transform: translate(85px, 0%);
    }
    100% {
        transform: translate(-90px, 0%);
    }
}
@keyframes move-forever4 {
    0% {
        transform: translate(-90px, 0%);
    }
    100% {
        transform: translate(85px, 0%);
    }
}
</style>
