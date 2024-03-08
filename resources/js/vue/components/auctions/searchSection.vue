<template>
  <OnClickOutside @trigger="close('outside')">
    <div id="menu" class="search-section-container temp-sticky">
      <div class="filter-container">
        <nav
          id="sidenav-6"
          class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800"
          data-te-sidenav-init
          data-te-sidenav-hidden="false"
          data-te-sidenav-accordion="true"
        >
          <ul
            class="relative m-0 list-none px-[0.2rem]"
            data-te-sidenav-menu-ref
          >
            <li class="relative">
              <a
                style="color: #fff"
                class="filter-header flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                data-te-sidenav-link-ref
              >
                <span
                  class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300"
                >
                  <ion-icon name="options"></ion-icon>
                </span>
                <span>Filters</span>
              </a>
            </li>
          </ul>
          <hr class="my-4" />
          <ul
            class="relative m-0 list-none px-[0.2rem]"
            data-te-sidenav-menu-ref
          >
            <li class="relative">
              <div class="filter_item category flex flex-col justify-start">
                <div class="filter-item-header">
                  <ion-icon name="filing"></ion-icon>
                  <p>Category</p>
                </div>
                <div class="select-container">
                  <div class="main">
                    <select name="">
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                    </select>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <hr class="my-4" />
          <ul
            class="relative m-0 list-none px-[0.2rem]"
            data-te-sidenav-menu-ref
          >
            <li class="relative">
              <div
                class="filter_item range-container flex flex-col justify-start"
              >
                <div class="filter-item-header">
                  <ion-icon name="cash"></ion-icon>
                  <p>Price range</p>
                </div>
                <span class="multi-range">
                  <input
                    type="range"
                    min="0"
                    max="100"
                    v-model="min"
                    id="lower"
                  />
                  <input
                    type="range"
                    min="0"
                    max="100"
                    v-model="max"
                    id="upper"
                  />
                </span>
                <div class="range-label">
                  <p>${{ min }}</p>
                  <p>${{ max }}</p>
                </div>
              </div>
            </li>
          </ul>
          <hr class="my-4" />
          <ul
            class="relative m-0 list-none px-[0.2rem]"
            data-te-sidenav-menu-ref
          >
            <li class="relative">
              <div class="filter_item flex flex-col justify-start">
                <div class="filter-item-header">
                  <ion-icon name="switch"></ion-icon>
                  <p>Sort By</p>
                </div>

                <radio-btn></radio-btn>
              </div>
            </li>
          </ul>

          <ul
            class="filter-btn-container relative m-0 list-none px-[0.2rem]"
            data-te-sidenav-menu-ref
          >
            <button class="filter-btn">Apply Filters</button>
          </ul>
        </nav>
        <!-- Sidenav -->

        <!-- new btn -->
        <button
          class="filter-btn"
          data-te-sidenav-toggle-ref
          data-te-target="#sidenav-6"
          aria-controls="#sidenav-6"
          aria-haspopup="true"
        >
          <span class="filter-icon">
            <svg viewBox="0 0 175 80" width="40" height="40">
              <rect width="80" height="15" fill="#333" rx="10"></rect>
              <rect y="30" width="80" height="15" fill="#333" rx="10"></rect>
              <rect y="60" width="80" height="15" fill="#333" rx="10"></rect>
            </svg>
          </span>
          <span class="filter-text">Filter</span>
        </button>
      </div>

      <div class="s-container">
        <input checked="" class="checkbox" type="checkbox" />
        <div class="mainbox">
          <div class="iconContainer">
            <svg
              viewBox="0 0 512 512"
              height="1em"
              xmlns="http://www.w3.org/2000/svg"
              class="search_icon"
            >
              <path
                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
              ></path>
            </svg>
          </div>
          <input class="search_input" placeholder="search" type="text" />
        </div>
      </div>
    </div>
  </OnClickOutside>
</template>

<script setup>
import { onMounted } from "vue";
import { Select, initTE } from "tw-elements";
import { Sidenav } from "tw-elements";
import { OnClickOutside } from "@vueuse/components";
import { init_dropdown } from "@/modules/utilities/dropdown.js";
import { init_sticky_nav } from "@/modules/utilities/sticky.js";
import { init_range_selector } from "@/modules/utilities/range_selector.js";

onMounted(() => {
  // close();
  //select dropdown jquery
  init_dropdown();

  // sticky filters
  init_sticky_nav();

  // close nav on click outside

  initTE({ Select });
  initTE({ Sidenav });

  // price range selector
  init_range_selector();
});
</script>

<script>
import radioBtn from "../utilities/radio_btn.vue";
export default {
  data() {
    return {
      min: 1,
      max: 100,
    };
  },
  mounted() {
    console.log(9);
  },
  methods: {
    close() {
      if (this.$route.name != "auctions") return;

      document.getElementById("sidenav-6").style.transform =
        "translateX(-100%)";
    },
    open_filters() {
      // document.getElementById('backdrop').style.display = "block";
    },
  },
  components: {
    radioBtn,
  },
  emits: [],
  props: [],
  watch: {},
};
</script>

