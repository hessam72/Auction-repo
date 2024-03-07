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

<body onload="init()">
   
    <div id="load" class="loader-container">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>

    <div id="app">

    </div>
   
    <script src="/assets/vue/js/loading.js"></script>
    
    <script src="https://unpkg.com/beerslider/dist/BeerSlider.js"></script> 
  <script>
    function init(){
	new SmoothScroll(document,120,12)
}

function SmoothScroll(target, speed, smooth) {
	if (target === document)
		target = (document.scrollingElement 
              || document.documentElement 
              || document.body.parentNode 
              || document.body) // cross browser support for document scrolling
      
	var moving = false
	var pos = target.scrollTop
  var frame = target === document.body 
              && document.documentElement 
              ? document.documentElement 
              : target // safari is the new IE
  
	target.addEventListener('mousewheel', scrolled, { passive: false })
	target.addEventListener('DOMMouseScroll', scrolled, { passive: false })

	function scrolled(e) {
		e.preventDefault(); // disable default scrolling

		var delta = normalizeWheelDelta(e)

		pos += -delta * speed
		pos = Math.max(0, Math.min(pos, target.scrollHeight - frame.clientHeight)) // limit scrolling

		if (!moving) update()
	}

	function normalizeWheelDelta(e){
		if(e.detail){
			if(e.wheelDelta)
				return e.wheelDelta/e.detail/40 * (e.detail>0 ? 1 : -1) // Opera
			else
				return -e.detail/3 // Firefox
		}else
			return e.wheelDelta/120 // IE,Safari,Chrome
	}

	function update() {
		moving = true
    
		var delta = (pos - target.scrollTop) / smooth
    
		target.scrollTop += delta
    
		if (Math.abs(delta) > 0.5)
			requestFrame(update)
		else
			moving = false
	}

	var requestFrame = function() { // requestAnimationFrame cross browser
		return (
			window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			window.msRequestAnimationFrame ||
			function(func) {
				window.setTimeout(func, 1000 / 50);
			}
		);
	}()
}
    </script>
</body>

</html>
