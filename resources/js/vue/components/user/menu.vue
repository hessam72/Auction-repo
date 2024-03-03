<template>

  <div>
  <OnClickOutside @trigger="close('outside')">
    <div id="menu" class="search-section-container temp-sticky">
      <div class="filter-container">
        <nav id="sidenav-6" class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden 
          bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] 
          data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800" data-te-sidenav-init
          data-te-sidenav-hidden="false" data-te-sidenav-accordion="true">
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li class="relative">
              <a class="filter-header flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                data-te-sidenav-link-ref>
                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                  <ion-icon style="color: #333;" name="home"></ion-icon>
                </span>
                <span style="color: #333;">Menu</span>
              </a>
            </li>
          </ul>
          <hr class="my-4" />
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <router-link @click="close('outside')" :to="{name:'profile'}">
                <span>
                
                <ion-icon name="home"></ion-icon>
                <p class="caption">Profile</p>
                <ion-icon name="return-right"></ion-icon>
             
                </span> 
              </router-link>
              </div>
             
            </li>
          </ul> <hr class="my-4" />
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <router-link @click="close('outside')" :to="{name:'challenges'}">
                <span>
                <ion-icon name="gift"></ion-icon>
                <p class="caption">Challenges</p>
                <ion-icon name="return-right"></ion-icon>
                </span>
                </router-link>
              </div>
             
            </li>
          </ul> <hr class="my-4" />
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <span>
                  <router-link @click="close('outside')" :to="{name:'bookmarks'}">
                  <ion-icon name="bookmark"></ion-icon>
                                  <p class="caption">Bookmarks</p>
                <ion-icon name="return-right"></ion-icon>
                </router-link>
                </span>
              </div>
             
            </li>
          </ul> <hr class="my-4" />
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <span>
                  <ion-icon name="cash"></ion-icon>
                                  <p class="caption">Buy Bids</p>
                <ion-icon name="return-right"></ion-icon>
                </span>
              </div>
             
            </li>
          </ul> <hr class="my-4" />
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <span>
                  <ion-icon name="trophy"></ion-icon>
                                  <p class="caption">Unpaid Wins</p>
                <ion-icon name="return-right"></ion-icon>
                </span>
              </div>
             
            </li>
          </ul> <hr class="my-4" />
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <span>
                  <ion-icon name="cart"></ion-icon>
                <p class="caption">Buy It Now</p>
                <ion-icon name="return-right"></ion-icon>
                </span>
              </div>
             
            </li>
          </ul> <hr class="my-4" />
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <span>
                  <ion-icon name="filing"></ion-icon>
                <p class="caption">Bidding History</p>
                <ion-icon name="return-right"></ion-icon>
                </span>
              </div>
             
            </li>
          </ul> <hr class="my-4" />
        
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <span>
                  <ion-icon name="card"></ion-icon>
                <p class="caption">Transactions</p>
                <ion-icon name="return-right"></ion-icon>
                </span>
              </div>
             
            </li>
          </ul> <hr class="my-4" />
          <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
            <li  class="relative text-center">
              <div class=" custom-btn btn-7 flex items-center justify-between">
                <span>
                  <ion-icon name="help-circle"></ion-icon>
                <p class="caption">Support</p>
                <ion-icon name="return-right"></ion-icon>
                </span>
              </div>
             
            </li>
          </ul> 










       

        </nav>
        <!-- Sidenav -->

        <!-- Toggler -->
        <div class="flex items-center justify-center">
        <button style="background-color: #372065;"
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
        <div class="user-section-title">
        <h2>{{page_title  }}Dashboard</h2>
      </div>
    </div>
      </div>
      
      <div class="bid-container flex  justify-center items-center gap-2">
        <ion-icon name="cash"></ion-icon>
        <p>127 bids</p>
      </div>
    </div>
  </OnClickOutside>
  <hr class="seperator" />
</div>
</template>

<script setup>
import { onMounted } from "vue";
import { Select, initTE } from "tw-elements";
import { Sidenav } from "tw-elements";
import { OnClickOutside } from "@vueuse/components";
import { init_sticky_nav } from "@/modules/utilities/sticky.js";

function close() {
  document.getElementById("sidenav-6").style.transform = "translateX(-100%)";
}

onMounted(() => {


  // sticky filters
  init_sticky_nav();
  // close nav on click outside

  initTE({ Select });
  initTE({ Sidenav });

  
});
</script>

