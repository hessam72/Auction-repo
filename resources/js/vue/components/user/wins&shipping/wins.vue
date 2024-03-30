<template>
    <div id="wins_table"></div>
    <loading :is_loading="is_loading"></loading>
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
                                <div
                                    v-if="want_to_convert"
                                    class="sm:flex sm:items-start"
                                >
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
                                            >Convert Your Win To Bids
                                        </DialogTitle>

                                        <div class="mt-6 w-full">
                                            <p>
                                                Your Reward Will Be:
                                                {{ converted_bid_amount }} Bids
                                            </p>
                                            <br />
                                            <p>
                                                Are You sure you want to convert
                                                it?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    v-else-if="want_to_buy"
                                    class="sm:flex sm:items-start"
                                >
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
                                <!-- first modal  -->
                                <div v-else class="sm:flex sm:items-start">
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
                                            >How do you like to Retrive Your
                                            prize?
                                        </DialogTitle>

                                        <div class="mt-6 w-full">
                                            <button
                                                @click="want_to_buy = true"
                                                type="button"
                                                class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 sm:ml-3 sm:w-auto"
                                            >
                                                Purchase Product
                                            </button>
                                            <button
                                                @click="calculate_return_bids"
                                                type="button"
                                                class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 sm:ml-3 sm:w-auto"
                                            >
                                                Convert to Bids
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                            >
                                <button
                                    v-if="want_to_convert"
                                    @click="
                                        start_converting(),
                                            (create_modal = false)
                                    "
                                    type="button"
                                    class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 sm:ml-3 sm:w-auto"
                                >
                                    Convert
                                </button>
                                <button
                                    v-else-if="want_to_buy"
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
                                    @click="close_modal()"
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
import { Tab, initTE } from "tw-elements";
import { mapGetters, mapActions } from "vuex";
import {
    convertDBTimeToDate,
    merge,
    arrangeData,
} from "@/modules/utilities/convertor.js";
import VueMultiselect from "vue-multiselect";
import { generatePaymentLink } from "@/modules/utilities/CryptoPayment.js";
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
            fetchWinsUrl: "winners/user/all",
            WinProducts: [],
            mergedWinProducts: [],
            finalWinProducts: [],
            create_modal: false,
            address: null,
            want_to_buy: false,
            want_to_convert: false,
            selected_state: null,
            selected_city: null,
            postal_code: null,
            selected: null,
            converted_bid_amount: 0,
            citySelectOptions: [
                {
                    value: "first",
                    name: "please select state first",
                },
            ],
            geoUrl: "geo/all",
            saveTransactionUrl: "transaction/store",
            rewardBidUrl: "transaction/reward_bid",

            storeShippingUrl: "shiped_product/store",
            states: [],
            is_loading: false,
            current_win_id: null, //temprary
            current_win: null, //temprary
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
        close_modal() {
            this.create_modal = false;
            setTimeout(() => {
                this.want_to_buy = false;
                this.converted_bid_amount = 0;
                this.want_to_convert = false;
            }, 500);
        },
        calculate_return_bids() {
            const win_item = this.WinProducts.find(
                (o) => Number(o.id) === Number(this.current_win_id)
            );
            const win_price = win_item.win_price;

            //assuming each bid cost 1 cent;
            //calculate converted bids
            this.converted_bid_amount = win_price * 100;
            //open convert modal
            this.want_to_convert = true;
        },
        // wins setup
        fetchWins() {
            this.is_loading = true;
            let config = {
                Authorization: this.UserAuthToken,
            };
            axios({
                method: "post",
                url: this.baseUrl + this.fetchWinsUrl,

                headers: config,
            })
                .then((response) => {
                    this.WinProducts = response.data.data;
                    this.mergedWinProducts = this.arrangeData(this.WinProducts);
                    // console.dir(this.mergedWinProducts);
                    this.finalWinProducts = this.formatWins();

                    this.setUpWinsDataTable();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
        start_converting() {
            let config = {
                Authorization: this.UserAuthToken,
            };
            let body = {
                winner_id: this.current_win_id,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.rewardBidUrl,
                data: body,
                headers: config,
            })
                .then((response) => {
                    // now saving shipping data
                    console.log(response.data);
                    this.toast.success(response.data.success);
                    this.clearData();
                })
                .catch((error) => {
                    console.log("error create transac");
                    console.log(error);
                    this.is_loading = false;
                })
                .finally(() => {});
        },
        formatWins() {
            var arr = [];

            this.mergedWinProducts.forEach((item, index) => {
                item.date_value = this.convertDBTimeToDate(item.created_at);
                if (item.status === 1) {
                    item.status_value = `<p style="color:green;font-weight:600;">Delivered</p>`;
                } else {
                    item.status_value = `<p style="color:#b3b700;font-weight:600;">Pending</p>`;
                }
                item.win_value = "$" + item.win_price;

                arr.push(item);
            });
            return arr;
        },

        setUpWinsDataTable() {
            // wins product configurations
            const customDatatable = document.getElementById("wins_table");
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
                        { label: "Win Price", field: "win_value" },
                        { label: "Bids Placed", field: "bids_placed" },
                        { label: "Date", field: "date_value" },

                        { label: "Checkout", field: "contact", sort: false },
                    ],
                    rows: this.finalWinProducts.map((row) => {
                        return {
                            ...row,
                            contact: `
            <button style="cursor:pointer;" 
              type="button"
              id="${row.id}"
              data-te-ripple-init
              data-te-ripple-color="dark"
              data-te-number=${row.id}
              class="wins-btn call-btn inline-block rounded-full border border-primary p-1.5 mr-1 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              <ion-icon  name="cart"></ion-icon>
            </button>
           `,
                        };
                    }),
                },
                { hover: true }
            );
        },
        openShippingModal(win_id) {
            this.current_win_id = win_id;
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
            const win_item = this.WinProducts.find(
                (o) => Number(o.id) === Number(this.current_win_id)
            );
            console.log(win_item);

            var pay_price = win_item.win_price;
            var pay_desc =
                "buying " +
                win_item.product.title +
                " for price of: $" +
                win_item.win_price;
            this.current_win = win_item;
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
                    this.createNewTransiction(data, win_item);
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
                win_id: this.current_win.id,
                address: this.address,
                postal_code: this.postal_code,
                price: this.current_payment.price_amount,
                product_id: this.current_win.product.id,
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
                    const id = this.current_payment.id;
                    this.clearData();
                    //for updating offers...
                    this.fetchData();

                    // then redirect to pay
                    window.location.href =
                        "https://nowpayments.io/payment/?iid=" + id;
                })
                .catch((error) => {
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
        clearData() {
            this.current_win = null;
            this.current_win_id = null;
            this.current_payment = null;
            this.selected_city = null;
            this.selected_state = null;
            this.address = null;
            this.postal_code = null;
           this.close_modal();
        },
    },
    mounted() {
        this.fetchWins();
        this.fetchGeo();

        // binding datatabel buy buttons to methods
        var self = this;
        $("#wins_table").on("click", "button", function () {
            var id = $(this).attr("id");

            self.openShippingModal(id);
        });
    },
};
</script>
<style lang="scss" scoped></style>
