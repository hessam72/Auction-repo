<template>
    <single-nav></single-nav>
    <bread-crumps v-bind:history="history" :current="current"></bread-crumps>
    <div class="index-container flex">
        <div class="main-section">
            <div class="first-section flex">
                <div class="gallery-container">
                    <div class="header flex flex-col">
                        <h2>Product Name</h2>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ab reprehenderit, eos perspiciatis
                            repellendu</h3>
                        <p>buy it now for $750</p>
                    </div>
                    <div class="gallery">
                        <div class="slider">
                            <div class="slide"><img
                                    src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=3398&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
                                <!-- <p>rutrum tellus a tempus :)</p> -->
                            </div>

                            <div class="slide"><img
                                    src="https://images.unsplash.com/photo-1583394838336-acd977736f90?q=80&w=3419&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
                                <!-- <p>litora torquent per conubia</p> -->
                            </div>
                            <div class="slide"><img
                                    src="https://images.unsplash.com/photo-1503602642458-232111445657?q=80&w=3387&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
                                <!-- <p>sed consectetur faucibus</p> -->
                            </div>
                            <div class="slide"><img
                                    src="https://images.unsplash.com/photo-1560343090-f0409e92791a?q=80&w=3024&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
                                <!-- <p>eleifend tempus justo</p> -->
                            </div>

                        </div>
                        <button id="next_slide">
                            <ion-icon name="fastforward"></ion-icon>
                        </button>
                    </div>

                </div>
                <div class="kernel-container flex flex-col">
                    <div class="tags flex">
                        <div class="icon-container">
                            <ion-icon class="not-saved" name="bookmark"></ion-icon>
                            <p>Save Auction</p>
                        </div>
                        <div class="icon-container">
                            <ion-icon name="lock"></ion-icon>
                            <p>$5 No Jumper Limit</p>
                        </div>
                    </div>
                    <div class="kernel">
                        <div class="k-header flex justify-between items-center">
                            <h2>Current Bid</h2>
                            <h2 class="price">$54.21</h2>
                        </div>
                        <div class="current-winner-section">
                            <div class="size">
                                <div class="pic-container">
                                    <div class="border-wrap">
                                        <img class="user_img" :src="'/storage/images/user_profiles/150-11.jpg'" />
                                    </div>
                                </div>
                                <div class="winner-info">
                                    <h3>Flora timony</h3>
                                    <h4>Current Heighest bidder</h4>
                                    <h4><ion-icon name="pin"></ion-icon>
                                        florida</h4>
                                </div>
                            </div>
                        </div>
                        <div class="history-section">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="tabel-container overflow-hidden">
                                            <table class="min-w-full text-left text-sm font-light">
                                                <thead style="background-color: #2e1a58cc;"
                                                    class="tabel-header border-b bg-neutral-500 font-medium dark:border-neutral-500 ">
                                                    <tr>

                                                        <th scope="col" class="px-6 py-4">Bid</th>
                                                        <th scope="col" class="px-6 py-4">User</th>
                                                        <th scope="col" class="px-6 py-4">Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="tabel-row bg-neutral-100 dark:border-neutral-500 ">
                                                        <td class="whitespace-nowrap ">Otto</td>
                                                        <td class="whitespace-nowrap ">Mark</td>
                                                        <td class="whitespace-nowrap ">@mdo</td>
                                                    </tr>
                                                    <tr class="tabel-row bg-white dark:border-neutral-500 ">
                                                        <td class="whitespace-nowrap ">Jacob</td>
                                                        <td class="whitespace-nowrap ">Thornton</td>
                                                        <td class="whitespace-nowrap ">@fat</td>
                                                    </tr>
                                                    <tr class="tabel-row bg-neutral-100 dark:border-neutral-500 ">
                                                        <td class="whitespace-nowrap ">Mark</td>
                                                        <td class="whitespace-nowrap ">Otto</td>
                                                        <td class="whitespace-nowrap ">@mdo</td>
                                                    </tr>
                                                    <tr class="tabel-row bg-white dark:border-neutral-500 ">
                                                        <td class="whitespace-nowrap ">Jacob</td>
                                                        <td class="whitespace-nowrap ">Thornton</td>
                                                        <td class="whitespace-nowrap ">@fat</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timer-section">
                            <h3>Time Left</h3>
                            <div class="auction-timer">
                                <vue-countdown :time="1 * 60 * 60 * 1000" v-slot="{ hours, minutes, seconds }">
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
                        <div class="btn-container flex justify-between items-center">
                            <button class="bid-now">Bid Now</button>
                            <button class="launch-buddy">Lunch Bid Buddy</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- users -->
            <users-section></users-section>
           <product-content></product-content>
           <reviews-section></reviews-section>
        </div>
        <div class="side-section flex flex-col">
            <div class="item-container relative">
                <div class="no-new-bidders">no new bidders</div>
                <div class="bookmark-container">
                    <ion-icon class="icon-bg" name="bookmark"></ion-icon>
                    <ion-icon class="icon-border" name="bookmark-outline"></ion-icon>
                </div>
                <div class="rounded-t-3xl overflow-hidden">
                    <div class="auction-img">
                        <p class="card-title">macbook air m2</p>
                        <img class="w-full" :src="'/storage/images/product_images/macbook-2.jpg'"
                            alt="Sunset in the mountains" />
                    </div>
                    <div class="content flex flex-col gap-2.5 py-5 px-7">
                        <div class="header flex flex-col gap-1">
                            <p class="live-price">$0.57</p>
                            <p class="current-winner">ahmad_ali_24</p>
                        </div>
                        <div class="auction-timer">
                            <vue-countdown :time="1 * 60 * 60 * 1000" v-slot="{ hours, minutes, seconds }">
                                <div class="count-down">
                                    <div class="number">{{ hours }}</div>
                                    <div class="seperator">:</div>
                                    <div class="number">{{ minutes }}</div>
                                    <div class="seperator">:</div>
                                    <div class="number">{{ seconds }}</div>
                                </div>
                            </vue-countdown>
                        </div>
                        <button class="btn-primary w-full">Bid Now</button>

                        <button class="btn-secoundary">
                            Buy it Now for 1020$
                        </button>
                    </div>
                </div>
            </div>
            <div class="item-container relative">
                <div class="bookmark-container">
                    <ion-icon class="icon-bg" name="bookmark"></ion-icon>
                    <ion-icon class="icon-border" name="bookmark-outline"></ion-icon>
                </div>
                <div class="rounded-t-3xl overflow-hidden">
                    <div class="auction-img">
                        <p class="card-title">macbook pro m1</p>
                        <img class="w-full" :src="'/storage/images/product_images/macbook-1.jpeg'"
                            alt="Sunset in the mountains" />
                    </div>
                    <div class="content flex flex-col gap-2.5 py-5 px-7">
                        <div class="header flex flex-col gap-1">
                            <p class="live-price">$5.31</p>
                            <p class="current-winner">ahmad_ali_24</p>
                        </div>

                        <div class="auction-timer">
                            <vue-countdown :time="7 * 60 * 60 * 1000" v-slot="{ hours, minutes, seconds }">
                                <div class="count-down">
                                    <div class="number">{{ hours }}</div>
                                    <div class="seperator">:</div>
                                    <div class="number">{{ minutes }}</div>
                                    <div class="seperator">:</div>
                                    <div class="number">{{ seconds }}</div>
                                </div>
                            </vue-countdown>
                        </div>
                        <button class="btn-primary w-full">Bid Now</button>
                        <button class="btn-secoundary">
                            Buy it Now for 1020$
                        </button>
                    </div>
                </div>
            </div>
            <div class="item-container relative">
                <div class="bookmark-container">
                    <ion-icon class="icon-bg" name="bookmark"></ion-icon>
                    <ion-icon class="icon-border" name="bookmark-outline"></ion-icon>
                </div>
                <div class="rounded-t-3xl overflow-hidden">
                    <div class="auction-img">
                        <p class="card-title">iphone 13 pink</p>
                        <img class="w-full" :src="'/storage/images/product_images/iphone-3.jpg'"
                            alt="Sunset in the mountains" />
                    </div>
                    <div class="content flex flex-col gap-2.5 py-5 px-7">
                        <div class="header flex flex-col gap-1">
                            <p class="starting_time">Today at 5:58 PM</p>
                            <p class="current-winner">
                                Bid during last 9 seconds.
                            </p>
                        </div>

                        <div class="auction-timer">
                            <vue-countdown :time="13 * 60 * 60 * 1000" v-slot="{ hours, minutes, seconds }">
                                <div class="count-down">
                                    <div class="number">{{ hours }}</div>
                                    <div class="seperator">:</div>
                                    <div class="number">{{ minutes }}</div>
                                    <div class="seperator">:</div>
                                    <div class="number">{{ seconds }}</div>
                                </div>
                            </vue-countdown>
                        </div>
                        <button class="w-full startingsoon-btn">
                            Starting Soon
                        </button>
                        <button class="btn-secoundary">
                            Buy it Now for 1020$
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <fixed-buttons></fixed-buttons>
</template>
<script>
import singleNav from "../../../components/global/singleNav.vue";
import usersSection from "../../../components/auctions/index/users_section.vue";
import productContent from "../../../components/auctions/index/product_content.vue";
import reviewsSection from "../../../components/auctions/index/reviews.vue";
import breadCrumps from "../../../components/global/breadCrumps.vue";
import { init_elastic_slider } from "@/modules/utilities/elastic_slider.js";
import fixedButtons from "../../../components/utilities/fixedButtons.vue";
export default {
    data() {
        return {
            history: [
                {
                    name: "Home",
                    url: "/vue/v1"
                },
                {
                    name: "Auctions",
                    url: "/vue/v1/auctions"
                }
            ],
            current: "Index"
        }
    },
    components: {
        fixedButtons,
        singleNav,
        breadCrumps,
        usersSection,
        productContent,
        reviewsSection
    },
    mounted() {
        // Elastic Slider (c) 2014 // Taron Mehrabyan // Ruben Sargsyan
        init_elastic_slider();

    },
}

