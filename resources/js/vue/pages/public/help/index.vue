<template>
    <single-nav></single-nav>
    <bread-crumps v-bind:history="history" :current="current"></bread-crumps>
    <div class="help-container">
        <div id="subjects" class="subjects">
            <div class="header">
                <h2>Subjects</h2>
                <hr />
            </div>
            <div class="items flex flex-col justify-center items-center">
                <a data-scroll="home" href="#home" class="dot  subject-title flex justify-center items-center">
                    <h3>Who We Are?</h3>
                    <ion-icon name="bulb"></ion-icon>
                </a>
            </div>
            <div class="items flex flex-col justify-center items-center">
                <a data-scroll="about" href="#about" class="dot subject-title  flex justify-center items-center">
                    <h3>About</h3>
                    <ion-icon name="bulb"></ion-icon>
                </a>
            </div>
            <div class="items flex flex-col justify-center items-center">
                <a data-scroll="services" href="#services" class="dot subject-title flex justify-center items-center">
                    <h3>services?</h3>
                    <ion-icon name="bulb"></ion-icon>
                </a>
            </div>
            <div class="items flex flex-col justify-center items-center">
                <a data-scroll="about" href="#contact" class="dot subject-title  flex justify-center items-center">
                    <h3>Contact Us</h3>
                    <ion-icon name="bulb"></ion-icon>
                </a>
            </div>


        </div>
        <div class="content">
            <div class="header">
                <h2>Help Center</h2>
                <hr />
            </div>
            <div class="content-index flex flex-col">
                <div class="title">
                    <h2>About us</h2>
                    <hr />
                </div>
                <div class="description">

                    <section id="home" class="accordion">
                        <div class="accordion-item">
                            <input type="checkbox" id="accordion1" />
                            <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and
                                why is it
                                important for
                                online businesses?</label>
                            <div class="accordion-item-desc">
                                SEO, or Search Engine Optimization, is the practice of optimizing a
                                website to improve its visibility on search engines like Google. It
                                involves various techniques to enhance a site's ranking in search
                                results. SEO is crucial for online businesses as it helps drive
                                organic traffic, increases visibility, and ultimately leads to higher
                                conversions.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion2" />
                            <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How long does it
                                take to see
                                results from
                                SEO efforts?</label>
                            <div class="accordion-item-desc">
                                The timeline for seeing results from SEO can vary based on several
                                factors, such as the competitiveness of keywords, the current state of
                                the website, and the effectiveness of the SEO strategy. Generally, it
                                may take several weeks to months before noticeable improvements occur.
                                However, long-term commitment to SEO is essential for sustained
                                success.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion3" />
                            <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key
                                components of a
                                successful
                                SEO strategy?</label>
                            <div class="accordion-item-desc">
                                A successful SEO strategy involves various components, including
                                keyword research, on-page optimization, quality content creation, link
                                building, technical SEO, and user experience optimization. These
                                elements work together to improve a website's relevance and authority
                                in the eyes of search engines.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion4" />
                            <label for="accordion4" class="accordion-item-title"><span class="icon"></span>How does mobile
                                optimization impact
                                SEO?</label>
                            <div class="accordion-item-desc">
                                Mobile optimization is crucial for SEO because search engines
                                prioritize mobile-friendly websites. With the increasing use of
                                smartphones, search engines like Google consider mobile responsiveness
                                as a ranking factor. Websites that provide a seamless experience on
                                mobile devices are more likely to rank higher in search results.
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            <div class="content-index flex flex-col">
                <div class="title">
                    <h2>Is it Safe?</h2>
                    <hr />
                </div>
                <div class="description">

                    <section id="about" class="accordion">
                        <div class="accordion-item">
                            <input type="checkbox" id="accordion1" />
                            <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and
                                why is it
                                important for
                                online businesses?</label>
                            <div class="accordion-item-desc">
                                SEO, or Search Engine Optimization, is the practice of optimizing a
                                website to improve its visibility on search engines like Google. It
                                involves various techniques to enhance a site's ranking in search
                                results. SEO is crucial for online businesses as it helps drive
                                organic traffic, increases visibility, and ultimately leads to higher
                                conversions.
                            </div>
                        </div>



                        <div class="accordion-item">
                            <input type="checkbox" id="accordion3" />
                            <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key
                                components of a
                                successful
                                SEO strategy?</label>
                            <div class="accordion-item-desc">
                                A successful SEO strategy involves various components, including
                                keyword research, on-page optimization, quality content creation, link
                                building, technical SEO, and user experience optimization. These
                                elements work together to improve a website's relevance and authority
                                in the eyes of search engines.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion4" />
                            <label for="accordion4" class="accordion-item-title"><span class="icon"></span>How does mobile
                                optimization impact
                                SEO?</label>
                            <div class="accordion-item-desc">
                                Mobile optimization is crucial for SEO because search engines
                                prioritize mobile-friendly websites. With the increasing use of
                                smartphones, search engines like Google consider mobile responsiveness
                                as a ranking factor. Websites that provide a seamless experience on
                                mobile devices are more likely to rank higher in search results.
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            <div class="content-index flex flex-col">
                <div class="title">
                    <h2>Why Us?</h2>
                    <hr />
                </div>
                <div class="description">

                    <section id="services" class="accordion">
                        <div class="accordion-item">
                            <input type="checkbox" id="accordion1" />
                            <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and
                                why is it
                                important for
                                online businesses?</label>
                            <div class="accordion-item-desc">
                                SEO, or Search Engine Optimization, is the practice of optimizing a
                                website to improve its visibility on search engines like Google. It
                                involves various techniques to enhance a site's ranking in search
                                results. SEO is crucial for online businesses as it helps drive
                                organic traffic, increases visibility, and ultimately leads to higher
                                conversions.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion2" />
                            <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How long does it
                                take to see
                                results from
                                SEO efforts?</label>
                            <div class="accordion-item-desc">
                                The timeline for seeing results from SEO can vary based on several
                                factors, such as the competitiveness of keywords, the current state of
                                the website, and the effectiveness of the SEO strategy. Generally, it
                                may take several weeks to months before noticeable improvements occur.
                                However, long-term commitment to SEO is essential for sustained
                                success.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion3" />
                            <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key
                                components of a
                                successful
                                SEO strategy?</label>
                            <div class="accordion-item-desc">
                                A successful SEO strategy involves various components, including
                                keyword research, on-page optimization, quality content creation, link
                                building, technical SEO, and user experience optimization. These
                                elements work together to improve a website's relevance and authority
                                in the eyes of search engines.
                            </div>
                        </div>
                        <div class="accordion-item">
                            <input type="checkbox" id="accordion1" />
                            <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and
                                why is it
                                important for
                                online businesses?</label>
                            <div class="accordion-item-desc">
                                SEO, or Search Engine Optimization, is the practice of optimizing a
                                website to improve its visibility on search engines like Google. It
                                involves various techniques to enhance a site's ranking in search
                                results. SEO is crucial for online businesses as it helps drive
                                organic traffic, increases visibility, and ultimately leads to higher
                                conversions.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion2" />
                            <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How long does it
                                take to see
                                results from
                                SEO efforts?</label>
                            <div class="accordion-item-desc">
                                The timeline for seeing results from SEO can vary based on several
                                factors, such as the competitiveness of keywords, the current state of
                                the website, and the effectiveness of the SEO strategy. Generally, it
                                may take several weeks to months before noticeable improvements occur.
                                However, long-term commitment to SEO is essential for sustained
                                success.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion3" />
                            <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key
                                components of a
                                successful
                                SEO strategy?</label>
                            <div class="accordion-item-desc">
                                A successful SEO strategy involves various components, including
                                keyword research, on-page optimization, quality content creation, link
                                building, technical SEO, and user experience optimization. These
                                elements work together to improve a website's relevance and authority
                                in the eyes of search engines.
                            </div>
                        </div>


                    </section>
                </div>
            </div>
            <div class="content-index flex flex-col">
                <div class="title">
                    <h2>Contact Us</h2>
                    <hr />
                </div>
                <div class="description">

                    <section id="contact" class="accordion">
                        <div class="accordion-item">
                            <input type="checkbox" id="accordion1" />
                            <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and
                                why is it
                                important for
                                online businesses?</label>
                            <div class="accordion-item-desc">
                                SEO, or Search Engine Optimization, is the practice of optimizing a
                                website to improve its visibility on search engines like Google. It
                                involves various techniques to enhance a site's ranking in search
                                results. SEO is crucial for online businesses as it helps drive
                                organic traffic, increases visibility, and ultimately leads to higher
                                conversions.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion2" />
                            <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How long does it
                                take to see
                                results from
                                SEO efforts?</label>
                            <div class="accordion-item-desc">
                                The timeline for seeing results from SEO can vary based on several
                                factors, such as the competitiveness of keywords, the current state of
                                the website, and the effectiveness of the SEO strategy. Generally, it
                                may take several weeks to months before noticeable improvements occur.
                                However, long-term commitment to SEO is essential for sustained
                                success.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion3" />
                            <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key
                                components of a
                                successful
                                SEO strategy?</label>
                            <div class="accordion-item-desc">
                                A successful SEO strategy involves various components, including
                                keyword research, on-page optimization, quality content creation, link
                                building, technical SEO, and user experience optimization. These
                                elements work together to improve a website's relevance and authority
                                in the eyes of search engines.
                            </div>
                        </div>
                        <div class="accordion-item">
                            <input type="checkbox" id="accordion1" />
                            <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and
                                why is it
                                important for
                                online businesses?</label>
                            <div class="accordion-item-desc">
                                SEO, or Search Engine Optimization, is the practice of optimizing a
                                website to improve its visibility on search engines like Google. It
                                involves various techniques to enhance a site's ranking in search
                                results. SEO is crucial for online businesses as it helps drive
                                organic traffic, increases visibility, and ultimately leads to higher
                                conversions.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion2" />
                            <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How long does it
                                take to see
                                results from
                                SEO efforts?</label>
                            <div class="accordion-item-desc">
                                The timeline for seeing results from SEO can vary based on several
                                factors, such as the competitiveness of keywords, the current state of
                                the website, and the effectiveness of the SEO strategy. Generally, it
                                may take several weeks to months before noticeable improvements occur.
                                However, long-term commitment to SEO is essential for sustained
                                success.
                            </div>
                        </div>

                        <div class="accordion-item">
                            <input type="checkbox" id="accordion3" />
                            <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key
                                components of a
                                successful
                                SEO strategy?</label>
                            <div class="accordion-item-desc">
                                A successful SEO strategy involves various components, including
                                keyword research, on-page optimization, quality content creation, link
                                building, technical SEO, and user experience optimization. These
                                elements work together to improve a website's relevance and authority
                                in the eyes of search engines.
                            </div>
                        </div>


                    </section>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import singleNav from "../../../components/global/singleNav.vue";
