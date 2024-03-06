<template>
    <page-title :title="'Challenges'"></page-title>

    <div class="challenges">
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <p class="title">Place 50 Bids</p>

                    <div class="challenge-prize">
                        <div id="content">
                            <aside class="ribbon">
                                <h2
                                    style="
                                        font-size: 1.3rem;
                                        letter-spacing: 1.2px;
                                    "
                                >
                                    Win 150 Bids
                                </h2>
                            </aside>
                        </div>
                    </div>

                    <vue-countdown
                        :time="2 * 15 * 60 * 60 * 1000"
                        v-slot="{ days, hours, minutes, seconds }"
                    >
                        <div id="countdown">
                            <div id="tiles">
                                <span>{{ days }}</span>
                                <span>{{ hours }}</span>
                                <span> {{ minutes }}</span>
                                <span> {{ seconds }}</span>
                            </div>
                            <div class="labels">
                                <li>Days</li>
                                <li>Hours</li>
                                <li>Mins</li>
                                <li>Secs</li>
                            </div>
                        </div>
                    </vue-countdown>
                </div>
                <div class="flip-card-back">
                    <p class="title">How To Win</p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Vel consequatur beatae dignissimos similique autem
                        rerum pariatur dicta eligendi! Qui.
                    </p>
                    <div class="progress flex justify-between items-center">
                        <p>remaining:</p>
                        <p>140/500</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <p class="title">Win 1 Auction</p>

                    <div class="challenge-prize">
                        <div id="content">
                            <aside class="ribbon">
                                <h2
                                    style="
                                        font-size: 1.3rem;
                                        letter-spacing: 1.2px;
                                    "
                                >
                                    Win 200 Bids
                                </h2>
                            </aside>
                        </div>
                    </div>

                    <vue-countdown
                        :time="2 * 15 * 60 * 60 * 1000"
                        v-slot="{ days, hours, minutes, seconds }"
                    >
                        <div id="countdown">
                            <div id="tiles">
                                <span>{{ days }}</span>
                                <span>{{ hours }}</span>
                                <span> {{ minutes }}</span>
                                <span> {{ seconds }}</span>
                            </div>
                            <div class="labels">
                                <li>Days</li>
                                <li>Hours</li>
                                <li>Mins</li>
                                <li>Secs</li>
                            </div>
                        </div>
                    </vue-countdown>
                </div>
                <div class="flip-card-back">
                    <p class="title">How To Win</p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Vel consequatur beatae dignissimos similique autem
                        rerum pariatur dicta eligendi! Qui.
                    </p>
                    <div class="progress flex justify-between items-center">
                        <p>remaining:</p>
                        <p>140/500</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <p class="title">Place 150 Bids</p>

                    <div class="challenge-prize">
                        <div id="content">
                            <aside class="ribbon">
                                <h2
                                    style="
                                        font-size: 1.3rem;
                                        letter-spacing: 1.2px;
                                    "
                                >
                                    Win 250 Bids
                                </h2>
                            </aside>
                        </div>
                    </div>

                    <vue-countdown
                        :time="1 * 1 * 60 * 60 * 1000"
                        v-slot="{ days, hours, minutes, seconds }"
                    >
                        <div id="countdown">
                            <div id="tiles">
                                <span>{{ days }}</span>
                                <span>{{ hours }}</span>
                                <span> {{ minutes }}</span>
                                <span> {{ seconds }}</span>
                            </div>
                            <div class="labels">
                                <li>Days</li>
                                <li>Hours</li>
                                <li>Mins</li>
                                <li>Secs</li>
                            </div>
                        </div>
                    </vue-countdown>
                </div>
                <div class="flip-card-back">
                    <p class="title">How To Win</p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Vel consequatur beatae dignissimos similique autem
                        rerum pariatur dicta eligendi! Qui.
                    </p>
                    <div class="progress flex justify-between items-center">
                        <p>remaining:</p>
                        <p>140/500</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <inline-loading :is_loading_more></inline-loading> -->

    <!-- <InfiniteLoading @infinite="loadData" /> -->
</template>

<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<script>
export default {
    data() {
        return {
            is_loading_more: false,
            show_more: false,
            show_more2: false,
        };
    },
    mounted() {},
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
        },
    },
};
</script>

<style lang="scss" scoped>
$bg: #e8b5db;
$color-diamond: #c6ed8d;
$color-ribbon: #341e60;
$color-arrow: #8d96ed;
$color-rounded: #fc9e86;
$color-sheer: #85c9ed;

