<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <title>Auction</title>
    <link rel="stylesheet" href="/assets/vue/css/loading.css">

    
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
<link rel="stylesheet" href="https://unpkg.com/beerslider/dist/BeerSlider.css">
{{-- <script src="https://unpkg.com/feather-icons"></script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
   <div id="load" class="load-container">
    <div  class="loader-wrapper">
		<div class="circle"></div>
		<div class="circle"></div>
		<div class="circle"></div>
		<div class="shadow"></div>
		<div class="shadow"></div>
		<div class="shadow"></div>
	</div>
</div>
    <div id="app">

    </div>
   
    <script src="/assets/vue/js/loading.js"></script>
    
    <script src="https://unpkg.com/beerslider/dist/BeerSlider.js"></script> 
 <script>
	if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
window.onmousewheel = document.onmousewheel = wheel;

function wheel(event) {
    var delta = 0;
    if (event.wheelDelta) delta = event.wheelDelta / 120;
    else if (event.detail) delta = -event.detail / 3;

    handle(delta);
    if (event.preventDefault) event.preventDefault();
    event.returnValue = false;
}

function handle(delta) {
    var time = 400;
	var distance = 50;
    
    $('html, body').stop().animate({
        scrollTop: $(window).scrollTop() - (distance * delta)
    }, time );
}
	</script>
</body>

</html>
