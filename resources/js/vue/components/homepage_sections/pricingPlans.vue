<template>
    <div id="pricing" class="section-seperator">
        <div class="divider"></div>
        <span class="and">
            <ion-icon name="basket"></ion-icon>
        </span>
        <div class="divider"></div>
    </div>
    <div v-if="packages.length === 3" class="pricing-section section-container">
        <div class="buy-header-container">
            <h2 style="display: inline" class="section-title">Buy</h2>
            <h2
                class="section-title"
                style="display: inline; color: var(--color-secondary)"
            >
                Bid
            </h2>
            <h2 class="section-title" style="display: inline">& Start Today</h2>
        </div>
        <section class="section">
            <div class="container relative">
                <div class="row">
                    <!-- bid packages are sorted by price  -->

                    <div data-index="1" class="price-card col-md-4 p-md-0">
                        <!-- BEGIN TABLE -->
                        <div class="table-default table1 grad1">
                            <!-- BEGIN TABLE HEADER -->
                            <div class="table__header">
                                <h2 class="table__header--title">Basic</h2>
                                <p
                                    data-price="120"
                                    class="table__header--price"
                                >
                                    <span>$</span> {{ packages[2].price }}
                                </p>
                            </div>
                            <!-- END TABLE HEADER -->
                            <div class="table__content">
                                <!-- BEGIN TABLE LIST -->
                                <ul class="table__content--list">
                                    <li>
                                        Contain
                                        {{ packages[2].bid_amount }} Bids
                                    </li>
                                    <li>500 Anylytics Campaings</li>
                                    <li>250,000 crawled Page</li>
                                    <li class="muted">Unlimited Updates</li>
                                    <li class="muted">Free Website Design</li>
                                </ul>
                                <!-- END TABLE LIST -->
                            </div>
                            <!-- BEGIN TABLE FOOTER -->
                            <div class="table__footer">
                                <!-- <a href="#" class="button">Get Started</a> -->
                                <button class="cssbuttons-io-button">
                                    Get started
                                    <div class="icon">
                                        <svg
                                            height="24"
                                            width="24"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M0 0h24v24H0z"
                                                fill="none"
                                            ></path>
                                            <path
                                                d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                                fill="currentColor"
                                            ></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <!-- END TABLE FOOTER -->
                        </div>
                        <!-- END TABLE -->
                    </div>
                    <!-- main -->
                    <!-- first package is most expensive and main one -->
                    <div data-index="2" class="center-p price-card col-md-4 p-md-0">
                        <!-- BEGIN TABLE -->
                        <div
                            style="position: relative"
                            class="table-default table1 recommended grad2"
                        >
                            <!-- BEGIN TABLE HEADER -->
                            <div class="tag">
                                <p>Best Seller</p>
                            </div>
                            <div class="table__header">
                                <h2 class="table__header--title">Premium</h2>
                                <p
                                    data-price="250"
                                    class="table__header--price"
                                >
                                    <span>$</span> {{ packages[0].price }}
                                </p>
                            </div>
                            <!-- END TABLE HEADER -->
                            <div class="table__content">
                                <!-- BEGIN TABLE LIST -->
                                <ul class="table__content--list">
                                    <li>
                                        Contain
                                        {{ packages[0].bid_amount }} Bids
                                    </li>
                                    <li>500 Anylytics Campaings</li>
                                    <li>250,000 crawled Page</li>
                                    <li>Unlimited Updates</li>
                                    <li class="muted">Free Website Design</li>
                                </ul>
                                <!-- END TABLE LIST -->
                            </div>
                            <!-- BEGIN TABLE FOOTER -->
                            <div class="table__footer">
                                <button class="cssbuttons-io-button">
                                    Get started
                                    <div class="icon">
                                        <svg
                                            height="24"
                                            width="24"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M0 0h24v24H0z"
                                                fill="none"
                                            ></path>
                                            <path
                                                d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                                fill="currentColor"
                                            ></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <!-- END TABLE FOOTER -->
                        </div>
                        <!-- END TABLE -->
                    </div>
                    <div data-index="3" class="price-card col-md-4 p-md-0">
                        <!-- BEGIN TABLE -->
                        <div class="table-default table1 grad3">
                            <!-- BEGIN TABLE HEADER -->
                            <div class="table__header">
                                <h2 class="table__header--title">Standard</h2>
                                <p
                                    data-price="520"
                                    class="table__header--price"
                                >
                                    <span>$</span> {{ packages[1].price }}
                                </p>
                            </div>
                            <!-- END TABLE HEADER -->
                            <div class="table__content">
                                <!-- BEGIN TABLE LIST -->
                                <ul class="table__content--list">
                                    <li>
                                        Contain
                                        {{ packages[1].bid_amount }} Bids
                                    </li>
                                    <li>500 Anylytics Campaings</li>
                                    <li>250,000 crawled Page</li>
                                    <li>Unlimited Updates</li>
                                    <li>Free Website Design</li>
                                </ul>
                                <!-- END TABLE LIST -->
                            </div>
                            <!-- BEGIN TABLE FOOTER -->
                            <div class="table__footer">
                                <button class="cssbuttons-io-button">
                                    Get started
                                    <div class="icon">
                                        <svg
                                            height="24"
                                            width="24"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M0 0h24v24H0z"
                                                fill="none"
                                            ></path>
                                            <path
                                                d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                                fill="currentColor"
                                            ></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <!-- END TABLE FOOTER -->
                        </div>
                        <!-- END TABLE -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    props: ["packages"],
    mounted() {
        document.querySelectorAll(".price-card").forEach((card) => {
        card.addEventListener("click", function () {
            // Remove the 'active' class from all cards
            document.querySelectorAll(".price-card").forEach((c) => c.classList.remove("active"));
            
            // Add the 'active' class to the clicked card
            this.classList.add("active");
        });
    });
    },
};
</script>