.challenge-prize {
    position: relative;
    top: 1.5rem;
}

#content {
    width: 102%;
    left: 0;
    z-index: 1;
    position: relative;
    box-shadow: 0px 6px 10px #999;
}

aside {
    margin: 20px 0;
    line-height: 34px;
    position: relative;
    cursor: pointer;
    user-select: none;

    &:hover {
        top: -1px;
    }

    &:active {
        top: 1px;
    }

    &.diamond {
        background-color: $color-diamond;

        &:after,
        &:before {
            border-color: transparent $color-diamond;
        }

        &:before {
            left: -17px;
            border-width: 17px 17px 17px 0;
        }

        &:after {
            right: -17px;
            border-width: 17px 0 17px 17px;
        }
    }

    &.ribbon {
        color: #fff;
        background-color: #341e60;
        height: 3.5rem;
        display: flex;
        justify-content: center;
        align-items: center;

        &:before,
        &:after {
            top: 5px;
            z-index: -10;
        }

        &:before {
            border-color: $color-ribbon $color-ribbon $color-ribbon transparent;
            left: -34px;
            border-width: 17px;
            height: 3.5rem;
        }

        &:after {
            border-color: $color-ribbon transparent $color-ribbon $color-ribbon;
            right: -34px;
            border-width: 17px;
            height: 3.5rem;
        }
    }

    &.arrow {
        background-color: $color-arrow;

        &:after,
        &:before {
            border-width: 17px 0 17px 17px;
        }

        &:before {
            border-color: $color-arrow transparent;
            left: -17px;
        }

        &:after {
            border-color: transparent $color-arrow;
            right: -17px;
        }
    }

    &.rounded {
        background-color: $color-rounded;
        border-radius: 25px / 17px;
        left: -20px;
        width: 200px;
    }

    &.sheer {
        background-color: $color-sheer;
        left: -5px;
        width: 170px;

        &:after,
        &:before {
            border-width: 33px 10px 0 0;
        }

        &:before {
            left: -10px;
            border-color: transparent $color-sheer;
        }

        &:after {
            right: -10px;
            border-color: $color-sheer transparent;
        }
    }
}

aside:before,
aside:after {
    content: "";
    position: absolute;
    height: 0;
    width: 0;
    border-style: solid;
    border-width: 0;
}

.bookmarks-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    row-gap: 4rem;
    column-gap: 3rem;
    padding: 3rem 5rem;
}

.loading-container {
    width: 100%;
    margin: auto;
    text-align: center;
    margin-bottom: -2rem;
}
.progress {
    padding: 0 2rem !important;

    p {
        padding: 0 !important;
        font-size: 1.3rem;
        font-weight: 800;
    }
}
.challenge-container {
    width: 90%;
    border: 1.5px solid #666;
    border-radius: 15px;
    padding: 2rem 2rem;
    box-shadow: 0px 3px 13px #666;

    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    // animation: gradient 15s ease infinite;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #aaa;

    .challenge-header {
        div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.3rem;

            font-weight: 500;

            .head {
                // color: #000;
                font-weight: 700;
                text-shadow: 0 6px 5px #d778e66b;
                font-size: 1.3rem;
            }

            .date {
                font-size: 1rem;
            }
        }

        p {
            text-align: left;
            letter-spacing: 0.8px;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
    }

    .challenge-prize {
    }

    .progress {
        margin-top: 1.5rem;
        font-size: 1.3rem;
        font-weight: 500;
        padding: 0.6rem;
        margin-bottom: 1rem;
        p {
            font-size: 1.4rem;
            font-weight: 500;
        }
    }

    .challenge-timer {
        ion-icon {
            font-size: 3.5rem;
            color: #341e60;
            filter: drop-shadow(0px 2px 2px #c420e1);
        }

        font-size: 1.2rem;
        font-weight: 500;
    }
}

.challenge-container:hover {
    scale: 1.03;
}

.count-down {
    gap: 0.5rem;
    font-size: 1.7rem;
    background-color: #fff;
    padding: 0.2rem 1.2rem;
    border-radius: 20px;
    box-shadow: 0px 6px 10px #999;
    color: #333;
}

.challenges {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    row-gap: 4rem;
    column-gap: 4rem;
    padding: 3rem 4rem;
    margin-top: 3rem;
}

//  card hover effect
</style>

<style lang="scss" scoped>
.flip-card {
    background-color: transparent;
    width: 17rem;
    height: 24rem;
    perspective: 1000px;
    font-family: sans-serif;
}

.title {
    font-size: 1.5em;
    font-weight: 900;
    text-align: center;
    margin: 0;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
}

.flip-card-front,
.flip-card-back {
    box-shadow: 0 8px 14px 0 rgba(0, 0, 0, 0.2);
    position: absolute;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    border: 1px solid var(--color-primary-tint-5);
    border-radius: 1rem;
}

.flip-card-front {
    background: linear-gradient(
        120deg,
        var(--color-primary-tint-0) 60%,
        #d4c8e8 88%,
        rgb(255, 211, 195) 40%,
        var(--color-primary-tint-5) 48%
    );
    color: var(--color-primary-shade-2);
}

.flip-card-back {
    background: linear-gradient(
        120deg,
        rgb(255, 174, 145) 30%,
        coral 88%,
        bisque 40%,
        rgb(255, 185, 160) 78%
    );
    background: linear-gradient(
        120deg,
        var(--color-primary-tint-5) 60%,
        var(--color-primary-tint-5) 88%,
        rgb(255, 211, 195) 40%,
        #ac98cd 48%
    );
    color: #eee;
    transform: rotateY(180deg);

    p {
        padding: 1rem 2rem;
        text-align: left;
        line-height: 1.7rem;
        letter-spacing: 0.3px;
    }
}
</style>
<!-- timer -->

<style scoped lang="scss">
#countdown {
    width: max-content;
    height: 10rem;
    text-align: center;
    background: #222;
    border: 1px solid #111;
    border-radius: 5px;
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.6);
    padding: 0.5rem;
    position: relative;
    transform: scale(0.5);
    margin-left: -5.4rem;
    top: 1rem;
}

