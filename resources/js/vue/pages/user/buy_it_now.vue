<template>
    <page-title :title="'Buy Now Offers'"></page-title>

    <div class="b-main-container">
        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
        <div class="mb-3">
            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                <input
                    id="advanced-search-input"
                    type="search"
                    class="test_click relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="button-addon1"
                />

                <!--Search button-->
                <button
                    class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                    type="button"
                    id="advanced-search-button"
                    data-te-ripple-init
                    data-te-ripple-color="light"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-5 w-5"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </div>
        </div>
        <div id="buy_now_table"></div>
    </div>
    <!-- shipping modal -->
    <TransitionRoot as="template" :show="create_modal">
        <Dialog as="div" class="relative z-10" @close="open = false">
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
                                            >Fill Shipping Info
                                        </DialogTitle>

                                        <div class="mt-6 w-full">
                                            <!-- its a reply -->
                                            <div class="relative mb-3">
                                                <div
                                                    class="edit-row under_line"
                                                >
                                                    <label>State</label>
                                                    <div
                                                        class="selectbox-container"
                                                    >
                                                        <VueMultiselect
                                                            @select="
                                                                setCityOptions
                                                            "
                                                            label="name"
                                                            placeholder="Select Your State"
                                                            v-model="
                                                                selected_state
                                                            "
                                                            :options="states"
                                                        >
                                                        </VueMultiselect>
                                                    </div>
                                                </div>
                                                <div
                                                    class="edit-row under_line"
                                                >
                                                    <label>City</label>
                                                    <div
                                                        class="selectbox-container"
                                                    >
                                                        <VueMultiselect
                                                            label="name"
                                                            placeholder="Select State First"
                                                            v-model="
                                                                selected_city
                                                            "
                                                            :options="
                                                                citySelectOptions
                                                            "
                                                        >
                                                        </VueMultiselect>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="relative mb-3"
                                                data-te-input-wrapper-init
                                            >
                                                <textarea
                                                    v-model="address"
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
                                                    >Address
                                                </label>
                                            </div>
                                            <div
                                                class="relative mb-3 w-full"
                                                data-te-input-wrapper-init
                                            >
                                                <input
                                                    v-model="postal_code"
                                                    type="number"
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
                                                    >Postal Code
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                            >
                                <button
                                    @click="
                                        start_buying(), (create_modal = false)
                                    "
                                    type="button"
                                    class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 sm:ml-3 sm:w-auto"
                                >
                                    Pay
                                </button>
                                <button
                                    type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                    @click="create_modal = false"
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
    <loading :is_loading="is_loading"></loading>
</template>
<script>
import { Datatable } from "tw-elements";
import { mapGetters, mapActions } from "vuex";
import VueMultiselect from "vue-multiselect";
import { generatePaymentLink } from "@/modules/utilities/CryptoPayment.js";
import { useToast } from "vue-toastification";

