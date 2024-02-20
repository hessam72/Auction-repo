<template>
  <div class="section-container">
    <h2 class="section-title">Featured Auctions</h2>
    <div class="auction-container">
      <div class="item-container w-4/12 relative">
        <div class="bookmark-container">
          <ion-icon class="icon-bg" name="bookmark"></ion-icon>
          <ion-icon class="icon-border" name="bookmark-outline"></ion-icon>
        </div>
        <div class="rounded-t-3xl overflow-hidden">
          <div class="auction-img">
            <p class="card-title">macbook pro m1</p>
            <img
              class="w-full"
              :src="'/storage/images/product_images/macbook-1.jpeg'"
              alt="Sunset in the mountains"
            />
          </div>
          <div class="content flex flex-col gap-2.5 py-5 px-7">
            <div class="header flex flex-col gap-1">
              <p class="live-price">$5.31</p>
              <p class="current-winner">ahmad_ali_24</p>
            </div>
            <!-- <div class="desc">
              <p>lorem ipson dollorem ipson dollorem smith .....</p>
            </div> -->
            <div class="timer">
              <vue-countdown
                :time="7 * 60 * 60 * 1000"
                v-slot="{ hours, minutes, seconds }"
              >
                <div class="count-down">
                  <div class="number">{{ hours }}</div>
                  <div class="seperator">:</div>
                  <div class="number">{{ minutes }}</div>
                  <div class="seperator">:</div>
                  <div class="number">{{ seconds }}</div>
                </div>
              </vue-countdown>
            </div>
            <button class="btn-primary w-full">Bid Now</button>
            <button class="btn-secoundary">Buy it Now for 1020$</button>
          </div>
        </div>
      </div>
      <div class="item-container w-4/12 relative">
        <div class="bookmark-container">
          <ion-icon class="icon-bg" name="bookmark"></ion-icon>
          <ion-icon class="icon-border" name="bookmark-outline"></ion-icon>
        </div>
        <div class="rounded-t-3xl overflow-hidden">
          <div class="auction-img">
            <p class="card-title">iphone 13 pink</p>
            <img
              class="w-full"
              :src="'/storage/images/product_images/iphone-3.jpg'"
              alt="Sunset in the mountains"
            />
          </div>
          <div class="content flex flex-col gap-2.5 py-5 px-7">
            <div class="header flex flex-col gap-1">
              <p class="starting_time">Today at 5:58 PM</p>
              <p class="current-winner">Bid during last 9 seconds.</p>
            </div>
            <!-- <div class="desc">
              <p>lorem ipson dollorem ipson dollorem smith .....</p>
            </div> -->
            <div class="timer">
              <vue-countdown
                :time="13 * 60 * 60 * 1000"
                v-slot="{ hours, minutes, seconds }"
              >
                <div class="count-down">
                  <div class="number">{{ hours }}</div>
                  <div class="seperator">:</div>
                  <div class="number">{{ minutes }}</div>
                  <div class="seperator">:</div>
                  <div class="number">{{ seconds }}</div>
                </div>
              </vue-countdown>
            </div>
            <button class="w-full startingsoon-btn">Starting Soon</button>
            <button class="btn-secoundary">Buy it Now for 1020$</button>
          </div>
        </div>
      </div>
      <div class="item-container w-4/12 relative">
        <div class="no-new-bidders">no new bidders</div>
        <div class="bookmark-container">
          <ion-icon class="icon-bg" name="bookmark"></ion-icon>
          <ion-icon class="icon-border" name="bookmark-outline"></ion-icon>
        </div>
        <div class="rounded-t-3xl overflow-hidden">
          <div class="auction-img">
            <p class="card-title">macbook air m2</p>
            <img
              class="w-full"
              :src="'/storage/images/product_images/macbook-2.jpg'"
              alt="Sunset in the mountains"
            />
          </div>
          <div class="content flex flex-col gap-2.5 py-5 px-7">
            <div class="header flex flex-col gap-1">
              <p class="live-price">$0.57</p>
              <p class="current-winner">ahmad_ali_24</p>
            </div>
            <!-- <div class="desc">
              <p>lorem ipson dollorem ipson dollorem smith .....</p>
            </div> -->
            <div class="timer">
              <vue-countdown
                :time="1 * 60 * 60 * 1000"
                v-slot="{ hours, minutes, seconds }"
              >
                <div class="count-down">
                  <div class="number">{{ hours }}</div>
                  <div class="seperator">:</div>
                  <div class="number">{{ minutes }}</div>
                  <div class="seperator">:</div>
                  <div class="number">{{ seconds }}</div>
                </div>
              </vue-countdown>
            </div>
            <button class="btn-primary w-full">Bid Now</button>

            <button class="btn-secoundary">Buy it Now for 1020$</button>
          </div>
        </div>
      </div>
      <div class="item-container w-4/12 relative">
        <div class="bookmark-container">
          <ion-icon class="icon-bg" name="bookmark"></ion-icon>
          <ion-icon class="icon-border" name="bookmark-outline"></ion-icon>
        </div>
        <div class="rounded-t-3xl overflow-hidden">
          <div class="auction-img">
            <p class="card-title">playstation 5</p>
            <img
              class="w-full"
              :src="'/storage/images/product_images/ps5-2.png'"
              alt="Sunset in the mountains"
            />
          </div>
          <div class="content flex flex-col gap-2.5 py-5 px-7">
            <div class="header flex flex-col gap-1">
              <p class="live-price">$57.41</p>
              <p class="current-winner">sara_afx_24</p>
            </div>
            <!-- <div class="desc">
              <p>lorem ipson dollorem ipson dollorem smith .....</p>
            </div> -->
            <div class="timer">
              <vue-countdown
                :time="3 * 60 * 60 * 1000"
                v-slot="{ hours, minutes, seconds }"
              >
                <div class="count-down">
                  <div class="number">{{ hours }}</div>
                  <div class="seperator">:</div>
                  <div class="number">{{ minutes }}</div>
                  <div class="seperator">:</div>
                  <div class="number">{{ seconds }}</div>
                </div>
              </vue-countdown>
            </div>
            <button class="btn-primary w-full">Bid Now</button>
            <button class="btn-secoundary">Buy it Now for 1020$</button>
          </div>
        </div>
      </div>
    </div>
    <div class="more-container">
      <button class="more-btn">View All</button>
    </div>
  </div>
