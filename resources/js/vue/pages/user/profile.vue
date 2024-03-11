<template>
    <!-- <page-title :title="'Profile'" ></page-title> -->

    <div v-if="user" class="center-container flex flex-col">
        <div class="header-container flex justify-around items-center">
            <div class="header-section flex">
                <div class="icon">
                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                </div>
                <div class="content-section flex flex-col">
                    <p>Total Bids Placed</p>
                    <p>{{ user.bidding_histories.length }}</p>
                </div>
            </div>
            <div class="header-section flex">
                <div class="icon"><ion-icon name="trophy"></ion-icon></div>
                <div class="content-section flex flex-col">
                    <p>Auction Wins</p>
                    <p>{{ user.winners.length }}</p>
                </div>
            </div>
            <div class="header-section flex">
                <div class="icon"><ion-icon name="alarm"></ion-icon></div>
                <div class="content-section flex flex-col">
                    <p>Heighest Bidder</p>
                    <p v-if="user.highest_bidders">
                        {{
                            convertSecondsToTime(
                                user.highest_bidders.time_spent
                            )
                        }}
                    </p>
                    <p v-else>00 : 00 : 00</p>
                </div>
            </div>
        </div>
        <div class="profile-container">
            <div class="section-head">
                <h2>Edit Profile</h2>
                <hr class="header-hr" />
            </div>
            <div class="edit-form">
                <div class="edit-row under_line">
                    <label>UserName</label
                    ><input
                        type="text"
                        placeholder="username"
                        v-model="user.username"
                    />
                </div>
                <div class="edit-row under_line">
                    <label>Email</label
                    ><input
                        type="email"
                        placeholder="email@yahoo.com"
                        v-model="user.email"
                    />
                </div>
                <div class="edit-row under_line">
                    <label>Birth Date</label>
                    <div class="date-container">
                        <VueDatePicker
                            v-model="user.birth_date"
                            :enable-time-picker="false"
                            placeholder="Select Your BirthDate"
                        ></VueDatePicker>
                    </div>

                    <!-- <input type="text" placeholder="" v-model="user.birth_date" /> -->
                </div>
                <div class="edit-row under_line">
                    <label>State</label>
                    <div class="selectbox-container">
                        <VueMultiselect
                            @select="setCityOptions"
                            label="name"
                            placeholder="Select Your State"
                            v-model="user.city.state"
                            :options="states"
                        >
                        </VueMultiselect>
                    </div>
                </div>
                <div class="edit-row under_line">
                    <label>City</label>
                    <div class="selectbox-container">
                        <VueMultiselect
                            label="name"
                            placeholder="Select State First"
                            v-model="user.city"
                            :options="citySelectOptions"
                        >
                        </VueMultiselect>
                    </div>
                </div>

                <div class="edit-row under_line">
                    <label>Password</label
                    ><input type="password" placeholder="*************" />
                </div>
                <div class="edit-row under_line">
                    <label>Bio</label
                    ><textarea v-model="this.user.bio"></textarea>
                </div>
                <div class="edit-row">
                    <button
                        @click="updateUser(), loadbtn()"
                        class="spin"
                        id="spin"
                    >
                        <span>Submit</span>
                        <span>
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"
                                />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <loading :is_loading="is_loading"></loading>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<script>
import { init_submit_btn } from "@/modules/utilities/submit_btn.js";
import { convertSecondsToTime } from "@/modules/utilities/convertor.js";
import { mapGetters, mapActions } from "vuex";
import VueMultiselect from "vue-multiselect";

