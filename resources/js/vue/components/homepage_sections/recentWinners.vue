<template>
    <div class="section-seperator">
        <div class="divider"></div>
        <span class="and">
            <ion-icon name="trophy"></ion-icon>
        </span>
        <div class="divider"></div>
    </div>
    <div class="section-container">
        <h2 class="section-title">
            Our Latest
            <h2 style="display: inline; color: #6350d7">Winners</h2>
        </h2>

        <div class="reviews-container flex gap-2.5">
            <div class="container w-4/12">
                <div class="card bg-1">
                    <div class="imgBx">
                        <img
                            :src="'/storage/images/product_images/trans-ps5-2.png'"
                        />
                    </div>
                    <div class="contentBx">
                        <h2>PlayStation 5</h2><h3 class="o-price">Original Price: $1799</h3>

                        <div class="size">
                           
                            <div class="pic-container">
                                <div class="border-wrap">
                                    <img
                                        class="user_img"
                                        :src="'/storage/images/user_profiles/150-9.jpg'"
                                    />
                                </div>
                            </div>
                            <div class="winner-info">
                                <h3>Winner: Sara Jones</h3>
                               <h3>Total Bids Placed: 97</h3>
                                <h3>Win Price: $1000</h3>
                            </div>
                        </div>
                        <!-- <div class="color">
                            <h3>Original Price: 2000$</h3>
                        </div>
                        <a href="#"> <h3>Win Price: 112$</h3></a> -->
                    </div>
                </div>
            </div>

            <div class="container w-4/12">
                <div class="card bg-1">
                    <div class="imgBx">
                        <img
                            :src="'/storage/images/product_images/trans-glasses.png'"
                        />
                    </div>
                    <div class="contentBx">
                        <h2>Sun Glasses</h2><h3 class="o-price">Original Price: $1799</h3>
                        <div class="size">
                            <div class="pic-container">
                                <div class="border-wrap">
                                    <img
                                        class="user_img"
                                        :src="'/storage/images/user_profiles/150-7.jpg'"
                                    />
                                </div>
                            </div>
                            <div class="winner-info">
                                <h3>Winner: Kate sinor</h3>
                              <h3>Total Bids Placed: 48</h3>
                                <h3>Win Price: $100</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container w-4/12">
                <div class="card bg-1">
                    <div class="imgBx">
                        <img
                            :src="'/storage/images/product_images/trans-macbook-2.png'"
                        />
                    </div>
                    <div class="contentBx">
                        <h2>Macbook pro</h2><h3 class="o-price">Original Price: $2300</h3>
                        <div class="size">
                            <div class="pic-container">
                                <div class="border-wrap">
                                    <img
                                        class="user_img"
                                        :src="'/storage/images/user_profiles/150-3.jpg'"
                                    />
                                </div>
                            </div>
                            <div class="winner-info">
                                <h3>Winner: Kim James</h3>
                                <h3>Total Bids Placed: 65</h3>
                                <h3>Win Price: $700</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container w-4/12">
                <div class="card bg-1">
                    <div class="imgBx">
                        <img
                            :src="'/storage/images/product_images/trans-iphone-2.png'"
                        />
                    </div>
                    <div class="contentBx">
                        <h2>Iphone 11</h2><h3 class="o-price">Original Price: $750</h3>
                        <div class="size">
                            <div class="pic-container">
                                <div class="border-wrap">
                                    <img
                                        class="user_img"
                                        :src="'/storage/images/user_profiles/150-11.jpg'"
                                    />
                                </div>
                            </div>
                            <div class="winner-info">
                                <h3>Winner: Flora timony</h3>
                              <h3>Total Bids Placed: 65</h3>
                                <h3>Win Price: $2300</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="more-container">
            <button class="more-btn">
                View All <ion-icon name="share-alt"></ion-icon>
            </button>
        </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>

