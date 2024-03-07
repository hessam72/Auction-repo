<template>
    <div id="hero-section" class=" relative">
        <div id="head-line" class="hero-container flex w-full relative">

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
                        <!-- <button
                            class="cta transition ease-in-out bg-sky-500 hover:bg-sky-700 px-3 py-1.5 rounded text-slate-900 rounded-full"
                        >
                            Start Bidding
                        </button> -->
                        <button class="cssbuttons-io">
                            <span>
                                <!-- <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 0h24v24H0z" fill="none"></path>
      <path
        d="M24 12l-5.657 5.657-1.414-1.414L21.172 12l-4.243-4.243 1.414-1.414L24 12zM2.828 12l4.243 4.243-1.414 1.414L0 12l5.657-5.657L7.07 7.757 2.828 12zm6.96 9H7.66l6.552-18h2.128L9.788 21z"
        fill="currentColor"
      ></path>
    </svg> -->
                                Start Bidding</span>
                        </button>

                        <button
                            class="seccoundary transition ease-in-out bg-sky-200 hover:bg-sky-400 px-3 py-1.5 rounded text-slate-900 rounded-full">
                            Learn more
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <svg class="editorial" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 
    58-18 88-18s
    58 18 88 18 
    58-18 88-18 
    58 18 88 18
    v44h-352z" />
                <linearGradient id="grad1" x1="0%" x2="100%" y1="0%" y2="0%">
                    <stop offset="10%" stop-color="rgb(178 195 219)" />
                    <stop offset="80%" stop-color="rgb(232 232 232)" />
                </linearGradient>
            </defs>
            <g class="parallax1">
                <use xlink:href="#gentle-wave" x="50" y="3" fill="rgb(41, 24, 76)" />
            </g>
            <g class="parallax2">
                <use xlink:href="#gentle-wave" x="50" y="0" fill="rgb(77, 115, 173) " />
            </g>
            <!-- <g class="parallax3">
            <use xlink:href="#gentle-wave" x="50" y="9" fill="#3461c1" />
        </g> -->
            <g class="parallax4">
                <use xlink:href="#gentle-wave" x="50" y="6" fill="url(#grad1)" />
                />
            </g>
        </svg>
        <div class="fade-in" id="scroll-down-animation">
            <a id="scroll_down_link" href="#auctions">
                <span class="mouse">
                    <span class="move"></span>
                </span>
                <h2 id="scroll-header">Scroll down</h2>
            </a>
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
    mounted() {
         //Smooth Scrolling Using Navigation Menu
      $('#scroll_down_link').on("click", function (e) {
        $('#scroll-down-animation').removeClass('fade-in');
        $('#scroll-down-animation').addClass('fade-out');
        $("html,body").animate(
          {
            scrollTop: $($(this).attr("href")).offset().top - 100,
          },
          900
        );
        e.preventDefault();
      });
      // apear scrolldown icon on top
      //On Scroll Functionality
      $(window).scroll(() => {
      
        var windowTop = $(window).scrollTop();
        if (windowTop < 100) {
           //on top
           $('#scroll-down-animation').removeClass('fade-out');
        $('#scroll-down-animation').addClass('fade-in-slow');
        } 
       
      });
    },
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
    background: rgb(41, 24, 76);
    // background: linear-gradient(90deg, rgba(41,24,76,1) 7%, rgba(77,115,173,0.14607841427586654) 100%);   height: 100%;
    background: linear-gradient(90deg,
            var(--color-primary),
            var(--color-secondary));
    padding-top: 4rem;
    margin-bottom: 4rem;
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
    bottom: .5rem;
    position: absolute;
    left: 0px;
    float: left;
    background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
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

.parallax1>use {

    // animation: move-forever1 10s linear infinite;
    &:nth-child(1) {
        animation-delay: -2s;
    }
}

.parallax2>use {

    // animation: move-forever2 8s linear infinite;
    &:nth-child(1) {
        animation-delay: -2s;
    }
}

.parallax3>use {

    // animation: move-forever3 6s linear infinite;
    &:nth-child(1) {
        animation-delay: -2s;
    }
}

.parallax4>use {

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




// cta 
.cssbuttons-io {
    position: relative;
    font-family: inherit;
    font-weight: 500;
    font-size: 18px;
    letter-spacing: 0.05em;
    border-radius: 8em;
    cursor: pointer;
    border: none;
    background: linear-gradient(to right, var(--color-secondary), #4614ab);
    color: ghostwhite;
    overflow: hidden;
    padding: 0.5rem 1.7rem;

}

.cssbuttons-io svg {
    width: 1.2em;
    height: 1.2em;
    margin-right: 0.5em;
}

.cssbuttons-io span {
    position: relative;
    z-index: 10;
    transition: color 0.4s;
    display: inline-flex;
    align-items: center;
    padding: 0.8em 1.2em 0.8em 1.05em;
}

.cssbuttons-io::before,
.cssbuttons-io::after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.cssbuttons-io::before {
    content: "";
    background: #000;
    width: 120%;
    left: -10%;
    transform: skew(30deg);
    transition: transform 0.4s cubic-bezier(0.3, 1, 0.8, 1);
}

.cssbuttons-io:hover::before {
    transform: translate3d(100%, 0, 0);
}

.cssbuttons-io:active {
    transform: scale(0.95);
}

//scroll btn



#scroll-down-animation {
    position: absolute;
    bottom: -1rem;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 99;
    cursor: pointer;
    // transition: all .3;
   


}
.fade-in{
    animation: fade-in 0.7s cubic-bezier(0.85, 0, 0.15, 1) 2s 1 normal
        both;
}.fade-in-slow{
    animation: fade-in 0.7s cubic-bezier(0.85, 0, 0.15, 1) 3.5s 1 normal
        both;
}

.fade-out{
     animation: fade-out 0.7s cubic-bezier(0.85, 0, 0.15, 1) .5s 1 normal
        both;
}

#scroll-header {
    color: #fff;
    font-family: 'Roboto', 'Arial', sans-serif;
    font-weight: 200;
    font-size: 16px;
}

.mouse {
    margin: 0 auto;
    display: block;
    border-radius: 50px;
    border: 2px solid #fff;
    height: 70px;
    width: 35px;
    position: relative;

}

.move {
    position: absolute;
    background-color: #fff;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    left: 50%;
    transform: translateX(-50%);
    animation: move 2s linear infinite;
}

@keyframes move {
    0% {
        transform: translate(-50%, 10px);
        opacity: 0;
    }

    50% {
        transform: translate(-50%, 30px);
        opacity: 1;
    }

    100% {
        transform: translate(-50%, 60px);
        opacity: 0;
    }
}

</style>
