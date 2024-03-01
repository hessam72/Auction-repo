<template>
    <search-section></search-section>
    <div class="main-container">
        <!-- <div v-show="show_backdrop" class="backdrop">.</div> -->
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
                    <p class="card-title">playstation 5</p>
                    <img class="w-full" :src="'/storage/images/product_images/ps5-2.png'" alt="Sunset in the mountains" />
                </div>
                <div class="content flex flex-col gap-2.5 py-5 px-7">
                    <div class="header flex flex-col gap-1">
                        <p class="live-price">$57.41</p>
                        <p class="current-winner">sara_afx_24</p>
                    </div>

                    <div class="auction-timer">
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


        <div v-if="show_more" class="item-container relative">
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
        <div v-if="show_more" class="item-container relative">
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
        <div v-if="show_more" class="item-container relative">
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
        <div v-if="show_more" class="item-container relative">
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

        <div v-if="show_more2" class="item-container relative">
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
        <div v-if="show_more2" class="item-container relative">
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
        <div v-if="show_more2" class="item-container relative">
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
        <div v-if="show_more2" class="item-container relative">
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

    </div>
    <div v-if="is_loading_more" class="loading-container">
        <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
            role="status">
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
    </div>
    <InfiniteLoading @infinite="loadData" />
</template>
<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots


</script>

<script>
import searchSection from "./searchSection.vue";
export default {
    data() {
        return {
            is_loading_more: false,
            show_more:false,
            show_more2:false,
        }
    },
    methods: {
        loadData($state) {
            //calling the api
            // alert('load more');
            this.is_loading_more = true;
            setTimeout( ()=> {
                this.is_loading_more = false;
                if(this.show_more){
                    this.show_more2=true;
                }
                this.show_more=true;
            }, 2000);

        },
    },
    components: {
        searchSection
    }

}
</script>
<style lang="scss" scoped>
.main-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 1rem;
    padding: 1rem 5rem;
    margin-top: 3rem;
    position: relative;
    margin-bottom: 8rem;
}

.loading-container {

    width: 100%;
    margin: auto;
    text-align: center;
    margin-top: -7rem;
    margin-bottom: 6rem;
}

.section-seperator {
    margin-top: 5rem;
}


</style>