</script>
<style lang="scss" scoped>
.index-container {
    min-height: 70vh;
    width: 100%;
}

.main-section {
    width: 75%;

}

.side-section {
    width: 25%;

    .item-container {
        width: 80%;
        margin: auto;
        margin-top: 5rem;
        filter: grayscale(1);
        -webkit-filter: grayscale(1);
        transition: all .4s ease;

    }

    .item-container:hover {
        filter: grayscale(0);
        -webkit-filter: grayscale(0);

    }


}

.side-section:last-child {
    margin-bottom: 7rem;
}

.first-section {
    margin-bottom: 3rem;
    padding-bottom: 3rem;
    border-bottom: 1.5px solid #777;
}

.gallery-container {
    width: 50%;
    position: relative;
    padding: 0 2rem;

    .gallery {
        height: 40rem;
        width: auto;
        position: relative;
        margin-top: -4rem;

        button {
            position: absolute;
            padding: 0.5rem 2rem;
            bottom: 0;
            left: 37%;
            box-shadow: 0 2px 8px #333;
            border-radius: 50px;
            display: flex;
            transition: all .5s ease;
            color: #261749;
            z-index: 3;

            ion-icon {
                font-size: 2.5rem;

            }
        }

        button:hover {
            background-color: #261749;
            color: #fff;

            ion-icon {
                color: #fff;
            }
        }
    }

    .header {
        color: #221d37de;
        padding: 4rem 0 0 3rem;
        gap: 1rem;

        h2 {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            margin-bottom: 1.5rem;

        }

        h3 {

            font-size: 1.3rem;
            letter-spacing: .5px;
            font-weight: 500;
        }
    }
}