import breadCrumps from "../../../components/global/breadCrumps.vue";

import { init_sticky_help_subjects } from "@/modules/utilities/sticky.js";


export default {
    data() {
        return {
            history: [
                {
                    name: "Home",
                    url: "/vue/v1"
                },
                {
                    name: "Auctions",
                    url: "/vue/v1/auctions"
                }
            ],
            current: "Help"
        }
    },
    components: {

        singleNav,
        breadCrumps
    },
    mounted() {
        init_sticky_help_subjects();
        $(function () {


            var link = $('a.dot');


            // Move to specific section when click on menu link
            link.on('click', function (e) {
                link.removeClass('active');
                var target = $($(this).attr('href'));
                $('html, body').animate({
                    scrollTop: target.offset().top - 150
                }, 600);
                $(this).addClass('active');
                e.preventDefault();
            });

            // Run the scrNav when scroll
            // $(window).on('scroll', function () {
            //     scrNav();
            // });

            // scrNav function 
            // Change active dot according to the active section in the window
            // function scrNav() {
            //     var sTop = $(window).scrollTop();
            //     $('section').each(function () {

            //         var id = $(this).attr('id'),
            //             offset = $(this).offset().top - 1,
            //             height = $(this).height();
            //         console.log(id)
            //         if (sTop >= offset && sTop < offset + height) {
            //             link.removeClass('active');
            //             $('#navbar').find('[data-scroll="' + id + '"]').addClass('active');
            //         }
            //     });
            // }
            // scrNav();
        });

    },
}
</script>
<style lang="scss" scoped>
.accordion {
    display: flex;
    flex-direction: column;
    font-family: "Sora", sans-serif;
    max-width: 90%;
    min-width: 320px;
    margin: 5px auto;
    padding: 0 50px;

}