.contentBx .o-price{
    margin-top: -1rem;
    font-style: italic;
    font-weight: 500;
    color: rgb(255, 255, 255);
}
.more-container{
    margin-top: 5rem;
}
.container {
    position: relative;
    // zoom: 0.9;
    //   -moz-transform: scale(0.9);
    box-shadow: 0 7px 10px gray;
    border-radius: 20px;
}

.container .card {
    position: relative;
    width: 100%;
    height: 450px;
    background: rgb(182 182 246 / 43%);

    // background: linear-gradient(90deg, rgba(42,26,78,0.9471988624551383) 2%, rgba(76,113,171,0.7847338764607406) 95%);
    border-radius: 20px;
    overflow: hidden;
}

.container .card:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    clip-path: circle(150px at 80% 20%);
    transition: 0.5s ease-in-out;
}

.container .card:hover:before {
    clip-path: circle(300px at 80% -20%);
}

.container .card:after {
    content: "WIN";
    position: absolute;
    top: 45%;
    left: 8%;
    font-size: 9em;
    font-weight: 800;
    font-style: italic;
    color: rgb(176 176 176 / 29%);
}

.container .card .imgBx {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10000;
    width: 100%;
    height: 220px;
    transition: 0.5s;
}

.container .card:hover .imgBx {
    top: 0%;
    transform: translateY(0%);
}

.container .card .imgBx img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-25deg);
    width: 270px;
}

.container .card .contentBx {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 100px;
    text-align: center;
    transition: 1s;
    z-index: 10;
}

.container .card:hover .contentBx {
    height: 210px;
}

.container .card .contentBx h2 {
    position: relative;
    font-weight: 600;
    letter-spacing: 1px;
    color: #fff;
    margin: 0;
    margin-bottom: 1rem;
    font-size: 1.5rem;
    color: #f3f5f9;
}


.container .card .contentBx .size,
.container .card .contentBx .color {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 8px 20px;
    transition: 0.5s;
    opacity: 0;
    visibility: hidden;
    padding-top: 0;
    padding-bottom: 0;
    margin-bottom: 0.7rem;
}

.container .card:hover .contentBx .size {
    opacity: 1;
    visibility: visible;
    transition-delay: 0.5s;
    display: flex;
}
.winner-info {
    text-align: left;
    padding-left: 0.7rem;
    line-height: 2;
}

.container .card:hover .contentBx .color {
    opacity: 1;
    visibility: visible;
    transition-delay: 0.6s;
}

.container .card .contentBx .size h3,
.container .card .contentBx .color h3 {
  color: #6350d7;
    text-transform: uppercase;
    margin-right: 10px;
    letter-spacing: 1.6px;
    font-size: .9rem;
    font-weight: 600;
}

.container .card .contentBx .size span {
    width: 26px;
    height: 26px;
    text-align: center;
    line-height: 26px;
    font-size: 14px;
    display: inline-block;
    color: #111;
    background: #fff;
    margin: 0 5px;
    transition: 0.5s;
    color: #111;
    border-radius: 4px;
    cursor: pointer;
}

.container .card .contentBx a {
    display: inline-block;
    padding: 10px 20px;
    background: #fff;
    border-radius: 4px;
    margin-top: 10px;
    text-decoration: none;
    font-weight: 600;
    color: #111;
    opacity: 0;
    transform: translateY(50px);
    transition: 0.5s;
    margin-top: 0;
    cursor: auto;
    background-color: #fdfdfded;
}

.container .card:hover .contentBx a {
    opacity: 1;
    transform: translateY(0px);
    transition-delay: 0.75s;
}
.container .bg-1:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    clip-path: circle(150px at 80% 20%);
    transition: 0.5s ease-in-out;
    background-color: rgb(255 255 255);
}
.pic-container {
    position: relative;
    display: flex;
    justify-content: start;
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
       
        background: linear-gradient(to right, rgb(99 80 215), rgb(236 236 236));

        border-radius: 100px;
        .user_img {
            width: 7rem;
            border-radius: 200px;
            height: 7rem;
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
</style>