import {
    convertDBTimeToDate,
    merge,
    arrangeData,
} from "@/modules/utilities/convertor.js";
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
            fetchDataUrl: "buy_offers/user/all",
            offers: [],
            mergedOffers: [],
            finalOffers: [],
            create_modal: false,
            address: null,
            selected_state: null,
            selected_city: null,
            postal_code: null,
            is_loading: false,
            selected: null,
            citySelectOptions: [
                {
                    value: "first",
                    name: "please select state first",
                },
            ],
            geoUrl: "geo/all",
            saveTransactionUrl: "transaction/store",

            storeShippingUrl: "shiped_product/store",
            states: [],

            current_offer_id: null, //temprary
            current_offer: null, //temprary
            current_payment: null, //temprary
        };
    },
    components: {
        Dialog,
        DialogPanel,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        VueMultiselect,
    },
    computed: {
        ...mapGetters([
            "baseUrl",
            "UserAuthToken",
            "user",
            "nowPayKey",
            "nowPayUrl",
        ]),
    },
    methods: {
        convertDBTimeToDate,
        merge,
        arrangeData,
        fetchData() {
            //can't stop from refetching!!!!!!!!!!!!
            if (this.offers[0]) return;

            this.is_loading = true;

            let config = {
                Authorization: this.UserAuthToken,
            };
            axios({
                method: "post",
                url: this.baseUrl + this.fetchDataUrl,

                headers: config,
            })
                .then((response) => {
                    this.offers = response.data.data;

                    this.mergedOffers = this.formatData();
                    this.finalOffers = this.arrangeData(this.mergedOffers);

                    this.setUpDataTable();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
        openShippingModal(offer_id) {
            this.current_offer_id = offer_id;
            this.create_modal = true;
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
                    this.states = response.data.data;
                    // this.setCityOptions();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
        setCityOptions(val) {
            this.citySelectOptions = val.cities;
        },
        start_buying() {
            if (
                this.selected_city === null ||
                this.address === null ||
                this.postal_code === null
            ) {
                this.toast.error("Please Fill all of required Fields");
                return;
            }

            // generate payment link first
            // save transaction
            //then save shipping
            // then redirect to pay
            // *********************
            // get offer based on id
            this.is_loading = true;
            const buy_offer = this.offers.find(
                (o) => Number(o.id) === Number(this.current_offer_id)
            );
            console.log(buy_offer);

            var pay_price = buy_offer.product.price;
            var pay_desc =
                "buying " +
                buy_offer.product.title +
                " and rewarding " +
                buy_offer.spent_bids +
                " Bids!";
            this.current_offer = buy_offer;
            generatePaymentLink(
                pay_price,
                pay_desc,
                this.nowPayUrl,
                this.nowPayKey,
                this.$route.path
            )
                .then((data) => {
                    // payment data generated
                    this.current_payment = data;
                    //saving new transicton
                    this.createNewTransiction(data, buy_offer);
                })
                .catch((error) => {
                    this.is_loading = false;

                    this.toast.error("network error ");
                });
        },
        createNewTransiction(pay_data, item) {
            let config = {
                Authorization: this.UserAuthToken,
            };
            let body = {
                amount: pay_data.price_amount,
                order_id: pay_data.order_id,
                item_type: 2, // user shipped product id 
                // item_id: this.current_offer.id,
                payment_description: pay_data.order_description,
                payment_id: pay_data.id,
                status: 1, // new payment
            };

            axios({
                method: "post",
                url: this.baseUrl + this.saveTransactionUrl,
                data: body,
                headers: config,
            })
                .then((response) => {
                    // now saving shipping data
                    console.log("trans id is " + response.data.id);
                    this.saveShippingData(response.data.id);
                    // after redirect to pay
                })
                .catch((error) => {
                    console.log("error create transac");
                    console.log(error);
                    this.is_loading = false;

                })
                .finally(() => {});
        },

        saveShippingData(transaction_id) {
            let config = {
                Authorization: this.UserAuthToken,
            };
            var body1 = {
                buy_now_offer_id: this.current_offer.id,
                address: this.address,
                reward_bids: this.current_offer.spent_bids,
                postal_code: this.postal_code,
                price: this.current_payment.price_amount,
                product_id: this.current_offer.product.id,
                state_id: this.selected_state.id,
                city_id: this.selected_city.id,
                transaction_id: transaction_id,
            };
            console.log("body");
            console.log(body1);

            axios({
                method: "post",
                url: this.baseUrl + this.storeShippingUrl,
                data: body1,
                headers: config,
            })
                .then((response) => {
                    const id =this.current_payment.id
                    this.clearData();
                    //for updating offers...
                    this.fetchData();
       

                    // then redirect to pay
                    window.location.href ="https://nowpayments.io/payment/?iid=" +id;

                    // window.open(
                    //     "https://nowpayments.io/payment/?iid=" +id
                            
                    // );
                   
                })
                .catch((error) => {
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
        clearData() {
            this.current_offer = null;
            this.current_offer_id = null;
            this.current_payment = null;
            this.selected_city = null;
            this.selected_state = null;
            this.address = null;
            this.postal_code = null;
        },
        formatData() {
            var arr = [];

            this.offers.forEach((item, index) => {
                item.date_value = this.convertDBTimeToDate(item.time_limit);

                item.price_value = "$" + item.product.price;

                arr.push(item);
            });
            return arr;
        },

        setUpDataTable() {
            const customDatatable = document.getElementById("buy_now_table");

            const setActions = () => {
                // document.querySelectorAll(".call-btn").forEach((btn) => {
                //     btn.addEventListener("click", () => {
                //         console.log(
                //             `call ${btn.attributes["data-te-number"].value}`
                //         );
                //     });
                // });
                // document.querySelectorAll(".message-btn").forEach((btn) => {
                //     btn.addEventListener("click", () => {
                //         console.log(
                //             `send a message to ${btn.attributes["data-te-email"].value}`
                //         );
                //     });
                // });
            };

            customDatatable.addEventListener("render.te.datatable", setActions);

            new Datatable(
                customDatatable,
                {
                    columns: [
                        { label: "Product", field: "product.title" },
                        { label: "Price", field: "price_value" },
                        { label: "Bids To Claim", field: "spent_bids" },
                        {
                            label: "Expiration Date",
                            field: "date_value",
                            sort: false,
                        },
                        { label: "Buy Now", field: "contact", sort: false },
                    ],
                    rows: this.finalOffers.map((row) => {
                        // @click="${this.store_shipping()}"

                        return {
                            ...row,
                            contact: `
        <button id="${row.id}" style="cursor:pointer;" 
          type="button"
         
          data-te-ripple-init
          data-te-ripple-color="dark"
          data-te-number=${row.price_value}
          class="buy_now buy-in-now-btn call-btn inline-block rounded-full border border-primary p-1.5 mr-1 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
          <ion-icon  name="cart"></ion-icon>
        </button>
       `,
                        };
                    }),
                },
                { hover: true }
            );
            // search script
            const instance = new Datatable(
                document.getElementById("buy_now_table"),
                this.finalOffers
            );
            const advancedSearchInput = document.getElementById(
                "advanced-search-input"
            );

            const search = (value) => {
                let [phrase, columns] = value
                    .split(" in:")
                    .map((str) => str.trim());

                if (columns) {
                    columns = columns
                        .split(",")
                        .map((str) => str.toLowerCase().trim());
                }

                instance.search(phrase, columns);
            };

            document
                .getElementById("advanced-search-button")
                .addEventListener("click", (e) => {
                    search(advancedSearchInput.value);
                });

            advancedSearchInput.addEventListener("keydown", (e) => {
                if (e.keyCode === 13) {
                    search(e.target.value);
                }
            });
        },
    },
    mounted() {
        this.fetchData();
        this.fetchGeo();

        // binding datatabel buy buttons to methods
        var self = this;
        $("#buy_now_table").on("click", "button", function () {
            var id = $(this).attr("id");

            self.openShippingModal(id);
        });
    },
};
</script>
<style lang="scss" scoped>
.b-main-container {
    padding: 3rem 2rem;
}
#advanced-search-input {
    background-color: #fff;
    border-radius: 50px;
    overflow: clip;
    box-shadow: 0 3px 5px #999;
    width: 100%;
    padding: 0.7rem;
    padding-left: 1.5rem;
}
#advanced-search-button {
    position: absolute;
    right: -2px;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    height: 100%;
    z-index: 3;
}
#buy_now_table {
    div {
        border-radius: 15px;
    }
}
</style>
<style lang="scss">
.buy-in-now-btn {
    transition: all 0.3s ease;
    ion-icon {
        border-radius: 50px;
        width: 2rem;
        height: 2rem;
        color: #3a71ca;
        padding: 0 0.3rem;
        transition: all 0.3s ease;
    }
    ion-icon:hover {
        background-color: #3a71ca;
        color: #fff !important;
    }
}
.buy-in-now-btn:hover {
    background-color: #3a71ca;
    color: #fff !important;
}
#buy_now_table {
    margin-top: 3rem;
    div:first-child {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
}
</style>