#countdown:before {
    content: "";
    width: 8px;
    height: 65px;
    background: #444;
    background-image: -webkit-linear-gradient(top, #555, #444, #444, #555);
    background-image: -moz-linear-gradient(top, #555, #444, #444, #555);
    background-image: -ms-linear-gradient(top, #555, #444, #444, #555);
    background-image: -o-linear-gradient(top, #555, #444, #444, #555);
    border: 1px solid #111;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
    display: block;
    position: absolute;
    top: 48px;
    left: -10px;
}

#countdown:after {
    content: "";
    width: 8px;
    height: 65px;
    background: #444;
    background-image: -webkit-linear-gradient(top, #555, #444, #444, #555);
    background-image: -moz-linear-gradient(top, #555, #444, #444, #555);
    background-image: -ms-linear-gradient(top, #555, #444, #444, #555);
    background-image: -o-linear-gradient(top, #555, #444, #444, #555);
    border: 1px solid #111;
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px;
    display: block;
    position: absolute;
    top: 48px;
    right: -10px;
}

#countdown #tiles {
    position: relative;
    z-index: 1;
}

#countdown #tiles > span {
    width: 92px;
    max-width: 92px;
    font: bold 48px "Droid Sans", Arial, sans-serif;
    text-align: center;
    color: #111;
    background-color: #ddd;
    background-image: -webkit-linear-gradient(top, #bbb, #eee);
    background-image: -moz-linear-gradient(top, #bbb, #eee);
    background-image: -ms-linear-gradient(top, #bbb, #eee);
    background-image: -o-linear-gradient(top, #bbb, #eee);
    border-top: 1px solid #fff;
    border-radius: 3px;
    box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.7);
    margin: 0 7px;
    padding: 18px 0;
    display: inline-block;
    position: relative;
}

#countdown #tiles > span:before {
    content: "";
    width: 100%;
    height: 13px;
    background: #111;
    display: block;
    padding: 0 3px;
    position: absolute;
    top: 41%;
    left: -3px;
    z-index: -1;
}

#countdown #tiles > span:after {
    content: "";
    width: 100%;
    height: 1px;
    background: #eee;
    border-top: 1px solid #333;
    display: block;
    position: absolute;
    top: 48%;
    left: 0;
}

#countdown .labels {
    width: 100%;
    height: 25px;
    text-align: center;
    position: absolute;
    bottom: 8px;
}

#countdown .labels li {
    width: 102px;
    font: bold 15px "Droid Sans", Arial, sans-serif;
    color: #f47321;
    text-shadow: 1px 1px 0px #000;
    text-align: center;
    text-transform: uppercase;
    display: inline-block;
}
</style>
