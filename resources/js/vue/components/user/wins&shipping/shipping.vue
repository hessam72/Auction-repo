<template>
    <div id="shiped_table"></div>
    <loading :is_loading="is_loading"></loading>
</template>
<script>
import { Datatable } from "tw-elements";
import { Tab, initTE } from "tw-elements";
import { mapGetters, mapActions } from "vuex";
import { generatePaymentLink } from "@/modules/utilities/CryptoPayment.js";

import {
    convertDBTimeToDate,
    merge,
    arrangeData,
} from "@/modules/utilities/convertor.js";
export default {
    data() {
        return {
            fetchShipedUrl: "shiped_product/all",
            updateTransactionUrl: "shiped_product/update_transaction",
            shipedProducts: [],
            mergedShipedProducts: [],
            finalShipedProducts: [],
            saveTransactionUrl: "transaction/store",
            is_loading: false,
            current_ship:null, //temp
            current_payment:null, //temp
        };
    },

    computed: {
        ...mapGetters([ "baseUrl",
            "UserAuthToken",
            "user",
            "nowPayKey",
            "nowPayUrl",]),
    },
    methods: {
        clicked() {
            // alert("hello");
        },
        convertDBTimeToDate,
        merge,
        arrangeData,

        fetchShipedProducts() {
            this.is_loading = true;

            let config = {
                Authorization: this.UserAuthToken,
            };
            axios({
                method: "post",
                url: this.baseUrl + this.fetchShipedUrl,

                headers: config,
            })
                .then((response) => {
                    this.shipedProducts = response.data.data;
                    console.log(this.shipedProducts)
                    this.mergedShipedProducts = this.arrangeData(
                        this.shipedProducts
                    );
                    this.finalShipedProducts = this.formatShipedProducts();

                    this.setUpshipedDataTable();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },

        formatShipedProducts() {
            var arr = [];

            // 1=> waiting for payment / 100=>payment done and ready for shipping /
            //  200=>shiped / 300=>partially paid / 400=>canceled

            this.mergedShipedProducts.forEach((item, index) => {
                item.date_value = this.convertDBTimeToDate(item.created_at);
                if (item.status === 100) {
                    item.status_value = `<p style="color:green;font-weight:600;">paid - ready for shipping</p>`;
                } else if (item.status === 1) {
                    // item.status_value = `<p style="color:#b3b700;font-weight:600;">Pending for Payment</p>`;
                    item.status_value = `   <button style="cursor:pointer;" 
              type="button"
              id="${item.id}"
              data-te-ripple-init
              data-te-ripple-color="dark"
              
              class="wins-btn call-btn inline-block rounded-full border border-primary p-1.5 mr-1 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              <ion-icon  name="cart"></ion-icon>
            </button>`;
                } else if (item.status === 200) {
                    item.status_value = `<p style="color:blue;font-weight:600;">Shiped</p>`;
                } else if (item.status === 300) {
                    item.status_value = `<p style="color:yellow;font-weight:600;">Partially Paid </p>`;
                } else if (item.status === 400) {
                    item.status_value = `<p style="color:red;font-weight:600;">canceled </p>`;
                }
                item.price_value = "$" + item.price;

                arr.push(item);
            });
            return arr;
        },

        setUpshipedDataTable() {
            // shiped product configurations
            const shipedDatatable = document.getElementById("shiped_table");
            const setDelActions = () => {
                document.querySelectorAll(".call-btn").forEach((btn) => {
                    btn.addEventListener("click", () => {
                        this.clicked();
                        // console.log(btn.attributes["data-te-number"].value);
                    });
                });

                document.querySelectorAll(".message-btn").forEach((btn) => {
                    btn.addEventListener("click", () => {
                        console.log(
                            `send a message to ${btn.attributes["data-te-email"].value}`
                        );
                    });
                });
            };
            shipedDatatable.addEventListener(
                "render.te.datatable",
                setDelActions
            );
            // const del_data = [
            //     {
            //         product: "Tiger Nixon",
            //         price: "$1200",
            //         date: "23 / 04 / 15",
            //         status: "delivered",
            //         address: "lorem impson dollar smit....",
            //     },
            //     {
            //         product: "Sonya Frost",
            //         price: "$1300",
            //         date: "23 / 04 / 15",
            //         status: "pending",
            //         address: "lorem impson dollar smit....",
            //     },
            //     {
            //         product: "Tatyana Fitzpatrick",
            //         price: "$1270",
            //         date: "23 / 04 / 15",
            //         status: "delivered",
            //         address: "lorem impson dollar smit....",
            //     },
            // ];
            new Datatable(
                shipedDatatable,
                {
                    columns: [
                        { label: "Product", field: "product.title" },
                        { label: "Price", field: "price_value" },
                        { label: "date", field: "date_value" },
                        { label: "city", field: "city.name" },
                        { label: "address", field: "address" },
                        { label: "status", field: "status_value" },
                    ],
                    rows: this.finalShipedProducts.map((row) => {
                        return {
                            ...row,
                        };
                    }),
                },
                { hover: true }
            );
        },
        start_buying(shipping_id) {
            

            // generate payment link first
            // save transaction
            // update shipping transaction_id
            // then redirect to pay
            // *********************
            // get offer based on id
            this.is_loading = true;
            const ship_item = this.shipedProducts.find(
                (o) => Number(o.id) === Number(shipping_id)
            );
            console.log(ship_item);

            var pay_price = ship_item.price;
            var pay_desc =
                "buying " +
                ship_item.product.title +
                " for price of: $" +
                ship_item.price 
                ;
            this.current_ship = ship_item;
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
                    this.createNewTransiction(data);
                })
                .catch((error) => {
                    this.is_loading = false;

                    this.toast.error("network error ");
                });
        },
        createNewTransiction(pay_data) {
            let config = {
                Authorization: this.UserAuthToken,
            };
            let body = {
                amount: pay_data.price_amount,
                order_id: pay_data.order_id,
                item_type: 2, // user shipped product id 
                item_id: this.current_ship.id,
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
                    this.updateShippingData(response.data.id);
                    // after redirect to pay
                })
                .catch((error) => {
                    console.log("error create transac");
                    console.log(error);
                    this.is_loading = false;

                })
                .finally(() => {});
        },
        updateShippingData(transaction_id){
            let config = {
                Authorization: this.UserAuthToken,
            };
            var body = {
                id: this.current_ship.id,
                transaction_id: transaction_id,
            };
           
            axios({
                method: "put",
                url: this.baseUrl + this.updateTransactionUrl,
                data: body,
                headers: config,
            })
                .then((response) => {
                    const id =this.current_payment.id

                    // then redirect to pay
                    window.location.href ="https://nowpayments.io/payment/?iid=" +id;

                    
                   
                })
                .catch((error) => {
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
    },
    mounted() {
        this.fetchShipedProducts();
        var self = this;
        $("#shiped_table").on("click", "button", function () {
            var id = $(this).attr("id");

            self.start_buying(id);
        });
    },
};
</script>
<style lang="scss" scoped></style>