<script>
export default {
  props:["page_title" , "x"],
  data() {
    return {
      min: 1,
      max: 100,
    
    };
  },
  mounted() { 
  //  alert(this.page_title)
   console.log(this.page_title)
  },
 
  methods: {
    open_filters() {
      // document.getElementById('backdrop').style.display = "block";
    },
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
.user-section-title{
  font-size: 1.5rem;
    font-weight: 600;
    margin-left: 2rem;
    color: #372065;

}


.bid-container {
  font-size: 1.7rem;
  font-weight: 400;
  color: #fff;
 

}
.custom-btn {
  width: 90%;
    color: #fff;
    border-radius: 5px;
    padding: 10px 25px;
    font-family: "Lato", sans-serif;
    font-weight: 500;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, 0.5), 7px 7px 20px 0px rgba(0, 0, 0, 0.1), 4px 4px 5px 0px rgba(0, 0, 0, 0.1);
    outline: none;

    a{
      display: flex;
      width: 100%;
    text-align: center;
    justify-content: space-around;
    align-items: center;
    }
}

/* 7 */
.btn-7 {
  // background: linear-gradient(0deg, #8b58ffa0 0%, rgba(45,20,89,0.8744091386554622) 100%);
    line-height: 42px;
  padding: 0;
  border: none;
  border-radius: 10px;
  background: #806cb24a;
    color: #444;
}
.btn-7 span {
  position: relative;
    display: flex;
    width: 100%;
    height: 100%;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 0.5rem;
    font-size: 1.5rem;
    border-radius: 10px;
    ion-icon{
     font-size: 2rem;
    }
}
.btn-7:before,
.btn-7:after {
  position: absolute;
  content: "";
  right: 0;
  bottom: 0;
  background: #8b58ffa0;
  box-shadow:
   -7px -7px 20px 0px rgba(255,255,255,.9),
   -4px -4px 5px 0px rgba(255,255,255,.9),
   7px 7px 20px 0px rgba(0,0,0,.2),
   4px 4px 5px 0px rgba(0,0,0,.3);
  transition: all 0.3s ease;
}
.btn-7:before{
   height: 0%;
   width: 2px;
}
.btn-7:after {
  width: 0%;
  height: 2px;
}
.btn-7:hover{
  color: #6c43cbf7;
  background: transparent;
}
.btn-7:hover:before {
  height: 100%;
}
.btn-7:hover:after {
  width: 100%;
}
.btn-7 span:before,
.btn-7 span:after {
  position: absolute;
  content: "";
  left: 0;
  top: 0;
  background: #8b58ffa0;
  box-shadow:
   -7px -7px 20px 0px rgba(255,255,255,.9),
   -4px -4px 5px 0px rgba(255,255,255,.9),
   7px 7px 20px 0px rgba(0,0,0,.2),
   4px 4px 5px 0px rgba(0,0,0,.3);
  transition: all 0.3s ease;
}
.btn-7 span:before {
  width: 2px;
  height: 0%;
}
.btn-7 span:after {
  height: 2px;
  width: 0%;
}
.btn-7 span:hover:before {
  height: 100%;
}
.btn-7 span:hover:after {
  width: 100%;
}

.menu-container{
  width: 90%;
    margin: auto;
    padding: 1rem;
    background-color: #242424;
    border-radius: 20px;
    font-size: 1.4rem;
    font-weight: 400;
    color: #fff;
    p{
    margin-left: -40%;
    
  }
  ion-icon{
    font-size: 1.8rem;
  }
}



.backdrop {
  display: none;
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

#sidenav-6 {
  // height: 40rem !important;
  // top: 21.2rem;
  padding-top: 3rem;
  // overflow: scroll;
  transform: translateX(-150%);
  box-shadow: rgb(0, 0, 0) 0px 1px 7px;
  border-right: 4px solid #806cb2;
  background-color: rgb(253 252 255);
  backdrop-filter: blur(2px);
  padding-bottom: .5rem;
  width: 320px !important;
  transition: all 0.7s cubic-bezier(0.53, -0.57, 0.37, 1.44) 0s !important;
}

.filter_item {
  gap: 1rem;
  font-size: 1.3rem;
  color: #333;
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
  background: linear-gradient(94deg, rgba(111, 65, 215, 0.01726628151260501) 0%, rgba(58, 34, 100, 0.8828125) 100%);

}
</style>
