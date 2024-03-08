<template>
    <single-nav></single-nav>
    <bread-crumps v-bind:history="history" :current="current"></bread-crumps>
    <div class="grid grid-cols-3">
        <div class="col-span-2">
            <div
                data-twe-spy="scroll"
                data-twe-target="#scrollspy-smooth"
                data-twe-offset="0"
                class="relative h-48 overflow-auto scroll-smooth"
            >
                <section id="example-1-smooth">
                    <h3 class="pb-3 pt-5 text-xl font-semibold">Section 1</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                </section>
                <section id="example-2-smooth">
                    <h3 class="pb-3 pt-5 text-xl font-semibold">Section 2</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                </section>
                <section id="example-3-smooth">
                    <h3 class="pb-3 pt-5 text-xl font-semibold">Section 3</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                    <section id="example-sub-A-smooth">
                        <h3 class="pb-3 pt-5 text-xl font-semibold">
                            Subsection A
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Labore earum natus vel minima quod error
                            maxime, molestias ut. Fuga dignissimos nisi nemo
                            necessitatibus quisquam obcaecati et reiciendis
                            quaerat accusamus numquam.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Labore earum natus vel minima quod error
                            maxime, molestias ut. Fuga dignissimos nisi nemo
                            necessitatibus quisquam obcaecati et reiciendis
                            quaerat accusamus numquam.
                        </p>
                    </section>
                    <section id="example-sub-B-smooth">
                        <h3 class="pb-3 pt-5 text-xl font-semibold">
                            Subsection B
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Labore earum natus vel minima quod error
                            maxime, molestias ut. Fuga dignissimos nisi nemo
                            necessitatibus quisquam obcaecati et reiciendis
                            quaerat accusamus numquam.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Labore earum natus vel minima quod error
                            maxime, molestias ut. Fuga dignissimos nisi nemo
                            necessitatibus quisquam obcaecati et reiciendis
                            quaerat accusamus numquam.
                        </p>
                    </section>
                </section>
                <section id="example-4-smooth">
                    <h3 class="pb-3 pt-5 text-xl font-semibold">Section 4</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Labore earum natus vel minima quod error maxime,
                        molestias ut. Fuga dignissimos nisi nemo necessitatibus
                        quisquam obcaecati et reiciendis quaerat accusamus
                        numquam.
                    </p>
                </section>
            </div>
        </div>
        <div>
            <!-- Scrollspy -->
            <div id="scrollspy-smooth" class="sticky-top ps-3 text-sm">
                <ul data-twe-nav-list-ref>
                    <li class="py-1">
                        <a
                            data-twe-nav-link-ref
                            data-twe-nav-link-active
                            class="bg-transparent px-[5px] text-[#4b5563] shadow-none transition-all dark:text-neutral-200"
                            href="#example-1-smooth"
                            >Section 1</a
                        >
                    </li>
                    <li class="py-1">
                        <a
                            data-twe-nav-link-ref
                            class="bg-transparent px-[5px] text-[#4b5563] shadow-none transition-all dark:text-neutral-200"
                            href="#example-2-smooth"
                            >Section 2</a
                        >
                    </li>
                    <li class="py-1">
                        <a
                            data-twe-nav-link-ref
                            class="bg-transparent px-[5px] text-[#4b5563] shadow-none transition-all dark:text-neutral-200"
                            href="#example-3-smooth"
                            >Section 3</a
                        >
                        <ul data-twe-nav-list-ref class="ps-3">
                            <li class="py-1">
                                <a
                                    data-twe-nav-link-ref
                                    class="bg-transparent px-[5px] text-[#4b5563] shadow-none transition-all dark:text-neutral-200"
                                    href="#example-sub-A-smooth"
                                    >Subsection A</a
                                >
                            </li>
                            <li>
                                <a
                                    data-twe-nav-link-ref
                                    class="bg-transparent px-[5px] text-[#4b5563] shadow-none transition-all dark:text-neutral-200"
                                    href="#example-sub-B-smooth"
                                    >Subsection B</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="py-1">
                        <a
                            data-twe-nav-link-ref
                            class="bg-transparent px-[5px] text-[#4b5563] shadow-none transition-all dark:text-neutral-200"
                            href="#example-4-smooth"
                            >Section 4</a
                        >
                    </li>
                </ul>
            </div>
            <!-- Scrollspy -->
        </div>
    </div>
</template>

<script>
import singleNav from "../../../components/global/singleNav.vue";
import breadCrumps from "../../../components/global/breadCrumps.vue";

import { init_sticky_help_subjects } from "@/modules/utilities/sticky.js";
// import { ScrollSpy } from "tw-elements";
// import { initTWE } from "tw-elements";
export default {
    data() {
        return {
            history: [
                {
                    name: "Home",
                    url: "/vue/v1",
                },
            ],
            current: "Help",
        };
    },
    components: {
        singleNav,
        breadCrumps,
    },
    mounted() {
        // initTWE({ ScrollSpy });

        // init_sticky_help_subjects();
        // $(function () {

        //     var link = $('a.dot');

        //     // Move to specific section when click on menu link
        //     link.on('click', function (e) {
        //         link.removeClass('active');
        //         var target = $($(this).attr('href'));
        //         $('html, body').animate({
        //             scrollTop: target.offset().top - 150
        //         }, 600);
        //         $(this).addClass('active');
        //         e.preventDefault();
        //     });

        // });

        // $('.js_checkbox').click(function(){

        //     $('.accordion-item-desc').addClass('hide_it');
        // })
    },
};
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
    transition: all 0.3 ease;
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
    transition: all 0.3 ease;
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
    letter-spacing: 0.4px;
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
    letter-spacing: 0.4px;
    transition: all 0.3 ease;
}

.accordion-item input[type="checkbox"] {
    position: absolute;
    height: 0;
    width: 0;
    opacity: 0;
}

.accordion-item input[type="checkbox"]:checked ~ .accordion-item-desc {
    animation: fade-in 1s ease-in-out;
    display: block;
}

.hide_it {
    display: none;
}

.accordion-item
    input[type="checkbox"]:checked
    ~ .accordion-item-title
    .icon:after {
    content: "-";
    font-size: 20px;
}

.accordion-item input[type="checkbox"] ~ .accordion-item-title .icon:after {
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
    // background-color: #281a4b1a;
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
        transition: all 0.5s ease;
        //   transform: translateY(-50%);
    }

    .content {
        width: 70%;
        border-left: 2px solid #33333391;
        margin-bottom: 7rem;

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
                    margin-top: 0.7rem;
                }
            }

            .description {
                p {
                    letter-spacing: 0.6px;
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

        transition: all 0.3s ease;
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
