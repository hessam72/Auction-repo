export function init_sticky_nav() {
    console.log('ddd');
    let menu = document.getElementById("menu");
    let offset = menu.offsetHeight;
    document.onscroll = function() {
        console.log('scrowll')
        if (window.scrollY > offset + 400) {
            menu.classList.add("sticky");
            menu.classList.remove("temp-sticky");
        } else if (window.scrollY < offset + 270) {
            menu.classList.remove("sticky");
            menu.classList.add("temp-sticky");
        }
    };
    window.onscroll = function() {
        console.log('scrowll')
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
    document.onscroll = function() {

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

export function init_sticky_up_button() {

    let item = document.getElementById("up_btn");

    let offset = item.offsetHeight;

    document.onscroll = function() {

        if (window.scrollY > offset + 360) {

            item.classList.remove("hidden");
        } else if (window.scrollY < offset + 270) {
            // alert('elsi')
            item.classList.add("hidden");
        }
    };
}