.kernel-container {
    padding: 0 2rem;
    width: 50%;

    .tags {
        justify-content: right;
        align-items: center;
        text-align: center;
        gap: 3rem;
        padding-top: 4rem;
        color: #35334c;
        font-size: 1rem;
        font-weight: 500;

        .icon-container {
            ion-icon {
                font-size: 2.7rem;

            }

            .not-saved {
                color: #aaa;
                cursor: pointer;
                transition: all .3s ease;
            }
        }
    }

    .kernel {
        margin-top: 1.5rem;
        box-shadow: 0 2px 20px #6451d8;
        padding: 0 2rem;
        border-radius: 20px;
        border: 1px solid #fff;
        background-color: #efdbff9c;

        .k-header {
            padding: 1.5rem 0.5rem;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            border-bottom: 1.8px solid #999;
            color: #261749;

            .price {
                color: #5dd01c;
            }
        }
    }
}

.auction-kernel-container {}


.participaints {}

.product-info-container {}

.reviews-container {}

.tabel-row {
    td {
        padding: .4rem;
        padding-left: 1.3rem;
    }
}

.tabel-container {
    border-radius: 10px;
    // width: 90%;
    margin: auto;
}

.tabel-header {
    tr {
        th {
            color: #fff;
        }
    }
}



.size {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 1rem;
    padding-left: 0.6rem;
    margin-bottom: 1rem;
    border-bottom: 1.8px solid #999;
    padding-bottom: 0.8rem;

    h3 {
        color: #4838ab;
        margin-right: 10px;
        letter-spacing: 1px;
        font-size: 1.6rem;
        font-weight: 600;
    }

    h4 {
        color: #444;
        margin-right: 10px;
        letter-spacing: .7px;
        font-size: 1rem;
        font-weight: 500;
    }




}

.pic-container {
    position: relative;
    display: flex;
    justify-content: start;
    gap: 0.5rem;
    flex-direction: column;
    align-items: center;
    margin-bottom: 1rem;

    .title {
        // padding-top: 1.5rem;
        z-index: 1;

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

    .border-wrap {

        background: linear-gradient(to right, rgb(99 80 215), rgb(236 236 236));

        border-radius: 100px;

        .user_img {
            width: 9rem;
            border-radius: 200px;
            height: 9rem;
            filter: grayscale(100%);
            box-shadow: 0 3px 5px rgb(115 114 114);
            color: white;
            padding: 0.15rem;
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

.winner-info {
    text-align: left;
    padding-left: 0.7rem;
    line-height: 2;
}

.timer-section {
    margin-top: 1rem;
    border-bottom: 1px solid #888;
    padding-bottom: 1rem;

    h3 {
        font-size: 1rem;
        font-weight: 600;
        color: #210000;
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .auction-timer {
        .count-down {
            margin-left: 20%;

            .number {
                background-color: #77141f;
            }
        }
    }
}

.btn-container {
    margin: 2rem 0;

    button {
        padding: 1.2rem 3rem;
        background-color: #372065;
        border-radius: 15px;
        color: #fff;
        font-size: 1.3rem;
        font-weight: 500;
        transition: all 0.5s ease;
    }

    button:hover {
        transform: scale(0.95);
        box-shadow: 0 8px 15px #997add;
        border-radius: 35px;
    }
}


.history-section {
    border-bottom: 1px solid #888;
    padding-bottom: 1rem;
}</style>