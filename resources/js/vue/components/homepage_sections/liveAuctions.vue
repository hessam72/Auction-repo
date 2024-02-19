<template>
  <div class="container w-full h-full">
  <h2 class="title">Live Auctions</h2>
  <div class="auction-container">
    <div>
        <!-- <img src="/assets/img/backgrounds/iphone-bg.jpg" alt="" /> -->

    </div>    
    <div>45</div>    
    <div>45</div>    
    <div>45</div>    
</div>
  </div>
</template>


<script>
export default {
    
}
</script>

<style lang="scss" scoped>
.container{
    margin-bottom: 2rem;
    padding: 0 5rem;
}
.title{
   text-align:center;
   margin:1.5rem;
   font-size: 2rem;
   color:#222;

}
.auction-container{
    display:flex;
    gap:1rem;
    justify-content: space-between;

    div{
        width:33.333%;
        height:auto;
        background-color:rgb(136, 136, 136);

    }
}
</style>