import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
export default {
    data() {
        return {
            selected: null,
            // options: ["list", "of", "options"],
            citySelectOptions: [
                {
                    value: "first",
                    name: "please select state first",
                },
            ],
            date: null,
            is_loading: false,
            userUrl: "user/fetch",
            updateUrl: "user/update",
            geoUrl: "geo/all",
            user: null,
            states: [],
        };
    },
    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken"]),
    },
    components: {
        VueDatePicker,
        VueMultiselect,
    },
    methods: {
        ...mapActions(["loginUser", "setUser"]),
        convertSecondsToTime,
        fetchData() {
            this.is_loading = true;
            let config = {
                Authorization: this.UserAuthToken,
            };

            const body = {
                load: [
                    "bookmarks",
                    "bidding_histories",
                    "tickets",
                    "transactions",
                    "challenges",
                    "redeem_codes",
                    "highest_bidders",
                    "winners",
                    "user_shiped_products",
                    "city.state",
                ],
            };

            axios({
                method: "post",
                url: this.baseUrl + this.userUrl,
                data: body,
                headers: config,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    console.log(response.data.data);
                    this.user = response.data.data;
                    // this.selected_state = this.user.city.state;
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
        updateUser() {
            let config = {
                Authorization: this.UserAuthToken,
            };
            const body = {
                username: this.user.username,
                email: this.user.email,
                birth_date: this.user.birth_date,
                city_id: this.user.city.id,

                // password:this.user.
                bio: this.user.bio,
            };

            axios({
                method: "put",
                url: this.baseUrl + this.updateUrl,
                data: body,
                headers: config,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});
        },
        fetchGeo() {
            // this.is_loading = true;
            let config = {
                Authorization: this.UserAuthToken,
            };

            const body = {};

            axios({
                method: "post",
                url: this.baseUrl + this.geoUrl,
                data: body,
                headers: config,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    console.log(response.data.data);
                    this.states = response.data.data;
                    this.setCityOptions();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
        setCityOptions() {
       
            this.states.forEach( (item)=> {
                
                if(item.id === this.user.city.state.id){
                    this.citySelectOptions=item.cities;
                }
            });
  
        },
        loadbtn() {
            init_submit_btn();
        },
    },
    created() {
        this.fetchData();
        this.fetchGeo();
    },
    mounted() {},
};
</script>

<style lang="scss" scoped>
.header-hr {
    height: 4px;
    // background: linear-gradient(99deg, rgba(176, 141, 255, 0.78) 0%, rgba(45, 20, 89, 0.8744091387) 100%);
    border: none;
    margin-top: 0.8rem;
    border-radius: 50px;
    background: linear-gradient(-45deg, #492b89, #782b89, #2b3d89, #2b8978);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;

    transition: all 0.3s ease;
}
.selectbox-container {
    width: 75%;
}
.header-container {
    // background-color:var(--color-primary-tint-4) ;
    padding: 2rem;
    box-shadow: 1px 1px 6px #aaa;
    color: var(--color-primary-tint-5);
}

.header-section {
    align-items: center;
    gap: 1rem;
    font-size: 1.5rem;
    font-weight: 500;

    .icon {
        border-right: 3px solid var(--color-primary-tint-5);
        padding-right: 1rem;
    }

    ion-icon {
        font-size: 5.5rem;
        filter: drop-shadow(5px 5px 5px var(--color-secondary-tint-2));
        color: var(--color-primary-tint-5);
    }
}

.section-head {
    padding: 3rem;
    font-size: 1.5rem;
    font-weight: 500;
}

.edit-form {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 2rem;

    .edit-row {
        display: flex;
        align-items: start;
        justify-content: space-between;
        width: 60%;
        position: relative;

        flex-direction: row;

        // submit style

        // ----------
        @keyframes spin {
            0% {
                transform: rotateZ(0);
            }

            100% {
                transform: rotateZ(720deg);
            }
        }

        $color: #1ecd97;

        button {
            position: relative;
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;

            padding: 0;
            width: 250px;
            height: 50px;
            border-radius: 25px;
            background-color: transparent;
            outline: 0;
            cursor: pointer;
            overflow: hidden;
            margin: auto;
            margin-top: 2rem;
        }

        .spin {
            border: 2px solid $color;
            color: $color;
            font-weight: 600;
            transition: all 200ms ease-in-out;

            span {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                transition: opacity 200ms ease-in-out;

                &:last-child {
                    position: absolute;
                    top: 0;
                    left: 0;
                    opacity: 0;
                }
            }

            svg {
                height: 30px;
                fill: $color;
            }

            &:hover {
                background-color: $color;
                color: #fff;
            }

            &.done,
            &.processing {
                pointer-events: none;
                cursor: default;
            }

            &.processing {
                width: 50px;
                border-width: 4px;
                border-right-color: #bbb;
                border-bottom-color: #bbb;

                animation: spin;
                animation-delay: 200ms;
                animation-duration: 2s;
                animation-timing-function: ease-in-out;
                animation-iteration-count: 1;

                &:hover {
                    background-color: transparent;
                }

                span:first-child {
                    opacity: 0;
                }
            }

            &.done {
                &:hover {
                    background-color: transparent;
                }

                span:first-child {
                    opacity: 0;
                }

                span:last-child {
                    opacity: 1;
                }
            }
        }

        // **********

        label {
            font-size: 1.3rem;
            font-weight: 500;
            color: #666;
        }

        input {
            border: none;
            background: #fff;
            transition: all 0.3s ease;
            border-radius: 10px;
            width: 75%;
            padding: 1rem;
            font-size: 1.2rem;
        }

        textarea {
            border: none;
            border-radius: 10px;
            width: 75%;
            background: #fff;
            font-size: 1.2rem;
        }
    }

    .under_line::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #333;
        bottom: 0;
        left: 0;
        transform: scale(0);
        transition: 0.2s all ease-out;
    }

    .under_line:hover::after {
        transform: scale(1);
    }
}

input[type="text"]::placeholder,
input[type="email"]::placeholder {
    font-size: 1.2rem;
}

input[type="text"],
input[type="email"],
textarea {
    width: 97%;

    outline: none;
    border: none;
    padding: 10px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    color: #474747;
    font: 12px Century Gothic;
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
    border: 1px solid #c17aff;
    -webkit-box-shadow: 21px 18px 7px 1px rgba(173, 173, 173, 0.82);
    -moz-box-shadow: 21px 18px 7px 1px rgba(173, 173, 173, 0.82);
    box-shadow: 21px 18px 7px 1px rgba(173, 173, 173, 0.82);
    transform: scale(1.05);
    -webkit-transition: ease 0.6s;
    -moz-transition: ease 0.6s;
    -o-transition: ease 0.6s;
    -ms-transition: ease 0.6s;
    transition: ease 0.6s;
}
// input[type="text"]:focus,
// input[type="email"]:focus,
// textarea:focus,
//  .under_line::after {
//         transform: scale(1);
//     }

textarea {
    height: 200px;

    width: 97%;
}
.date-container {
    width: 75%;
}
</style>