<style lang="scss" scoped>
// @import url("//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
.buy-header-container {
    margin-bottom: -3rem;
    margin-top: 2.5rem;
    text-align: center;
}

.container {
    margin-bottom: 10rem;
}

.section {
    padding: 5% 0;
}

.section h1 {
    font-size: 32px;
    font-weight: 600;
    text-align: center;
}

.section.grey {
    background-color: #f6f6f6;
}

.row {
    display: flex;
    width: 75%;
    margin: auto;
}

.col-md-4 {
    width: 33.33%;
}

.section-grad {
    background: transparent -webkit-gradient(
            linear,
            left top,
            left bottom,
            color-stop(42%, #b06ab3),
            color-stop(0%, transparent)
        ) repeat scroll 0% 0%;
    background: transparent -webkit-linear-gradient(
            top,
            #b06ab3 42%,
            transparent 0%
        ) repeat scroll 0% 0%;
    background: transparent -o-linear-gradient(top, #b06ab3 42%, transparent 0%)
        repeat scroll 0% 0%;
    background: transparent linear-gradient(180deg, #b06ab3 42%, transparent 0%)
        repeat scroll 0% 0%;
}

.section-grad h1 {
    color: #fff;
}

.grad1 {
    // background: -webkit-linear-gradient(220deg, #e878d4, #b3ceeb);
    // background: -o-linear-gradient(220deg, #e878d4, #b3ceeb);

    background: rgb(170, 170, 170);
    background: linear-gradient(
        0deg,
        rgba(170, 170, 170, 0) 64%,
        var(--color-primary-tint-3) 100%
    );
}

.grad2 {
    // background: #ffafbd;
    background: -webkit-linear-gradient(220deg, #ffafbd, #ffc3a0);
    background: -o-linear-gradient(220deg, #ffafbd, #ffc3a0);
    background: linear-gradient(230deg, #ffafbd, #ffc3a0);
    background: linear-gradient(
        0deg,
        rgba(170, 170, 170, 0) 64%,
        var(--color-primary-tint-6) 100%
    );
}

.grad3 {
    // background: #ffafbd;
    background: -webkit-linear-gradient(220deg, #51a8c2, #a3dac4);
    background: -o-linear-gradient(220deg, #51a8c2, #a3dac4);
    background: linear-gradient(230deg, #51a8c2, #a3dac4);
    background: linear-gradient(
        0deg,
        rgba(170, 170, 170, 0) 64%,
        var(--color-primary-tint-3) 100%
    );
}

.button {
    display: inline-block;
    width: 100%;
    max-width: 180px;
    padding: 8px 18px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

/* Table Default Style */
.table-default {
    background-color: #fff;
    text-align: center;
    padding: 24px 14px;
    border-radius: 8px;
    overflow: hidden;
    margin-top: 40px;
}

.table {
    /* Table Header */
}

.table__header--icon {
    max-width: 100%;
}

.table__header--price {
    position: relative;
    color: #666;
}

.table__content {
    padding: 20px 0;
    /* Table List */
}

.table__content--list li {
    font-size: 0.95rem;
    font-weight: 600;
    padding: 6px 0;
    color: #666;
}

.table__content--list li.muted {
    opacity: 0.35;
}

.table__footer {
    margin-top: 20px;
}

/*=======================
  Table Style 1
=========================*/
.table1 {
    position: relative;
    color: #fff;
    margin-top: 80px;
    z-index: 1;
    border-bottom-left-radius: 35px;
    border-bottom-right-radius: 35px;
}

.table1 .table__header--title {
    position: relative;
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 36px;
}

.table1 .table__header--title::after {
    content: " ";
    position: absolute;
    bottom: -6px;
    left: 0;
    right: 0;
    width: 16px;
    height: 3px;
    background-color: #fff;
    border-radius: 10px;
    margin: auto;
}

.table1 .table__header--price {
    font-size: 46px;
    font-weight: 700;
}

.table1 .table__header--price span {
    position: relative;
    top: -20px;
    right: -10px;
    font-size: 0.45em;
}

.table1 .table__header--price::after {
    content: attr(data-price);
    position: absolute;
    top: -30px;
    left: 30px;
    width: 100%;
    color: inherit;
    font-size: 90px;
    opacity: 0.1;
}

.table1 .button {
    background-color: var(--color-primary-tint-5);
    color: #fff;
    border-radius: 44px;
    font-weight: 600;
}

.table1 .button:hover {
    -webkit-box-shadow: 0 0 50px rgba(0, 0, 0, 0.12);
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.12);
}

.table1.recommended {
    -webkit-transform: scale(1.2);
    -ms-transform: scale(1.2);
    transform: scale(1.2);
    -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);
    z-index: 2;
}

.tag {
    background-color: #b72b05;
    -webkit-clip-path: polygon(
        100% 0,
        90% 51%,
        100% 100%,
        0% 100%,
        11% 52%,
        0% 0%
    );
    clip-path: polygon(100% 0, 90% 51%, 100% 100%, 0% 100%, 11% 52%, 0% 0%);
    transform: rotate(-90deg);
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
    width: 15rem;
    position: absolute;
    top: 4.5rem;
    left: -4rem;

    p {
        background-color: #b72b05;
        padding: 0.2rem 0;
    }
}

@media only screen and (min-width: 992px) {
    .p-md-0 {
        padding: 0;
    }
}

@media only screen and (max-width: 990px) {
    .table1.recommended,
    .table2.recommended {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }

    .table3:hover .table__header--price {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }

    .table3 .button {
        position: static;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        margin-top: 20px;
    }
}

// get started buttons
.cssbuttons-io-button {
    background: #4f3c71;
    color: white;
    font-family: inherit;
    padding: 0.35em;
    padding-left: 1.2em;
    font-size: 17px;
    font-weight: 500;
    border-radius: 9em;
    border: none;
    letter-spacing: 0.05em;
    display: flex;
    align-items: center;
    box-shadow: inset 0 0 1.6em -0.6em #714da6;
    overflow: hidden;
    position: relative;
    height: 3em;
    padding-right: 3.3em;
    cursor: pointer;
    margin: auto;
}

.cssbuttons-io-button .icon {
    background: white;
    margin-left: 1em;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 2.5em;
    width: 2.2em;
    border-radius: 7em;
    box-shadow: 0.1em 0.1em 0.6em 0.2em #7b52b9;
    right: 0.3em;
    transition: all 0.3s;
}

.cssbuttons-io-button:hover .icon {
    width: calc(100% - 0.6em);
}

.cssbuttons-io-button .icon svg {
    width: 1.5em;
    transition: transform 0.3s;
    color: #4f3c71;
}

.cssbuttons-io-button:hover .icon svg {
    transform: translateX(0.1em);
}

.cssbuttons-io-button:active .icon {
    transform: scale(0.95);
}
</style>
