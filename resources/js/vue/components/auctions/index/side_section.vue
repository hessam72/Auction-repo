<template>
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
</template>
<style lang="scss" scoped>

.side-section {
    width: 25%;
height:70vh;
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

</style>