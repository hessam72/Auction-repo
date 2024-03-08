<template>
    <single-nav></single-nav>
    <bread-crumps v-bind:history="history" :current="current"></bread-crumps>
    <hero-section></hero-section>
    <div class="winners-container flex flex-col">
        <div class="header">
            <h1 class="test_color">Our Latest Winners</h1>
        </div>
        <div class="box-container winners-list-container">
            <div class="container">
                <div class="card">
                    <div class="card__image-container">
                    </div>

                    <svg class="card__svg" viewBox="0 0 800 500">

                        <path
                            d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500"
                            stroke="transparent" fill="#333"></path>
                        <path class="card__line"
                            d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400"
                            stroke="pink" stroke-width="3" fill="transparent"></path>
                    </svg>

                    <div class="card__content">
                        <div class="image">
                            <img :src="'/storage/images/product_images/trans-macbook-2.png'" />
                        </div>
                        <p class="card__title">Lorem ipsum</p>
                        <p>Soluta dolor praesentium at quod autem omnis, amet earum nesciunt porro.</p>
                    </div>
                </div>
            </div>



            <inline-loading :is_loading_more></inline-loading>

        </div>

        <InfiniteLoading @infinite="loadData" />
    </div>


    <fixed-buttons></fixed-buttons>
</template>
<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots


</script>
<script>
import heroSection from "../../../components/winners/hero.vue";
import singleNav from "../../../components/global/singleNav.vue";
import breadCrumps from "../../../components/global/breadCrumps.vue";

import fixedButtons from "../../../components/utilities/fixedButtons.vue";

export default {
    data() {
        return {
            show_more: false,
            show_more2: false,
            is_loading_more: false,

            history: [
                {
                    name: "Home",
                    url: "/vue/v1"
                },

            ],
            current: "Winners"
        }
    },
    methods: {
        loadData($state) {

            //calling the api
            // alert('load more');
            this.is_loading_more = true;
            setTimeout(() => {
                this.is_loading_more = false;
                if (this.show_more) {
                    this.show_more2 = true;
                }
                this.show_more = true;
            }, 2000);
            return;

        },
    },
    components: {
        heroSection,
        fixedButtons,
        singleNav,
        breadCrumps
    },
};
</script>

<style lang="scss" scoped>
.box-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    padding: 40px 0;
}

.box-container .box {
    position: relative;
    // width: 320px;
    // height: 400px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 40px 30px;
    transition: 0.5s;
    width: 90%;
}

.box-container .box::before {
    content: " ";
    position: absolute;
    top: -15%;
    width: 7%;
    height: 130%;
    text-decoration: none;
    background: #fff;
    border-radius: 8px;
    transform: skewX(15deg);
    transition: 0.5s;
}

.box-container .box::after {
    content: "";
    position: absolute;
    top: -7%;
    width: 14%;
    height: 120%;
    border-radius: 8px;
    transform: skewX(15deg);
    transition: 0.5s;
    filter: blur(30px);

}

.box-container .box:hover:before,
.box-container .box:hover:after {
    transform: skewX(0deg);
    left: 42%;
    width: 11%;

}

.box-container .box:before,
.box-container .box:after {
    background: linear-gradient(180deg, var(--color-primary-tint-6) 0%, var(--color-primary) 100%);

}

// .box-container .box:nth-child(2):before,
// .box-container .box:nth-child(2):after {
//     background: linear-gradient(315deg, #03a9f4, #ff0058)
// }

// .box-container .box:nth-child(3):before,
// .box-container .box:nth-child(3):after {
//     background: linear-gradient(315deg, #4dff03, #00d0ff)
// }

.box-container .box span {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 5;
    pointer-events: none;
}

.box-container .box span::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 0;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    opacity: 0;
    transition: 0.1s;
    animation: animate 2s ease-in-out infinite;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08)
}

.box-container .box:hover span::before {
    top: -50px;
    left: 50px;
    width: 100px;
    height: 100px;
    opacity: 1;
}

.box-container .box span::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    opacity: 0;
    transition: 0.5s;
    animation: animate 2s ease-in-out infinite;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    animation-delay: -1s;

}

.box-container .box:hover span:after {
    bottom: -50px;
    right: 50px;
    width: 100px;
    height: 100px;
    opacity: 1;
}

@keyframes animate {

    0%,
    100% {
        transform: translateY(10px);
    }

    50% {
        transform: translate(-10px);
    }
}