<style scoped lang="scss">
* {
  transition: all 0.3s ease;
}

//reactive search

.s-container {
  position: relative;
  box-sizing: border-box;
  width: fit-content;
}

.mainbox {
  position: relative;
  width: 310px;
  height: 50px;
  display: flex;
  flex-direction: row-reverse;
  align-items: center;
  justify-content: space-between;
  border-radius: 160px;
  background-color: rgb(251, 251, 251);
  transition: all 0.3s ease;
  padding: 0.3rem 0.45rem;
}

.checkbox:focus {
  border: none;
  outline: none;
}

.checkbox:checked {
  right: 10px;
}

.checkbox:checked ~ .mainbox {
  width: 50px;
}

.checkbox:checked ~ .mainbox .search_input {
  width: 0;
  height: 0px;
}

.checkbox:checked ~ .mainbox .iconContainer {
  padding-right: 8px;
}

.checkbox {
  box-sizing: border-box;
  width: 30px;
  height: 30px;
  position: absolute;
  right: 17px;
  top: 10px;
  z-index: 9;
  cursor: pointer;
  appearance: none;
  opacity: 0;
}

.search_input {
  box-sizing: border-box;
  height: 100%;
  width: 170px;
  background-color: transparent;
  border: none;
  outline: none;
  padding-bottom: 4px;
  padding-left: 10px;
  font-size: 1em;
  color: rgb(29, 29, 29);
  transition: all 0.3s ease;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}
.search-input:focus {
  // border: 1px solid red !important;
}

.search_input::placeholder {
  color: rgba(31, 31, 31, 0.776);
}

.iconContainer {
  box-sizing: border-box;
  padding-right: 0.4rem;
  width: fit-content;
  transition: all 0.3s ease;
}

.search_icon {
  box-sizing: border-box;
  fill: rgb(26, 26, 26);
  font-size: 1.3em;
}

// **************

.backdrop {
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
  background-color: #372b58d1 !important;
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

input[type="range"] {
  box-sizing: border-box;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 18rem;
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

input[type="range"]:active,
input[type="range"]:focus {
  outline: none;
}

input[type="range"]::-webkit-slider-thumb {
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

input[type="range"]::-webkit-slider-thumb::before {
  content: " ";
  display: block;
  position: absolute;
  top: 13px;
  left: 100%;

  height: 2px;
}

.multi-range {
  position: absolute;
  height: 50px;
  left: 0;
  top: 3rem;
}

.multi-range input[type="range"] {
  position: absolute;
}

.multi-range input[type="range"]:nth-child(1)::-webkit-slider-thumb::before {
  background-color: red;
}

.multi-range input[type="range"]:nth-child(2) {
  background: none;
}

.multi-range input[type="range"]:nth-child(2)::-webkit-slider-thumb::before {
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
  background-color: var(--color-primary);
  backdrop-filter: blur(2px);
  padding-bottom: 0.5rem;
  width: 20% !important;
  height: auto;
  position: fixed;
  transition: all 0.3s linear 0s;
  transform: translateX(0%);
  padding-bottom: 4rem;
  transform: translateX(-100%);
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
  background-color: var(--color-primary-tint-6);
}

.filter-title {
}

.filter-btn-container {
  text-align: center;
  margin-top: 10rem;

  .filter-btn {
    padding: 0.7rem 2.5rem;
    font-size: 1.2rem;
    font-weight: 700;
    background-color: #e8e8e8;
    border-radius: 15px;
    box-shadow: 2px 7px 19px #ac94e9;
    border: 1px solid #ffffff;
    width: auto;
    margin: auto;
  }
}

.search-container {
  transition: all 0.3s ease;
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

.search-input:focus,
.search:focus {
  outline: none !important;
  border: none !important;
}
// filter btn
.filter-btn {
  width: 150px;
  height: 50px;
  border-radius: 5px;
  border: none;
  transition: all 0.5s ease-in-out;
  font-size: 20px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: 600;
  display: flex;
  align-items: center;
  background: #eee;
  color: #333;
}

.filter-btn:hover {
  box-shadow: 0 0 20px 0px #2e2e2e3a;
}

.filter-btn .filter-icon {
  position: absolute;
  height: 40px;
  width: 70px;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.5s;
}

.filter-btn .filter-text {
  transform: translateX(55px);
}

.filter-btn:hover .filter-icon {
  width: 175px;
}

.filter-btn:hover .filter-text {
  transition: all 0.5s;
  opacity: 0;
}

.filter-btn:focus {
  outline: none;
}

.filter-btn:active .filter-icon {
  transform: scale(0.85);
}
</style>
