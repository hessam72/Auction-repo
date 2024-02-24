<template>
    <div class="section-container">
        <!-- BEGIN TABLE STYLE 1 -->
        <section class="section">
            <div class="container">
                <h1>Choose Pricing Plan</h1>
                <div class="row">
                    <div class="col-md-4 p-md-0">
                        <!-- BEGIN TABLE -->
                        <div class="table-default table1 grad1">
                            <!-- BEGIN TABLE HEADER -->
                            <div class="table__header">
                                <h2 class="table__header--title">Basic</h2>
                                <p
                                    data-price="120"
                                    class="table__header--price"
                                >
                                    <span>$</span> 120
                                </p>
                            </div>
                            <!-- END TABLE HEADER -->
                            <div class="table__content">
                                <!-- BEGIN TABLE LIST -->
                                <ul class="table__content--list">
                                    <li>Limited Times Marketing</li>
                                    <li>500 Anylytics Campaings</li>
                                    <li>250,000 crawled Page</li>
                                    <li class="muted">Unlimited Updates</li>
                                    <li class="muted">Free Website Design</li>
                                </ul>
                                <!-- END TABLE LIST -->
                            </div>
                            <!-- BEGIN TABLE FOOTER -->
                            <div class="table__footer">
                                <a href="#" class="button">Get Started</a>
                            </div>
                            <!-- END TABLE FOOTER -->
                        </div>
                        <!-- END TABLE -->
                    </div>
                    <div class="col-md-4 p-md-0">
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
                                <h2 class="table__header--title">Standard</h2>
                                <p
                                    data-price="250"
                                    class="table__header--price"
                                >
                                    <span>$</span> 250
                                </p>
                            </div>
                            <!-- END TABLE HEADER -->
                            <div class="table__content">
                                <!-- BEGIN TABLE LIST -->
                                <ul class="table__content--list">
                                    <li>Limited Times Marketing</li>
                                    <li>500 Anylytics Campaings</li>
                                    <li>250,000 crawled Page</li>
                                    <li>Unlimited Updates</li>
                                    <li class="muted">Free Website Design</li>
                                </ul>
                                <!-- END TABLE LIST -->
                            </div>
                            <!-- BEGIN TABLE FOOTER -->
                            <div class="table__footer">
                                <a href="#" class="button">Get Started</a>
                            </div>
                            <!-- END TABLE FOOTER -->
                        </div>
                        <!-- END TABLE -->
                    </div>
                    <div class="col-md-4 p-md-0">
                        <!-- BEGIN TABLE -->
                        <div class="table-default table1 grad3">
                            <!-- BEGIN TABLE HEADER -->
                            <div class="table__header">
                                <h2 class="table__header--title">Premium</h2>
                                <p
                                    data-price="520"
                                    class="table__header--price"
                                >
                                    <span>$</span> 520
                                </p>
                            </div>
                            <!-- END TABLE HEADER -->
                            <div class="table__content">
                                <!-- BEGIN TABLE LIST -->
                                <ul class="table__content--list">
                                    <li>Limited Times Marketing</li>
                                    <li>500 Anylytics Campaings</li>
                                    <li>250,000 crawled Page</li>
                                    <li>Unlimited Updates</li>
                                    <li>Free Website Design</li>
                                </ul>
                                <!-- END TABLE LIST -->
                            </div>
                            <!-- BEGIN TABLE FOOTER -->
                            <div class="table__footer">
                                <a href="#" class="button">Get Started</a>
                            </div>
                            <!-- END TABLE FOOTER -->
                        </div>
                        <!-- END TABLE -->
                    </div>
                </div>
            </div>
        </section>
        <!-- END TABLE STYLE 1 -->
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
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
        rgba(103, 103, 103, 1) 100%
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
        rgba(174, 174, 245, 1) 100%
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
        rgba(103, 103, 103, 1) 100%
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
    background-color: rgb(174, 174, 245);

    color: #333;
    border-radius: 44px;
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
</style>
