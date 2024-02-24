<template>
  <div class="section-container">
    <h2 class="section-title">
     Latest
      <h2 style="display: inline; color: #6350d7">Wins</h2>
    </h2>

    <div class="reviews-container flex gap-2.5">
      <div class="container w-4/12">
        <div class="card bg-1">
          <div class="imgBx">
            <img :src="'/storage/images/product_images/trans-ps5-2.png'" />
          </div>
          <div class="contentBx">
            <h2>PlayStation 5</h2>
            <div class="size">
              <h3>Winner: Sara Jones</h3>
            </div>
            <div class="color">
              <h3>Original Price: 2000$</h3>
            </div>
            <a href="#"> <h3>Win Price: 112$</h3></a>
          </div>
        </div>
      </div>
      <div class="container w-4/12">
        <div class="card bg-1">
          <div class="imgBx">
            <img :src="'/storage/images/product_images/trans-glasses.png'" />
          </div>
          <div class="contentBx">
            <h2>PlayStation 5</h2>
            <div class="size">
              <h3>Winner: Sara Jones</h3>
            </div>
            <div class="color">
              <h3>Original Price: 2000$</h3>
            </div>
            <a href="#"> <h3>Win Price: 112$</h3></a>
          </div>
        </div>
      </div>
      <div class="container w-4/12">
        <div class="card bg-1">
          <div class="imgBx">
            <img :src="'/storage/images/product_images/trans-macbook-2.png'" />
          </div>
          <div class="contentBx">
            <h2>PlayStation 5</h2>
            <div class="size">
              <h3>Winner: Sara Jones</h3>
            </div>
            <div class="color">
              <h3>Original Price: 2000$</h3>
            </div>
            <a href="#"> <h3>Win Price: 112$</h3></a>
          </div>
        </div>
      </div>
      <div class="container w-4/12">
        <div class="card bg-1">
          <div class="imgBx">
            <img :src="'/storage/images/product_images/trans-iphone-2.png'" />
          </div>
          <div class="contentBx">
            <h2>PlayStation 5</h2>
            <div class="size">
              <h3>Winner: Sara Jones</h3>
            </div>
            <div class="color">
              <h3>Original Price: 2000$</h3>
            </div>
            <a href="#"> <h3>Win Price: 112$</h3></a>
          </div>
        </div>
      </div>
    </div>
   
  </div>
  <div class="more-container">
      <button class="more-btn">See More</button>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
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
  background: rgb(42,26,78);
background: linear-gradient(90deg, rgba(42,26,78,0.9471988624551383) 2%, rgba(76,113,171,0.7847338764607406) 95%);
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
  top: 40%;
  left: 0%;
  font-size: 9em;
  font-weight: 800;
  font-style: italic;
  color: rgba(176, 176, 176, 0.11);
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
}

.container .card:hover .contentBx .color {
  opacity: 1;
  visibility: visible;
  transition-delay: 0.6s;
}

.container .card .contentBx .size h3,
.container .card .contentBx .color h3 {
  color: #fff;
  font-weight: 300;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 2px;
  margin-right: 10px;
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
  background-color: #ffffffeb;
}

</style>