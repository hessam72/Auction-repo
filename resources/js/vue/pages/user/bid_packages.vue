<template>
    <page-title :title="'Bid Packages'"></page-title>

    <div class="pricing-table">
        <div v-for="(item, index) in packages" class="ptable-item">
            <div class="ptable-single">
                <div class="ptable-header">
                    <!-- <div class="ptable-status">
                            <span>Hot</span>
                        </div> -->
                    <div class="ptable-title">
                        <h2>{{ item.bid_amount }} Bids</h2>
                    </div>
                    <div v-if="item.discount > 0" class="discount-price">
                        <del>
                            <span class="amount">${{ item.price }}</span>
                        </del>
                        <ins>
                            <span class="amount"
                                >${{
                                    calDiscount(item.price, item.discount)
                                }}</span
                            >
                        </ins>
                    </div>
                    <div v-else class="discount-price">
                        <del>
                            <span class="amount"></span>
                        </del>
                        <ins>
                            <span class="amount">${{ item.price }}</span>
                        </ins>
                    </div>
                    <!-- <div v-if="item.discount > 0" class="ptable-price">
                        <h2 class="discount-price">
                            <small>$</small>{{ item.price }}
                        </h2>
                        <h2>
                            <small>$</small
                            >{{ (item.price * 100) / item.discount }}
                        </h2>
                    </div> -->
                </div>
                <div class="ptable-body">
                    <div class="ptable-description">
                        <ul>
                            <li>Fast and Secure</li>
                            <li>Pay with Crypto</li>
                            <li>Instant Charging Account</li>
                            <li>Start Bidding Rightaway</li>
                        </ul>
                    </div>
                </div>
                <div class="ptable-footer">
                    <div @click="buyPackage" class="ptable-action">
                        <a>Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { sendGet, sendPost } from "../../../modules/api";
