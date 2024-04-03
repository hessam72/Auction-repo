<template>
    <single-nav></single-nav>
    <bread-crumps v-bind:history="history" :current="current"></bread-crumps>
    <hero-section></hero-section>
    <div class="winners-container flex flex-col">
        <div class="header">
            <h1 class="test_color">Our Latest Winners</h1>
        </div>
        <div class="box-container winners-list-container">
            <div v-for="(item, index) in winners" :key="index" class="box">
                <span></span>
                <div class="content winner flex gap-10">
                    <div class="product flex justify-center items-center">
                        <div class="image">
                            <img
                                :src="
                                    '/storage/' +
                                    item.product.product_galleries[0].image
                                "
                            />
                        </div>
                        <div class="product-info flex flex-col">
                            <h2>{{ item.product.title }}</h2>
                            <p>{{ item.product.short_desc }}</p>
                            <p>
                                ended {{ calDaysPassed(item.created_at) }} days
                                ago
                            </p>
                        </div>
                    </div>
                    <div class="winner-info flex gap-10">
                        <div
                            class="user flex flex-col justify-center items-center gap-5"
                        >
                            <img
                                class="rounded-full"
                                :src="'/storage/' + item.user.profile_pic"
                                onerror="this.src='/storage/images/user_profiles/blank.png'"   
                            />
                            <p>{{ item.user.username }}</p>
                        </div>
                        <div
                            class="win-info flex flex-col justify-center items-left"
                        >
                            <div class="win-row flex">
                                <p>Final Price</p>
                                <p>${{ item.win_price }}</p>
                            </div>
                            <div class="win-row flex">
                                <p>Total Bids</p>
                                <p>{{ item.bids_placed }}</p>
                            </div>
                            <div class="win-row flex">
                                <p>Buy it Now Price</p>
                                <p>${{ item.product.price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <inline-loading :is_loading_more></inline-loading>
        </div>

        <InfiniteLoading @infinite="loadMore" />
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
import { mapGetters, mapActions } from "vuex";
import { calDaysPassed } from "@/modules/utilities/convertor.js";
import fixedButtons from "../../../components/utilities/fixedButtons.vue";

export default {
    data() {
        return {
            is_loading_more: false,

            history: [
                {
                    name: "Home",
                    url: "/vue/v1",
                },
            ],
            current: "Winners",
            winners: [],
            localUrl: "winners/all",
            is_loading: false,
         
            skip: 0,
            take: 3,
        };
    },
    methods: {
        loadMore() {
            this.is_loading_more = true;
            this.skip = this.winners.length;

            this.fetchWinners(1);
        },

        fetchWinners(loading_more = 0) {
            if (!loading_more) this.is_loading = true;
            var url = this.baseUrl + this.localUrl;
            // if (this.$route.query.page) {
            url = url + "?skip=" + this.skip + "&take=" + this.take;
            // }
            axios
                .post(url)
                .then((response) => {
                    console.log(response.data.data);
                    if (loading_more) {
                        // attach to the end of existing array
                        this.winners = this.winners.concat(response.data.data);
                    } else {
                        this.winners = response.data.data;
                    }
                    // console.log(JSON.parse(  JSON.stringify(this.auctions)));
                })
                .catch((error) => {
                    throw error;
                })
                .finally(() => {
                    // always executed

                    this.is_loading = false;
                    this.is_loading_more = false;
                });
        },
    },
    computed: {
        ...mapGetters(["baseUrl"]),
    },
    components: {
        heroSection,
        fixedButtons,
        singleNav,
        breadCrumps,
    },
    watch: {
        $route(to, from) {
            // check to see if rout is correct
            if (to.name != "winners") return;
            //then
            this.fetchWinners();
            // react to route changes...
        },
    },
    created() {
        this.fetchWinners();
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
    background: linear-gradient(
        180deg,
        var(--color-primary-tint-4) 0%,
        var(--color-primary-tint-1) 100%
    );
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
    content: "";
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
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.box-container .box:hover span::before {
    top: -50px;
    left: 50px;
    width: 100px;
    height: 100px;
    opacity: 1;
}

.box-container .box span::after {
    content: "";
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
    transition: all 0.2s ease-in-out;
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
    width: 50%;
    // border-right: 1.5px solid #777;
    display: flex;
    gap: 2rem;
    justify-content: left;
    .image {
        max-width: 20rem;
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
            width: 10rem;
    height: 10rem;
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
</style>
