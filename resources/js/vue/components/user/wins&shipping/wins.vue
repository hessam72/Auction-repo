<template>
    <div id="wins_table"></div>
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
            fetchWinsUrl: "winners/user/all",
            WinProducts: [],
            mergedWinProducts: [],
            finalWinProducts: [],

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
                    console.dir(this.mergedWinProducts);
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
    },
    created() {
        this.fetchWins();
    },
};
</script>
<style lang="scss" scoped></style>
