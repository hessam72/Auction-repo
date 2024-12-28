<template>
    <div class="reviews-container">
        <div class="header flex justify-between items-center">
            <div>
                            <h2>Reviews ({{ total_count }})</h2>

            </div>  
            <div class="total-score">
                <star-rating
                    :round-start-rating="false"
                    :rating="avg_total_score"
                    :read-only="true"
                    :show-rating="false"
                ></star-rating>
            </div>
            <div class="add-container">
                <button @click="open_comment_modal" class="load-more">
                    Add Review
                </button>
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
                                onerror="this.src='/storage/images/user_profiles/blank.png'"
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

    <TransitionRoot as="template" :show="comment_modal">
        <Dialog as="div" class="relative z-10" @close="comment_modal = false">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                        >
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full sm:mx-0 sm:h-10 sm:w-10"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="#eee"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="green"
                                            class="h-8 w-8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"
                                            />
                                        </svg>
                                    </div>
                                    <div
                                        class="w-full mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left"
                                    >
                                        <DialogTitle
                                            as="h3"
                                            class="text-base font-semibold leading-6 text-gray-900"
                                            >Submit Your Comment
                                        </DialogTitle>
                                        <div
                                            class="relative mb-3 w-full mt-3"
                                            data-te-input-wrapper-init
                                        >
                                            <input
                                                v-model="title"
                                                type="text"
                                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="exampleFormControlInputText"
                                                placeholder="Example label"
                                            />
                                            <label
                                                style="
                                                    z-index: 1;
                                                    background: #fff;
                                                "
                                                for="exampleFormControlInputText"
                                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                                >Title
                                            </label>
                                        </div>
                                        <div class="mt-6 w-full">
                                            <div
                                                class="relative mb-3"
                                                data-te-input-wrapper-init
                                            >
                                                <textarea
                                                    v-model="content"
                                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                    id="exampleFormControlTextarea1"
                                                    rows="4"
                                                    placeholder="Your message"
                                                    required
                                                ></textarea>
                                                <label
                                                    style="
                                                        z-index: 1;
                                                        background: #fff;
                                                    "
                                                    for="exampleFormControlTextarea1"
                                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                                    >Content
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mt-6 w-full">
                                            <!-- <h3>Ratings</h3>
                                            <hr /> -->
                                       
                                        
                                            <div class="rating-container">
                                                <div class="flex items-center">
                                                    <p>worth of money</p>
                                                    <star-rating
                                                        :star-size="19"
                                                        :round-start-rating="
                                                            false
                                                        "
                                                        
                                                        v-model:rating="
                                                            comment_worth_of_money
                                                        "
                                                        v-model="comment_worth_of_money"
                                                        :show-rating="false"
                                                    ></star-rating>
                                                </div>
                                                <div class="flex items-center">
                                                    <p>suggest it</p>
                                                    <star-rating
                                                        :star-size="19"
                                                        :round-start-rating="
                                                            false
                                                        "
                                                        v-model:rating="
                                                            comment_suggest_it
                                                        "
                                                        :show-rating="false"
                                                    ></star-rating>
                                                </div>
                                                <div class="flex items-center">
                                                    <p>quality</p>
                                                    <star-rating
                                                        :star-size="19"
                                                        :round-start-rating="
                                                            false
                                                        "
                                                        v-model:rating="
                                                            comment_quality
                                                        "
                                                        :show-rating="false"
                                                    ></star-rating>
                                                </div>
                                                <div class="flex items-center">
                                                    <p>packaging</p>
                                                    <star-rating
                                                        :star-size="19"
                                                        :round-start-rating="
                                                            false
                                                        "
                                                        v-model:rating="
                                                            comment_packaging
                                                        "
                                                        :show-rating="false"
                                                    ></star-rating>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                            >
                                <button
                                    @click="submitComment()"
                                    type="button"
                                    class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 sm:ml-3 sm:w-auto"
                                >
                                    Submit
                                </button>
                                <button
                                    type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                    @click="closeModal()"
                                    ref="cancelButtonRef"
                                >
                                    Cancel
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
<script>
import { comment } from "postcss";
import { mapGetters } from "vuex";
import { useToast } from "vue-toastification";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
export default {
    setup() {
        // Get toast interface
        const toast = useToast();

        return { toast };
    },
    data() {
        return {
            skip: 0,
            take: 2,
            fetchUrl: "auctions/auction_comments",
            storeCommentUrl: "auctions/store_comment",
            comments: [],
            total_count: 0,
            avg_total_score: 0,
            title: null,
            content: null,
            comment_quality: 0,
            comment_worth_of_money: 0,
            comment_suggest_it: 0,
            comment_packaging: 0,
            comment_modal: false,
        };
    },

    computed: {
        ...mapGetters(["baseUrl", "user", "UserAuthToken"]),
    },
    components: {
        Dialog,
        DialogPanel,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
    },
    mounted() {
        this.fetchData();
    },
    props: ["product_id"],
    methods: {
        closeModal() {
            this.comment_modal = false;
            this.title = null;
            this.content = null;
            this.comment_quality =0;
                this.comment_worth_of_money =0;
                this.comment_suggest_it =0;
                this.comment_packaging =0;
        },
        open_comment_modal() {
            if(!this.UserAuthToken){
                this.toast.info("Sing in to Add Your Review");
                return;
            }
            this.comment_modal = true;
        },
        submitComment() {
           
            if (
                !this.title ||
                !this.content ||
                !this.comment_quality ||
                !this.comment_worth_of_money ||
                !this.comment_suggest_it ||
                !this.comment_packaging
            ) {
                this.toast.error("Filling All Fields is Required");
                return;
            }
            let config = {
                Authorization: this.UserAuthToken,
            };
            var body = {
                product_id: this.product_id,
                title: this.title,
                content: this.content,
                comment_quality: this.comment_quality,
                comment_worth_of_money: this.comment_worth_of_money,
                comment_suggest_it: this.comment_suggest_it,
                comment_packaging: this.comment_packaging,
            };
           
            axios({
                method: "post",
                url: this.baseUrl + this.storeCommentUrl,
                data: body,
                headers: config,
            })
                .then((response) => {
                   console.log(response.data)
                    this.toast.success(response.data.success);
                    this.fetchData();
                    this.closeModal()
                })
                .catch((error) => {
                    console.log(error);
                })
                .finally(() => {});
        },
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
.add-container {
    width: 35%;
}
.rating-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    row-gap: 0.5rem;
    margin-top: 1.3rem;
    div {
        gap: 1rem;
        align-items: center;
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