.accordion h1 {
    font-size: 32px;
    text-align: center;
}

.accordion-item {
    margin-top: 16px;
    border: 1px solid #fcfcfc;
    border-radius: 6px;
    background: #ffffff;
    box-shadow: 0 4px 8px #80808085;
    border-radius: 30px;
}

.accordion-item .accordion-item-title {
    position: relative;
    margin: 0;
    display: flex;
    width: 100%;
    font-size: 15px;
    cursor: pointer;
    justify-content: space-between;
    flex-direction: row-reverse;
    padding: 14px 20px;
    box-sizing: border-box;
    align-items: center;
    text-align: left;
    letter-spacing: .4px;
}

.accordion-item .accordion-item-desc {
    display: none;
    font-size: 14px;
    line-height: 22px;
    font-weight: 300;
    color: #444;
    border-top: 1px dashed #ddd;
    padding: 10px 20px 20px;
    box-sizing: border-box;
    text-align: left;
    letter-spacing: .4px;
}

.accordion-item input[type="checkbox"] {
    position: absolute;
    height: 0;
    width: 0;
    opacity: 0;
}

.accordion-item input[type="checkbox"]:checked~.accordion-item-desc {
    display: block;
}

.accordion-item input[type="checkbox"]:checked~.accordion-item-title .icon:after {
    content: "-";
    font-size: 20px;
}