.box-container .box .content {
    position: relative;
    left: 0;
    padding: 20px 40px;
    background: rgb(255 255 255 / 35%);
    backdrop-filter: blur(10px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    z-index: 1;
    transform: 0.5s;
    color: #565656;
    transition: all .2s ease-in-out;
}

.box-container .box:hover .content {
    // left: -25px;
    padding: 60px 40px;
    background-color: #eeeeeea8;
}

.box-container .box .content h2 {
    font-size: 2em;
    color: #424242;
    margin-bottom: 10px;
}

.box-container .box .content p {
    font-size: 1.1em;
    margin-bottom: 10px;
    line-height: 1.4em;
}

.box-container .box .content a {
    display: inline-block;
    font-size: 1.1em;
    color: #111;
    background: #fff;
    padding: 10px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 700;
    margin-top: 5px;
}

.box-container .box .content a:hover {
    background: #ffcf4d;
    border: 1px solid rgba(255, 0, 88, 0.4);
    box-shadow: 0 1px 15px rgba(1, 1, 1, 0.2);
}








// *********************

.winners-container {
    margin-top: 5rem;

    .header {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        border-bottom: 3px solid;
        width: 85%;
        margin: auto;
        padding-bottom: 3rem;
    }
}

.winners-list-container {
    display: flex;
    flex-direction: column;
    gap: 5rem;
    margin-top: 5rem;
    margin-bottom: 3rem;
}

.winner {
    width: 90%;
    margin: auto;
    padding: 2rem 2rem;
    box-shadow: 0 2px 10px #333;
    border-radius: 13px;
    background: #eee;
    justify-content: space-between;
}

.product {
    width: 40%;
    // border-right: 1.5px solid #777;

    .image {
        width: 40rem;
        margin-right: 1rem;
        -webkit-filter: drop-shadow(5px 5px 5px #2f1d55);
        filter: drop-shadow(5px 5px 5px #2f1d55);

    }

    .product-info {
        h2 {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 1.5rem;

        }

        p {
            margin-bottom: 1.5rem;
        }
    }
}

.winner-info {
    width: 40%;

    .user {
        p {
            font-size: 1.1rem;
            font-weight: 500;
        }

        img {
            box-shadow: 0 2px 10px #666;
            border: 1px solid #eee;
        }
    }

    .win-info {
        gap: 1.2rem;

        .win-row {
            width: 18rem;
            justify-content: space-between;
            font-size: 1.2rem;
            font-weight: 500;

        }
    }
}

// @import '../../../../../css/scss/variables'; 

// .test_color{
//     color:var(--primary-color) !important ;
//     background-color:var(--primary-color)  !important;
// }

//card styles
.container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 450px;
//   background: #444;
  border-radius: 10px;
}

.card {
  position: relative;
  background: #333;
  width: 550px;
  height: 450px;
  border-radius: 10px;
  padding: 2rem;
  color: #aaa;
  box-shadow: 0 .25rem .25rem rgba(0,0,0,0.2),
    0 0 1rem rgba(0,0,0,0.2);
  overflow: hidden;
}

.card__image-container {
  margin: -2rem -2rem 1rem -2rem;
}

.card__line {
  opacity: 0;
  animation: LineFadeIn 1.8s 1.8s forwards ease-in;
}

.card__image {
  opacity: 0;
  animation: ImageFadeIn 1.8s 2s forwards;
}

.card__title {
  color: white;
  margin-top: 35px;
  margin-bottom: 10px;
  font-weight: 800;
  letter-spacing: 0.01em;
}

.card__content {
  margin-top: -1rem;
  opacity: 0;
  animation: ContentFadeIn .8s 1.6s forwards;
}

.card__svg {
  position: absolute;
  left: 0;
  top: 115px;
}

@keyframes LineFadeIn {
  0% {
    opacity: 0;
    d: path("M 0 300 Q 0 300 0 300 Q 0 300 0 300 C 0 300 0 300 0 300 Q 0 300 0 300 ");
    stroke: #fff;
  }

  50% {
    opacity: 1;
    d: path("M 0 300 Q 50 300 100 300 Q 250 300 350 300 C 350 300 500 300 650 300 Q 750 300 800 300");
    stroke: #888BFF;
  }

  100% {
    opacity: 1;
    d: path("M -2 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 802 400");
    stroke: #545581;
  }
}

@keyframes ContentFadeIn {
  0% {
    transform: translateY(-1rem);
    opacity: 0;
  }

  100% {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes ImageFadeIn {
  0% {
    transform: translate(-.5rem, -.5rem) scale(1.05);
    opacity: 0;
    filter: blur(2px);
  }

  50% {
    opacity: 1;
    filter: blur(2px);
  }

  100% {
    transform: translateY(0) scale(1.0);
    opacity: 1;
    filter: blur(0);
  }
}

.image{
    width: 75%;
}



</style>