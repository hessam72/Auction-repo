<template>
  

    <header class="w-header">
        <div class="beer-slider">
            <div
                class="pat1"
                data-beer-src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wild-sea.png"
            ></div>
            <div class="beer-reveal">
                <div
                    class="pat2"
                    data-beer-src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wild-sea-grayscale.png"
                ></div>
            </div>
        </div>
        <!-- <h1>
    Befor & After    
  </h1>
  <p>showing how much cost of buying product in original price vs win them in auction</p> -->
    </header>
</template>

<script>
export default {
    components: {},
    mounted() {
        new BeerSlider(document.querySelector(".beer-slider"));
    },
};
</script>

<style lang="scss">
.beer-slider {
    position: absolute;
    width: 100%;
    height: 120%;
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
    // background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wild-sea.png);
    background-image: url(http://localhost:8000/storage/images/befor&after/b&a.png);
    filter: grayscale(1);
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
}
.pat2 {
    // background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wild-sea-grayscale.png);
    background-image: url(http://localhost:8000/storage/images/befor&after/b&a2.png);
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
}

.beer-handle {
    bottom: 0;
    top: auto;
}

h1,
p {
    position: relative;
    z-index: 10;
    margin: 0;
}
h1 {
    font-size: 3rem;
}
a {
    color: inherit;
}

.beer-handle {
    background: hsl(0, 0%, 100%) !important;

    box-shadow: 0 3px 10px #555 !important;
}
</style>