.accordion-item input[type="checkbox"]~.accordion-item-title .icon:after {
    content: "+";
    font-size: 20px;
}

.accordion-item:first-child {
    margin-top: 0;
}

.accordion-item .icon {
    margin-left: 14px;
}

@media screen and (max-width: 767px) {
    .accordion {
        padding: 0 16px;
    }

    .accordion h1 {
        font-size: 22px;
    }
}


.sticky {
    position: fixed;
    box-shadow: 0 2px 20px #9f9b9b;
    left: 0.8rem;
    border-radius: 15px;
    top: 0;
    z-index: 99;
    animation-name: enter_from_top;
    animation-duration: 1s;
    transform: translate(0, 0);
    width: 28% !important;
    height: auto !important;
    background-color: #281a4b1a;
}

.help-container {
    display: flex;
    justify-content: right;

    .subjects,
    .content {
        padding: 1rem 1rem;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .subjects {

        width: 30%;
        height: 60%;
        transition: all .5s ease;
        //   transform: translateY(-50%);

    }

    .content {
        width: 70%;
        border-left: 2px solid #33333391;

        .content-index {
            text-align: center;
            margin: 3rem 0;
            text-align: center;
            gap: 2rem;
            // box-shadow: 0 2px 20px #aaa;
            padding: 1rem;
            border-radius: 20px;
            width: 95%;
            margin: auto;
            margin-top: 3rem;
            padding-bottom: 3rem;

            .title {
                h2 {
                    font-size: 1.5rem;
                    font-weight: 600;

                }

                hr {
                    width: 50%;
                    margin: auto;
                    background-color: #333;
                    height: 1px;
                    border: none;
                    margin-top: .7rem;

                }
            }

            .description {
                p {
                    letter-spacing: .6px;
                    line-height: 3rem;
                    font-size: 1.1rem;
                }
            }
        }
    }
}

.header {
    h2 {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    text-align: center;

    hr {
        width: 80%;
        margin: auto;
        background-color: #333;
        height: 2px;
        border: none;
    }
}

.items {
    margin: 2rem 0;

    .subject-title {
        background-color: #eee;
        padding: 1rem 3.5rem;
        border-radius: 50px;
        box-shadow: 0 2px 20px #969595;
        font-size: 1.2rem;
        font-weight: 500;
        cursor: pointer;

        ion-icon {
            padding-left: 0.3rem;
            font-size: 1.5rem;
            color: #555;
        }

        transition: all .3s ease;
    }

    .active {
        background-color: var(--color-primary-tint-6);
        box-shadow: 0 2px 20px #d5d5d5;
        color: #fff;

        ion-icon {
            color: #fff;
        }
    }
}
</style>