<template>
    
    <OnClickOutside @trigger="close">
        <div  id="menu" class="search-section-container temp-sticky">

            <div class="filter-container">

                <nav id="sidenav-6" class=" fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden 
                bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] 
                data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800" data-te-sidenav-init
                    data-te-sidenav-hidden="false" data-te-sidenav-accordion="true">

                    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                        <li class="relative">
                            <a class="filter-header flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                data-te-sidenav-link-ref>
                                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                    <ion-icon name="options"></ion-icon>
                                </span>
                                <span>Filters</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="my-4" />
                    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                        <li class="relative">
                            <div class="filter_item category flex flex-col  justify-start">
                                <div class="filter-item-header">
                                    <ion-icon name="filing"></ion-icon>
                                    <p>Category</p>
                                </div>

                                <select class="cat-select" data-te-select-init>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="5">Five</option>
                                    <option value="6">Six</option>
                                    <option value="7">Seven</option>
                                    <option value="8">Eight</option>
                                </select>
                                <label class="cat-label" data-te-select-label-ref>Example label</label>
                            </div>
                        </li>
                    </ul>
                    <hr class="my-4" />
                    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                        <li class="relative">
                            <div class="filter_item range-container flex flex-col  justify-start">
                                <div class="filter-item-header">
                                    <ion-icon name="cash"></ion-icon>
                                    <p>Price range</p>
                                </div>
                                <span class="multi-range">
                                    <input type="range" min="0" max="100" v-model="min" id="lower">
                                    <input type="range" min="0" max="100" v-model="max" id="upper">
                                </span>
                                <div class="range-label">
                                    <p>${{ min }}</p>
                                    <p>${{ max }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr class="my-4" />
                    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                        <li class="relative">
                            <div class="filter_item  flex flex-col  justify-start">
                                <div class="filter-item-header">
                                    <ion-icon name="switch"></ion-icon>
                                    <p>Sort By</p>
                                </div>
                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="radio" name="flexRadioDefault" id="radioDefault01" />
                                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="radioDefault01">
                                        Latest
                                    </label>
                                </div>
                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="radio" name="flexRadioDefault" id="radioDefault01" />
                                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="radioDefault01">
                                        Most Popular
                                    </label>
                                </div>
                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="radio" name="flexRadioDefault" id="radioDefault01" />
                                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="radioDefault01">
                                        Live
                                    </label>
                                </div>
                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="radio" name="flexRadioDefault" id="radioDefault01" />
                                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="radioDefault01">
                                        Starting Soon
                                    </label>
                                </div>

                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Sidenav -->

                <!-- Toggler -->
                <button 
                    class="inline-block rounded bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                    data-te-sidenav-toggle-ref data-te-target="#sidenav-6" aria-controls="#sidenav-6" aria-haspopup="true">
                    <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <!-- Toggler -->
            </div>
            <div class="search-container">
                <input class="search-input" type="text" placeholder="Search in Auctions" />
                <ion-icon name="search"></ion-icon>
            </div>
        </div>
    </OnClickOutside>
    <hr class="seperator" />
</template>
<script setup>
import { onMounted } from "vue";
import { Select, initTE } from "tw-elements";
import { Sidenav } from "tw-elements";
import { OnClickOutside } from '@vueuse/components'
function close() {

    document.getElementById('sidenav-6').style.transform = "translateX(-100%)";
   
}

onMounted(() => {
    // close nav on click outside



    initTE({ Select });
    initTE({ Sidenav });
    // price range selector
    var lowerSlider = document.querySelector('#lower')
    var upperSlider = document.querySelector('#upper')
    var lowerVal = parseInt(lowerSlider.value);
    var upperVal = parseInt(upperSlider.value);

    upperSlider.oninput = function () {
        console.log('lowval')

        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);

        if (upperVal < lowerVal + 4) {
            lowerSlider.value = upperVal - 4;

            if (lowerVal == lowerSlider.min) {
                upperSlider.value = 4;
            }
        }
    };


    lowerSlider.oninput = function () {

        console.log('lowval')
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);

        if (lowerVal > upperVal - 4) {
            upperSlider.value = lowerVal + 4;

            if (upperVal == upperSlider.max) {
                lowerSlider.value = parseInt(upperSlider.max) - 4;
            }

        }
    };


    // sticky filters
    let menu = document.getElementById('menu');
    let offset = menu.offsetHeight;
    window.onscroll = function () {
        // if (window.scrollY > offset + 262) {
        if (window.scrollY > offset + 400) {
            menu.classList.add("sticky");
            menu.classList.remove("temp-sticky");
        } else if (window.scrollY < offset + 270) {
            menu.classList.remove("sticky");
            menu.classList.add("temp-sticky");
        }
    }

});
</script>
<script>
export default {
    data() {
        return {
            min: 1,
            max: 100,
        }
    },
    methods:{
        open_filters(){
            // document.getElementById('backdrop').style.display = "block";
        }
    },
    emits: [],
    props: [],
    watch: {

    }
}
</script>

