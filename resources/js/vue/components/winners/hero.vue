<template>
    <!-- <div id="slider" class="beer-slider" data-beer-label="before" data-start="75">
        <svg width="100%" height="100%" viewBox="0 0 600 361" preserveAspectRatio="xMidYMid slice"
            data-beer-src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/original-baltic.jpg"
            aria-labelledby="title1" aria-role="img">
            <title id="title1">Baltic seashore - unprocessed</title>

                <image style="filter: grayscale(1);" xlink:href="http://localhost:8000/storage/images/befor&after/b&a.png" x="0" y="0"
                width="100%" height="100%"></image>
        </svg>
        <div class="beer-reveal" data-beer-label="after">
            <svg width="100%" height="100%" viewBox="0 0 600 361" preserveAspectRatio="xMidYMid slice"
                data-beer-src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/warmsphere-baltic.jpg"
                aria-labelledby="title2" aria-role="img">
                <title id="title2">Baltic seashore - warmshphere preset applied</title>
               
                    <image xlink:href="http://localhost:8000/storage/images/befor&after/b&a 2.png" x="0" y="0"
                    width="100%" height="100%"></image>
            </svg>
        </div>
    </div> -->

    <header>
  <div class="beer-slider">
    <div class="pat1" data-beer-src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wild-sea.png"></div>
    <div class="beer-reveal">
      <div class="pat2" data-beer-src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wild-sea-grayscale.png"></div>
    </div>
  </div>
  <h1>
    Befor & After    
  </h1>
  <p>showing how much cost of buying product in original price vs win them in auction</p>
</header>
</template>

<script>

export default {
    components: {

    },
    mounted() {
        new BeerSlider(document.querySelector(".beer-slider"))
    }
};
</script>

<style lang="scss" >
.beer-slider {
  position: absolute;
  width: 100%;
  height: 100%;
}

header {
  position: relative;
  height: 60vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  color: white;
  font-family: Montserrat;
}
.pat1 {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wild-sea.png);
}
.pat2 {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wild-sea-grayscale.png);
}

.beer-handle {
  bottom: 0;
  top: auto;
}

h1, p {
  position: relative;
  z-index: 10;
  margin: 0;
}
h1 {
  font-size: 3rem
}
a {
  color: inherit;
}

.beer-handle{
    background: hsl(0, 0%, 100%) !important;
   
    box-shadow: 0 3px 10px #555 !important;
}
</style>