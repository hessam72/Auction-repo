<template>
    <div class="home-container">
        <nav-bar-section></nav-bar-section>

        <hero-section></hero-section>
        <live-auctions></live-auctions>
        <reviews-section></reviews-section>
        <recent-winners></recent-winners>
        <faq-section></faq-section>
        <pricing-plans></pricing-plans>
        <fixed-buttons></fixed-buttons>
    </div>
    <header>
        <nav>
            <!-- <div id="brand">
                <div id="logo"></div>
                <div id="word-mark"></div>
            </div> -->
            <div id="menu">
                <div id="menu-toggle">
                    <div id="menu-icon">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
                <ul>
                    <li><a href="#section00"></a></li>
                    <li><a href="#section01"></a></li>
                    <li><a href="#section02"></a></li>
                    <li><a href="#section03"></a></li>
                </ul>
            </div>
        </nav>
        <div id="hero-section">
            <div id="head-line"></div>
        </div>
    </header>
    <section id="section00">
        <div id="heading"></div>
    </section>
    <section id="section01">
        <div id="heading"></div>
    </section>
    <section id="section02">
        <div id="heading"></div>
    </section>
    <section id="section03">
        <div id="heading"></div>
    </section>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

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

/*** Mixins & Default Styles ***/
@mixin object($width, $height, $bg) {
    width: $width;
    height: $height;
    background: $bg;
}

@mixin transPos($top, $right, $bottom, $left, $transX, $transY) {
    position: absolute;
    top: $top;
    left: $left;
    right: $right;
    bottom: $bottom;
    transform: translate($transX, $transY);
}



body {
    overflow-x: hidden;
    overflow-y: scroll;
}

/*** Color Variables ***/
$header-bg: #5661f2;
$nav-bg: #46b2f0;
$pink: #fa6c98;
$aqua: #79edfc;
$accent: #fff;

/*** Centering Hack ***/
@mixin center {
    display: flex;
    justify-content: center;
    align-items: center;
}

/*** Header Styles ***/
header {
    @include object(100vw, 100vh, $header-bg);
    display: flex;
}

/*** Navigation Styles ***/
nav {
    @include object(100vw, 160px, $nav-bg);
    display: grid;
    grid-template-columns: 1fr 1fr;
    position: fixed;
    z-index: 10;
    transition: all 0.3s;

    &.navShadow {
        box-shadow: 0 4px 30px -5px rgba(#000, 0.2);
        height: 100px;

        #word-mark {
            opacity: 0;
        }
    }
}

#brand,
#menu,
ul {
    display: flex;
    align-items: center;
}

#brand {
    padding-left: 40px;
}

#logo {
    @include object(55px, 55px, $accent);
    border-radius: 50%;
    cursor: pointer;
}

#word-mark {
    @include object(120px, 20px, $accent);
    border-radius: 90px;
    margin-left: 20px;
    opacity: 1;
    transition: all 0.3s;
}

/*** Menu Styles ***/
#menu {
    justify-content: flex-end;
    padding-right: 40px;
}

li {
    margin-left: 20px;

    a {
        @include object(80px, 20px, $accent);
        display: block;
        border-radius: 90px;
    }
}

#menu-toggle {
    @include object(55px, 55px, darken($nav-bg, 5%));
    @include center;
    border-radius: 50%;
    cursor: pointer;
    display: none;

    &:hover .bar {
        width: 25px;
    }

    &.closeMenu {
        .bar {
            width: 25px;

            &:first-child {
                transform: translateY(7px) rotate(45deg);
            }

            &:nth-child(2) {
                transform: scale(0);
            }

            &:last-child {
                transform: translateY(-7px) rotate(-45deg);
            }
        }
    }
}

.bar {
    @include object(25px, 2px, $accent);
    transition: 0.3s ease-in-out;

    &:nth-child(2) {
        width: 20px;
        margin: 5px 0;
    }

    &:last-child {
        width: 15px;
    }
}

/*** Hero Section Styles ***/
#hero-section {
    @include object(100vw, calc(100vh - 160px), null);
    @include center;
    margin-top: 160px;
}

#head-line {
    @include object(520px, 30px, $accent);
    border-radius: 90px;
    position: relative;

    &:before,
    &:after {
        content: "";
        height: 30px;
        border-radius: 90px;
    }

    &:before {
        @include object(360px, null, $accent);
        @include transPos(-60px, null, null, 50%, -50%, 0);
    }

    &:after {
        @include object(200px, null, $accent);
        @include transPos(null, null, -60px, 50%, -50%, 0);
    }
}

/*** Section Styles ***/
section {
    @include object(100vw, calc(100vh - 100px), null);
    display: flex;
    justify-content: center;

    &:nth-child(odd) {
        background: $pink;
    }

    &:nth-child(even) {
        background: $aqua;
    }
}

#heading {
    @include object(120px, 20px, $accent);
    border-radius: 90px;
    margin-top: 40px;
}

/*** Responsive Menu For Smaller Device ***/

@media screen and (max-width: 767px) {
    #menu-toggle {
        display: flex;
    }

    ul {
        display: inline-block;
        @include object(100vw, 0, $aqua);
        @include transPos(160px, null, null, null, null, null);
        box-shadow: 0 5px 30px -4px rgba(#000, 0.2);
        transition: all 0.3s;

        &.showMenu {
            height: 250px;

            li {
                height: 80px;
                opacity: 1;
                visibility: visible;
            }
        }
    }

    li {
        @include object(50%, 80px, null);
        float: left;
        padding-left: 40px;
        opacity: 0;
        visibility: hidden;
        margin-left: 0;
        transition: all 0.3s 0.1s;

        &:first-child,
        &:nth-child(2) {
            margin-top: 80px;
        }
    }

    #head-line {
        transform: scale(0.8);
    }
}
</style>
