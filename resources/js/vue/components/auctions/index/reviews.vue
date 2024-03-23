<template>
    <div class="reviews-container">
        <div class="header flex justify-between items-center">
            <h2>Reviews ({{ total_count }})</h2>
            <div class="total-score">
                <star-rating
                    :round-start-rating="false"
                    :rating="avg_total_score"
                    :read-only="true"
                    :show-rating="false"
                ></star-rating>
            </div>
        </div>
        <div
            v-for="(item, index) in comments"
            :key="index"
            class="review-container flex"
        >
            <div class="user-info flex flex-col justify-center items-center">
                <div class="size">
                    <div class="pic-container">
                        <div class="border-wrap">
                            <img
                                class="user_img"
                                :src="'/storage/' + item.user.profile_pic"
                            />
                        </div>
                    </div>
                    <div class="winner-info">
                        <h3>{{ item.user.username }}</h3>
                        <h4>
                            <ion-icon name="at"></ion-icon>{{ item.user.email }}
                        </h4>
                        <!-- <h4><ion-icon name="pin"></ion-icon> florida</h4> -->
                    </div>
                </div>
            </div>
            <div class="content-container flex flex-col">
                <div
                    class="content flex flex-col justify-between items-start gap-4"
                >
                    <h2>{{ item.title }}</h2>
                    <p>
                        {{ item.content }}
                    </p>
                </div>
                <div class="ratings">
                    <div class="r-item flex items-center justify-between">
                        <p>overall</p>
                        <star-rating
                            :star-size="30"
                            :round-start-rating="false"
                            :rating="item.total_socre"
                            :read-only="true"
                            :show-rating="false"
                        ></star-rating>
                    </div>
                    <div class="r-item flex items-center">
                        <p>worth of money</p>
                        <star-rating
                            :star-size="30"
                            :round-start-rating="false"
                            :rating="item.value_for_price"
                            :read-only="true"
                            :show-rating="false"
                        ></star-rating>
                    </div>
                    <div class="r-item flex items-center">
                        <p>quality</p>
                        <star-rating
                            :star-size="30"
                            :round-start-rating="false"
                            :rating="item.quality"
                            :read-only="true"
                            :show-rating="false"
                        ></star-rating>
                    </div>
                    <div class="r-item flex items-center">
                        <p>suggest it</p>
                        <star-rating
                            :star-size="30"
                            :round-start-rating="false"
                            :rating="item.suggest_it"
                            :read-only="true"
                            :show-rating="false"
                        ></star-rating>
                    </div>
                    <div class="r-item flex items-center">
                        <p>packaging</p>
                        <star-rating
                            :star-size="30"
                            :round-start-rating="false"
                            :rating="item.packaging"
                            :read-only="true"
                            :show-rating="false"
                        ></star-rating>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="comments.length != 0" class="btn-container">
            <button @click="fetchData(1)" class="load-more">Load More</button>
        </div>
        <div v-else class="btn-container">
<h3>No Reviews yet</h3>
        </div>
        
    </div>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <!-- <nav class="pagination" aria-label="Page navigation example">
        <ul class="list-style-none flex items-center justify-center">
            <li>
                <a
                    class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
                    href="#"
                    aria-label="Previous"
                >
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li>
                <a
                    class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
                    href="#"
                    >1</a
                >
            </li>
            <li aria-current="page">
                <a
                    class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-800 transition-all duration-300 hover:bg-neutral-100"
                    href="#"
                    >2</a
                >
            </li>
            <li>
                <a
                    class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
                    href="#"
                    >3</a
                >
            </li>
            <li>
                <a
                    class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
                    href="#"
                    aria-label="Next"
                    ><span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav> -->
</template>
<script>
import { comment } from "postcss";
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            skip: 0,
            take: 2,
            fetchUrl: "auctions/auction_comments",
            comments: [],
            total_count: 0,
            avg_total_score: 0,
        };
    },

    computed: {
        ...mapGetters(["baseUrl", "user", "UserAuthToken"]),
    },
    mounted() {
        this.fetchData();
    },
    props: ["product_id"],
    methods: {
        fetchData(more = 0) {
            var skip = 0;
            var take = 2;
            if (more) {
                skip = this.comments.length;
            }
            var url = this.fetchUrl;
            var body = {
                id: this.product_id,
                skip: skip,
                take: take,
            };
            axios({
                method: "post",
                url: url,
                data: body,
            })
                .then((response) => {
                    console.log(response.data);
                    this.total_count = response.data.total_count;
                    this.avg_total_score = response.data.total_score;
                    if (more) {
                        // attach to the end of existing array
                        this.comments = this.comments.concat(
                            response.data.comments
                        );
                    } else {
                        this.comments = response.data.comments;
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
                .finally(() => {});
        },
    },
};
</script>
<style scoped lang="scss">
.reviews-container {
    width: 95%;
    margin: auto;
    margin-top: auto;
    margin-bottom: auto;
    margin-top: 5rem;
    margin-bottom: 8rem;
    .header {
        font-size: 1.6rem;
        font-weight: 600;
    }
}
.size {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 1rem;
    text-align: center;
    // width: 100%;
    border-right: 2px solid #999;

    .pic-container {
        position: relative;
        display: flex;
        justify-content: flex-start;
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
            background: linear-gradient(
                to right,
                rgb(99 80 215),
                rgb(236 236 236)
            );

            border-radius: 100px;

            .user_img {
                width: 6rem;
                border-radius: 200px;
                height: 6rem;
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

    h3 {
        color: #4838ab;
        margin-right: 10px;
        letter-spacing: 1px;
        font-size: 1.2rem;
        font-weight: 600;
    }

    h4 {
        color: #444;
        margin-right: 10px;
        letter-spacing: 0.7px;
        font-size: 0.8rem;
        font-weight: 500;
    }
}
.btn-container {
    width: 100%;
    text-align: center;
    margin-top: 3rem;
}
.content-container {
    gap: 1.4rem;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    width: 75%;
    .content {
        h2 {
            font-weight: 700;
            font-size: 1.2rem;
        }
        background: none;
        border-bottom: 1px solid #aaa;
        padding-bottom: 1rem;
    }
    .ratings {
        display: grid;
        grid-template-columns: 1fr 1fr;
        row-gap: 1rem;
        justify-items: left;
        .r-item {
            gap: 1.2rem;
            width: 18rem;
            justify-content: space-between;
        }
        .r-item:first-child {
            grid-column: 1/3;
        }
    }
}
.user-info {
    width: 25%;
}

.review-container {
    margin: 1.5rem 0.5rem;
    border: 1px solid #fff;
    border-radius: 30px;
    padding: 1.5rem 0.5rem;

    box-shadow: 0 2px 15px #351d62;
    background-color: #ffffffbd;
}
.review-container:first-child {
    margin-top: 3rem;
}
.pagination {
    margin-top: -3rem;
    margin-bottom: 6rem;
}

// button more style
button {
    padding: 17px 40px;
    border-radius: 50px;
    cursor: pointer;
    border: 0;
    background-color: white;
    box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-size: 15px;
    transition: all 0.5s ease;
}

button:hover {
    letter-spacing: 3px;
    background-color: hsl(261deg 80% 48%);
    color: hsl(0, 0%, 100%);
    box-shadow: rgb(93 24 220) 0px 7px 29px 0px;
}

button:active {
    letter-spacing: 3px;
    background-color: hsl(261deg 80% 48%);
    color: hsl(0, 0%, 100%);
    box-shadow: rgb(93 24 220) 0px 0px 0px 0px;
    transform: translateY(10px);
    transition: 100ms;
}
</style>
