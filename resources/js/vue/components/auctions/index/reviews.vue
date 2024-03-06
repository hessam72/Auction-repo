<template>
  <div class="reviews-container">
    <div class="header flex justify-between items-center">
      <h2>Reviews (35)</h2>
      <div class="total-score">
        <star-rating
          :round-start-rating="false"
          :rating="3.5"
          :read-only="true"
          :show-rating="false"
        ></star-rating>
      </div>
    </div>
    <div class="review-container flex">
      <div class="user-info flex flex-col justify-center items-center">
        <div class="size">
          <div class="pic-container">
            <div class="border-wrap">
              <img
                class="user_img"
                :src="'/storage/images/user_profiles/150-8.jpg'"
              />
            </div>
          </div>
          <div class="winner-info">
            <h3>Flora timony</h3>
            <h4>Current Heighest bidder</h4>
            <h4><ion-icon name="pin"></ion-icon> florida</h4>
          </div>
        </div>
      </div>
      <div class="content-container flex flex-col">
        <div class="content flex justify-between items-center">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
            tenetur hic similique voluptatem, possimus accusamus. Consequuntur
            architecto in vel.
          </p>
        </div>
        <div class="ratings">
          <div class="r-item flex items-center justify-between">
            <p>overall</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="3.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>shipping</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="1.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>quality</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>as described</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="4.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>packaging</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="2.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
        </div>
      </div>
    </div>
    <div class="review-container flex">
      <div class="user-info flex flex-col justify-center items-center">
        <div class="size">
          <div class="pic-container">
            <div class="border-wrap">
              <img
                class="user_img"
                :src="'/storage/images/user_profiles/150-15.jpg'"
              />
            </div>
          </div>
          <div class="winner-info">
            <h3>Flora timony</h3>
            <h4>Current Heighest bidder</h4>
            <h4><ion-icon name="pin"></ion-icon> florida</h4>
          </div>
        </div>
      </div>
      <div class="content-container flex flex-col">
        <div class="content flex justify-between items-center">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
            tenetur hic similique voluptatem, possimus accusamus. Consequuntur
            architecto in vel.
          </p>
        </div>
        <div class="ratings">
          <div class="r-item flex items-center justify-between">
            <p>overall</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="3.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>shipping</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="1.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>quality</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>as described</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="4.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>packaging</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="2.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
        </div>
      </div>
    </div>
    <div class="review-container flex">
      <div class="user-info flex flex-col justify-center items-center">
        <div class="size">
          <div class="pic-container">
            <div class="border-wrap">
              <img
                class="user_img"
                :src="'/storage/images/user_profiles/150-10.jpg'"
              />
            </div>
          </div>
          <div class="winner-info">
            <h3>Flora timony</h3>
            <h4>Current Heighest bidder</h4>
            <h4><ion-icon name="pin"></ion-icon> florida</h4>
          </div>
        </div>
      </div>
      <div class="content-container flex flex-col">
        <div class="content flex justify-between items-center">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
            tenetur hic similique voluptatem, possimus accusamus. Consequuntur
            architecto in vel.
          </p>
        </div>
        <div class="ratings">
          <div class="r-item flex items-center justify-between">
            <p>overall</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="3.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>shipping</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="1.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>quality</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>as described</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="4.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
          <div class="r-item flex items-center">
            <p>packaging</p>
            <star-rating
              :star-size="30"
              :round-start-rating="false"
              :rating="2.5"
              :read-only="true"
              :show-rating="false"
            ></star-rating>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 
<nav class="pagination" aria-label="Page navigation example">
  <ul class="list-style-none flex items-center justify-center">
    <li>
      <a
        class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-600 transition-all duration-300 hover:bg-neutral-100 "
        href="#"
        aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li>
      <a
        class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-600 transition-all duration-300 hover:bg-neutral-100 "
        href="#"
        >1</a
      >
    </li>
    <li aria-current="page">
      <a
        class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-800 transition-all duration-300 hover:bg-neutral-100 "
        href="#"
        >2</a
      >
    </li>
    <li>
      <a
        class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-600 transition-all duration-300 hover:bg-neutral-100 "
        href="#"
        >3</a
      >
    </li>
    <li>
      <a
        class="relative block rounded bg-transparent px-3 py-1.5 text-lg text-neutral-600 transition-all duration-300 hover:bg-neutral-100 "
        href="#"
        aria-label="Next"
        ><span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</template>
<style scoped lang="scss">
.reviews-container {
  width: 95%;
  margin: auto;
  margin-top: auto;
  margin-bottom: auto;
  margin-top: 5rem;
  margin-bottom: 8rem;
  .header {
    font-size: 1.6rem;
    font-weight: 600;
  }
}
.size {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 1rem;
  text-align: center;
  // width: 100%;
  border-right: 2px solid #999;

  .pic-container {
    position: relative;
    display: flex;
    justify-content: flex-start;
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
        width: 6rem;
        border-radius: 200px;
        height: 6rem;
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

  h3 {
    color: #4838ab;
    margin-right: 10px;
    letter-spacing: 1px;
    font-size: 1.2rem;
    font-weight: 600;
  }

  h4 {
    color: #444;
    margin-right: 10px;
    letter-spacing: 0.7px;
    font-size: 0.8rem;
    font-weight: 500;
  }
}
.content-container {
  gap: 1.4rem;
  padding-left: 1.5rem;
  padding-right: 1.5rem;
  width: 75%;
  .content {
    background: none;
  }
  .ratings {
    display: grid;
    grid-template-columns: 1fr 1fr;
    row-gap: 1rem;
    justify-items: left;
    .r-item {
      gap: 1.2rem;
      width: 18rem;
      justify-content: space-between;
    }
    .r-item:first-child {
      grid-column: 1/3;
    }
  }
}
.user-info {
  width: 25%;
}

.review-container {
  margin: 1.5rem 0.5rem;
  border: 1px solid #fff;
  border-radius: 30px;
  padding: 1.5rem 0.5rem;

  box-shadow: 0 2px 15px #351d62;
  background-color: #ffffffbd;
}
.review-container:first-child {
  margin-top: 3rem;
}
.pagination{
  margin-top: -3rem;
    margin-bottom: 6rem;
}
</style>