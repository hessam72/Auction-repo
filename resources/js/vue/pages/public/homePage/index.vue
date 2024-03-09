<template>
    <div class="home-container">
        <nav-bar-section :is_single_nav="false"></nav-bar-section>

        <hero-section></hero-section>
        <statictic-count></statictic-count>
        <live-auctions></live-auctions>
        <reviews-section></reviews-section>
        <recent-winners></recent-winners>
        <faq-section></faq-section>
        <pricing-plans></pricing-plans>
        <fixed-buttons></fixed-buttons>
    </div>
</template>

<script>
import heroSection from "../../../components/homepage_sections/hero.vue";
import staticticCount from "../../../components/homepage_sections/statictic_count.vue";
import liveAuctions from "../../../components/homepage_sections/liveAuctions.vue";
import reviewsSection from "../../../components/homepage_sections/reviews.vue";
import recentWinners from "../../../components/homepage_sections/recentWinners.vue";
import faqSection from "../../../components/homepage_sections/faq.vue";
import pricingPlans from "../../../components/homepage_sections/pricingPlans.vue";
import fixedButtons from "../../../components/utilities/fixedButtons.vue";
import navBarSection from "../../../components/global/navbar.vue";

export default {
    mounted() {
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
    },
    watch: {
        $route(to, from) {
            // Put your logic here...
            if (to.name === "home") {
                document.getElementById("site_nav").classList.remove("sticky");
            }
        },
    },
    components: {
        heroSection,
        liveAuctions,
        reviewsSection,
        recentWinners,
        faqSection,
        pricingPlans,
        fixedButtons,
        navBarSection,
        staticticCount,
    },
};
</script>

<style lang="scss" scoped>
.home-container {
    background: rgb(177, 194, 219);
    background: linear-gradient(
        90deg,
        var(--color-secondary-tint-2),
        rgba(232, 232, 232, 1) 41%
    );
}
</style>
