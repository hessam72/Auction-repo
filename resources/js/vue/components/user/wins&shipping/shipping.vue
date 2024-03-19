<template>
    <div id="shiped_table"></div>
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
export default {
    data() {
        return {
            fetchShipedUrl: "shiped_product/all",
            shipedProducts: [],
            mergedShipedProducts: [],
            finalShipedProducts: [],

            is_loading: false,
        };
    },

    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken"]),
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
                    this.mergedShipedProducts = this.arrangeData(
                        this.shipedProducts
                    );
                    console.dir(this.mergedShipedProducts);
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
                } else if(item.status ===1) {
                    item.status_value = `<p style="color:#b3b700;font-weight:600;">Pending for Payment</p>`;
                }else if(item.status ===200) {
                    item.status_value = `<p style="color:blue;font-weight:600;">Shiped</p>`;
                }else if(item.status ===300) {
                    item.status_value = `<p style="color:yellow;font-weight:600;">Partially Paid </p>`;
                }else if(item.status ===400) {
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
                        console.log(btn.attributes["data-te-number"].value);
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
                        { label: "address", field: "address" },
                        { label: "status", field: "status_value" },
                        { label: "city", field: "city.name" },
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
    },
    created() {
        this.fetchShipedProducts();
    },
};
</script>
<style lang="scss" scoped></style>