<style scoped lang="scss">
* {
    transition: all .3s ease;
}
.backdrop{
    display: none;
}
.range-label {
    display: flex;
    justify-content: space-between;
    width: 90%;
    position: absolute;
    top: 4.7rem;
}

.sticky {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
    animation-name: enter_from_top;
    animation-duration: 1s;


    transform: translate(0, 0);
    
}

.temp-sticky {
    position: relative;
    z-index: 99;
}

.seperator {
    color: #666;
    background-color: #bcbcbc;
    height: 2px;
    width: 95%;
    text-align: center;
    margin: auto;
    margin-top: 1rem;
}

.filter-item-header {
    display: flex;
    justify-content: left;
    align-items: center;
    gap: 1rem;

}

.filters-icon {
    font-size: 1.7rem;
}

.filter-header {
    font-size: 1.7rem;
}

.range-container {
    margin-bottom: 6.5rem;
}

input[type=range] {
    box-sizing: border-box;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 12rem;
    margin: 0;
    padding: 0 2px;
    /* Add some L/R padding to ensure box shadow of handle is shown */
    overflow: hidden;
    border: 0;
    border-radius: 1px;
    outline: none;
    background: linear-gradient(grey, grey) no-repeat center;
    /* Use a linear gradient to generate only the 2px height background */
    background-size: 100% 2px;
    pointer-events: none;
    margin-left: 1rem;
}

input[type=range]:active,
input[type=range]:focus {
    outline: none;
}

input[type=range]::-webkit-slider-thumb {
    height: 20px;
    width: 20px;
    border-radius: 28px;
    background-color: #fff;
    position: relative;
    margin: 5px 0;
    /* Add some margin to ensure box shadow is shown */
    cursor: pointer;
    -webkit-appearance: none;
    appearance: none;
    pointer-events: all;
    box-shadow: 0 1px 4px 0.5px rgba(0, 0, 0, 0.25);
}

input[type=range]::-webkit-slider-thumb::before {
    content: ' ';
    display: block;
    position: absolute;
    top: 13px;
    left: 100%;
    width: 2000px;
    height: 2px;
}

.multi-range {

    position: absolute;
    height: 50px;
    left: 0;
    top: 3rem;
}

.multi-range input[type=range] {
    position: absolute;
}

.multi-range input[type=range]:nth-child(1)::-webkit-slider-thumb::before {
    background-color: red;
}

.multi-range input[type=range]:nth-child(2) {
    background: none;
}

.multi-range input[type=range]:nth-child(2)::-webkit-slider-thumb::before {
    background-color: black;
}

#sidenav-6 {
    // height: 40rem !important;
    // top: 21.2rem;
    padding-top: 3rem;
    // overflow: scroll;
    transform: translateX(-150%);
    box-shadow: rgb(0, 0, 0) 0px 1px 7px;
    border-right: 4px solid #806cb2;
   
}



.filter_item {
    gap: 1rem;
    font-size: 1.3rem;
    color: #eee;
    padding: 0 1rem;
}

.cat-label {
    font-size: 1rem;
    color: #333;
}

.cat-select {
    color: #333;
}

.filter-hr {
    width: 100%;
    background-color: #0000009c;
    height: 3px;
}

.search-section-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    padding-right: 3.5rem;
    backdrop-filter: blur(9px);
    box-shadow: 0 2px 10px;
    background-color: #532d9f99;

}

.filter-title {}

.search-container {
    transition: all .3s ease;
    position: relative;

    .search-input {
        width: 30rem;
        border: none;
        border-radius: 30px;
        box-shadow: 0 2px 10px #3333334f;
        padding: 0.8rem 0 0.8rem 1.4rem;
    }

    .search-input::placeholder {
        color: #9c9c9c;
    }

    ion-icon {
        position: absolute;
        right: 1rem;
        font-size: 2.1rem;
        color: #888;
        top: 0.4rem;
    }
}

@keyframes enter_from_top {
    0% {
        top: -10%;
    }

    100% {
        top: 0%;
    }
}
</style>
