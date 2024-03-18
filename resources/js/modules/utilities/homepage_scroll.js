export function init_home_scroll(){
    $(() => {
        window.onscroll = function () {
            let menu = document.getElementById("site_nav");
            let offset = menu.offsetHeight;
            window.onscroll = function () {
                // if (window.scrollY > offset + 262) {
                if (window.scrollY > offset + 100) {
                    // page scrolled down off the item

                    menu.classList.add("sticky");
                } else if (window.scrollY < offset + 270) {
                    // page scrolled up to init position

                    menu.classList.remove("sticky");
                }
            };
        };
       

        //Click Logo To Scroll To Top
        $("#logo").on("click", () => {
            $("html,body").animate(
                {
                    scrollTop: 0,
                },
                500
            );
        });

        //Smooth Scrolling Using Navigation Menu
        $('a[href*="#"]').on("click", function (e) {
            $("html,body").animate(
                {
                    scrollTop: $($(this).attr("href")).offset().top-50,
                },
                900
            );
            e.preventDefault();
        });

        //Toggle Menu
        $("#menu-toggle").on("click", () => {
            $("#menu-toggle").toggleClass("closeMenu");
            $("ul").toggleClass("showMenu");

            $("li").on("click", () => {
                $("ul").removeClass("showMenu");
                $("#menu-toggle").removeClass("closeMenu");
            });
        });
    });
}