</template>


<script>
export default {};
</script>

<style lang="scss" scoped>


.card-title {
  text-align: center;
  font-size: 1rem;
  color: #444;
  font-weight: 400;
  background-color: #fff;
  padding-top: 0.6rem;
}
.sub-title {
  text-align: center;
  //   margin: 1.5rem;
  font-size: 1.2rem;
  color: #555555;
}
.auction-container {
  display: flex;
  gap: 1rem;
  justify-content: space-between;

  .item-container {
    height: auto;
    background-color: rgb(244, 244, 244);
    box-shadow: 0 2px 5px #b9b9b9;
  }
}
.header {
  .live-price {
    text-align: center;
    font-size: 2rem;
    color: rgb(93, 208, 28);
    text-shadow: 0 1px 1px rgba(20, 255, 0, 0.51);
  }
  .starting_time {
    text-align: center;
    font-size: 1.6rem;
    color: #777;
    margin-bottom: 0.6rem;
  }
  .current-winner {
    text-align: center;
    font-size: 0.8rem;
    color: #555;
  }
}
.desc {
  font-size: 1rem;
  color: #555555;
}
.auction-img {
  width: 100%;
  img {
    height: 10rem;
  }
}
.item-container {
  margin-bottom: 3rem;
  border-radius: 30px;
}
.bookmark-container {
  position: relative;
  font-size: 2.7rem;
  top: -1.2rem;
  right: -1rem;
  color: #ececec;
  .icon-bg {
    position: absolute;
    color: #fff;
    right: 0;
  }
  .icon-border {
    position: absolute;
    z-index: 20;
    color: #00000059;
    right: 0;
  }
}
.timer {
  .count-down {
    display: flex;
    gap: 0.1rem;
    text-align: center;
    padding: 0.6rem 1rem;
    // border: 1px solid;
    width: 85%;
    margin: auto;
    .number {
      padding: 0.5rem;
      background-color: #32334a;
      border-radius: 5px;
      color: #eee;
      font-weight: 600;
      box-shadow: 0 2.5px 5px #80808091;
      width: 3rem;
    }
    .seperator {
      padding: 0.5rem;
      color: #32334a;
      font-weight: 600;
    }
  }
}
.btn-primary {
  background-color: #a9aefb;
  border-radius: 50px;
  padding: 0.5rem;
  color: #fff;
  font-size: 1.7rem;
  font-weight: 600;
  text-shadow: 0 4px 5px #80808082;
  margin-bottom: 0.4rem;
}
.startingsoon-btn {
  background-color: #b1b2c8;
  border-radius: 50px;
  padding: 0.74rem;
  color: #fff;
  font-size: 1.4rem;
  font-weight: 600;
  //   text-shadow: 0 4px 5px #80808082;
  margin-bottom: 0.4rem;
}

.btn-secoundary {
  color: #444;
  border-bottom: 1px solid;
  width: 70%;
  margin: auto;
}
.content {
  border-bottom-right-radius: 30px;
  border-bottom-left-radius: 30px;
  background: linear-gradient(
    0deg,
    rgba(177, 194, 219, 0.2385153891) 22%,
    rgb(255, 255, 255) 95%
  );
}
.more-container {
  text-align: center;
  margin-bottom: 3rem;
  .more-btn {
    background-color: #32334a;
    border-radius: 50px;
    padding: 0.5rem 2.5rem;
    color: #fff;
    font-size: 1.4rem;
    font-weight: 500;
  }
}
.no-new-bidders {
  position: absolute;
  background-color: #f9f937;
  width: 100%;
  text-align: center;
  transform: rotateY(0deg) rotate(-20deg);
  top: 20%;
  clip-path: polygon(100% 0, 95% 48%, 100% 100%, 0% 100%, 5% 50%, 0% 0%);
  color: #222;
}
</style>