// import { generatePaymentLink } from "@/modules/utilities/CryptoPayment.js";
export default {
    data() {
        return {
            is_loading: false,
            is_loading_more: false,

            fetchrl: "bid_packages/all",
            packages: [],
        };
    },
    methods: {
        // generatePaymentLink,
        buyPackage(id, desc, price) {
            //get bid package id and generate link
            const body = {
                email: "tahamidev@gmail.com",
                password: "Seyed123",
            };
            sendPost(
                "https://api.nowpayments.io/v1/auth", //url
                body, //body
                { "Content-Type": "application/json" } //headers
            )
                .then((data) => {
                   
                  console.log(data)
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        fetchData() {
            axios({
                method: "post",
                url: this.baseUrl + this.fetchrl,
            })
                .then((response) => {
                    console.log(response.data.data);
                    this.packages = response.data.data;
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});
        },
        calDiscount(price, discount) {
            var p = (discount / 100) * price;

            return price - p;
        },
    },
    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken", "user"]),
    },
    created() {
        this.fetchData();
    },
    components: {},
};
</script>

<style lang="scss" scoped>
// .packages-container {
//     display: grid;
//     grid-template-columns: 1fr 1fr 1fr;
//     row-gap: 4rem;
//     column-gap: 3rem;
//     padding: 3rem 5rem;
// }

h1.demo-title {
    text-align: center;
    font-size: 30px;
    font-weight: 600;
    color: #2a293e;
    letter-spacing: 2px;
}

h1.demo-title a {
    font-size: 16px;
    font-weight: 300;
}

.pricing-table {
    display: flex;
    flex-flow: row wrap;
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
    margin-top: 2rem;
}

.pricing-table .ptable-item {
    width: 33.33%;
    padding: 0 15px;
    margin-bottom: 30px;
}

@media (max-width: 992px) {
    .pricing-table .ptable-item {
        width: 33.33%;
    }
}

@media (max-width: 768px) {
    .pricing-table .ptable-item {
        width: 50%;
    }
}

@media (max-width: 576px) {
    .pricing-table .ptable-item {
        width: 100%;
    }
}

.pricing-table .ptable-single {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.pricing-table .ptable-header,
.pricing-table .ptable-body,
.pricing-table .ptable-footer {
    position: relative;
    width: 100%;
    text-align: center;
    overflow: hidden;
}

.pricing-table .ptable-status,
.pricing-table .ptable-title,
.pricing-table .ptable-price,
.pricing-table .ptable-description,
.pricing-table .ptable-action {
    position: relative;
    width: 100%;
    text-align: center;
}

.pricing-table .ptable-single {
    background: #f6f8fa;
    border-radius: 10px;
}

.pricing-table .ptable-single:hover {
    box-shadow: 0 0 10px #999999;
}

.pricing-table .ptable-header {
    margin: 0 30px;
    padding: 30px 0 45px 0;
    width: auto;

    background: linear-gradient(-45deg, #492b89, #782b89, #2b3d89, #2b8978);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
    transition: all 0.3s ease;
    height: 16rem;
}

.pricing-table .ptable-header::before,
.pricing-table .ptable-header::after {
    content: "";
    position: absolute;
    bottom: 0;
    width: 0;
    height: 0;
    border-bottom: 100px solid #f6f8fa;
}

.pricing-table .ptable-header::before {
    right: 50%;
    border-right: 250px solid transparent;
}

.pricing-table .ptable-header::after {
    left: 50%;
    border-left: 250px solid transparent;
}

.pricing-table .ptable-item.featured-item .ptable-header {
    background: #ff6f61;
}

.pricing-table .ptable-status {
    margin-top: -30px;
}

.pricing-table .ptable-status span {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 30px;
    padding: 5px 0;
    text-align: center;
    color: #ff6f61;
    font-size: 14px;
    font-weight: 300;
    letter-spacing: 1px;
    background: #2a293e;
}

.pricing-table .ptable-status span::before,
.pricing-table .ptable-status span::after {
    content: "";
    position: absolute;
    bottom: 0;
    width: 0;
    height: 0;
    border-bottom: 10px solid #ff6f61;
}

.pricing-table .ptable-status span::before {
    right: 50%;
    border-right: 25px solid transparent;
}

.pricing-table .ptable-status span::after {
    left: 50%;
    border-left: 25px solid transparent;
}

.pricing-table .ptable-title h2 {
    color: #ffffff;
    font-size: 24px;
    font-weight: 300;
    letter-spacing: 2px;
}

.pricing-table .ptable-price h2 {
    margin: 0;
    color: #ffffff;
    font-size: 45px;
    font-weight: 700;
    margin-left: 15px;
}

.pricing-table .ptable-price h2 small {
    position: absolute;
    font-size: 18px;
    font-weight: 300;
    margin-top: 16px;
    margin-left: -15px;
}

.pricing-table .ptable-price h2 span {
    margin-left: 3px;
    font-size: 16px;
    font-weight: 300;
}

.pricing-table .ptable-body {
    padding: 20px 0;
}

.pricing-table .ptable-description ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.pricing-table .ptable-description ul li {
    color: #2a293e;
    font-size: 14px;
    font-weight: 300;
    letter-spacing: 1px;
    padding: 7px;
    border-bottom: 1px solid #dedede;
}

.pricing-table .ptable-description ul li:last-child {
    border: none;
}

.pricing-table .ptable-footer {
    padding-bottom: 30px;
}

.pricing-table .ptable-action a {
    display: inline-block;
    padding: 10px 20px;
    color: #f6f8fa;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 2px;
    text-decoration: none;
    background: #321d60;
    border-radius: 20px;
}

.pricing-table .ptable-action a:hover {
    color: #fff;
    background: #1e618b;
}

.discount-price {
    color: #ffffffe0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    del {
        color: #d2d0d0;
        text-decoration: none;
        position: relative;
        font-size: 35px;
        font-weight: 100;
        &:before {
            content: " ";
            display: block;
            width: 100%;
            border-top: 3px solid rgba(203, 0, 0, 0.862);
            height: 4px;
            position: absolute;
            bottom: 20px;
            left: 0;
            transform: rotate(-11deg);
        }
        &:after {
            content: " ";
            display: block;
            width: 100%;
            border-top: 3px solid rgba(203, 0, 0, 0.862);
            height: 4px;
            position: absolute;
            bottom: 20px;
            left: 0;
            transform: rotate(11deg);
        }
    }
    ins {
        font-size: 50px;
        font-weight: 500;
        bottom: 2.7rem;
        position: absolute;
        text-decoration: none;
        // padding: 1em 1em 1em 0.5em;
    }
}
// .pricing-table .ptable-item.featured-item .ptable-action a {
//     color: #2a293e;
//     background: #1e618b;
// }

// .pricing-table .ptable-item.featured-item .ptable-action a:hover {
//     color: #1e618b;
//     background: #2a293e;
// }
</style>
