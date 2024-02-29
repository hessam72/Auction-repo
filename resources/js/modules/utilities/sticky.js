export function init_sticky_nav() {
    let menu = document.getElementById("menu");
    let offset = menu.offsetHeight;
    window.onscroll = function() {
        // if (window.scrollY > offset + 262) {
        if (window.scrollY > offset + 400) {
            menu.classList.add("sticky");
            menu.classList.remove("temp-sticky");
        } else if (window.scrollY < offset + 270) {
            menu.classList.remove("sticky");
            menu.classList.add("temp-sticky");
        }
    };
}

export function init_sticky_help_subjects() {
  
    let item = document.getElementById("subjects");
   
    let offset = item.offsetHeight;
    window.onscroll = function() {
      
        if (window.scrollY > offset + 20) {
          
            item.classList.add("sticky");
            // item.classList.remove("temp-sticky");
        } else if (window.scrollY < offset + 270) {
            // alert('elsi')
            item.classList.remove("sticky");
            // item.classList.add("temp-sticky");
        }
    };
}