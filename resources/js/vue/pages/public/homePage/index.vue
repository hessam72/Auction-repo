<template>
    <div class="home-container">
        <nav-bar-section></nav-bar-section>

        <hero-section></hero-section>
        <live-auctions ></live-auctions>
        <reviews-section ></reviews-section>
        <recent-winners ></recent-winners>
        <faq-section ></faq-section>
        <pricing-plans></pricing-plans>
        <fixed-buttons></fixed-buttons>
    </div>
    

</template>

<script>
import heroSection from "../../../components/homepage_sections/hero.vue";
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

            //On Scroll Functionality
            $(window).scroll(() => {
                var windowTop = $(window).scrollTop();
                windowTop > 100 ? $('nav').addClass('navShadow') : $('nav').removeClass('navShadow');
                windowTop > 100 ? $('ul').css('top', '100px') : $('ul').css('top', '160px');
            });

            //Click Logo To Scroll To Top
            $('#logo').on('click', () => {
                $('html,body').animate({
                    scrollTop: 0
                }, 500);
            });

            //Smooth Scrolling Using Navigation Menu
            $('a[href*="#"]').on('click', function (e) {
                $('html,body').animate({
                    scrollTop: $($(this).attr('href')).offset().top - 100
                }, 500);
                e.preventDefault();
            });

            //Toggle Menu
            $('#menu-toggle').on('click', () => {
                $('#menu-toggle').toggleClass('closeMenu');
                $('ul').toggleClass('showMenu');

                $('li').on('click', () => {
                    $('ul').removeClass('showMenu');
                    $('#menu-toggle').removeClass('closeMenu');
                });
            });

        });
    },
    components: {
        heroSection,
        liveAuctions,
        reviewsSection,
        recentWinners,
        faqSection,
        pricingPlans,
        fixedButtons,
        navBarSection
    },
};
</script>

<style lang="scss" scoped>
.home-container {
    background: rgb(177, 194, 219);
    background: linear-gradient(90deg,
            var(--color-secondary-tint-2),
            rgba(232, 232, 232, 1) 41%);
}



</style>
