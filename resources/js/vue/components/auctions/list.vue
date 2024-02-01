<template>
  <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="border-b mb-5 flex justify-between text-sm">
      <div
        class="text-indigo-600 flex items-center pb-2 pr-2 border-b-2 border-indigo-600 uppercase"
      >
        <a href="#" class="font-semibold inline-block">Auctions</a>
      </div>
      <a href="#">See All</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
      <!-- CARD 1 -->
      <div
        v-for="(item, index) in auctions"
        :key="index"
        class="rounded overflow-hidden shadow-lg flex flex-col"
      >
        <a href="#"></a>
        <div class="relative">
          <router-link :to="{ name: 'auction-index', params: { id: item.id } }">
            <img
              class="w-full"
              :src="'/storage/' + item.product.galleries[0].image"
              alt="Sunset in the mountains"
            />
            <!-- asset('storage/' . $img->image) -->
            <div
              class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"
            ></div>
          </router-link>
          <a href="#!">
            <div
              class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out"
            >
              {{ item.product.category.title }}
            </div>
          </a>
        </div>
        <div class="px-6 py-4 mb-auto">
          <a
            href="#"
            class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2"
            >{{ item.product.title }}</a
          >
          <p class="text-gray-500 text-sm">
            {{ item.product.short_desc }}
          </p>
         
            <p  class="text-gray-500 text-sm mycolor"  :key="findAuctionInStore(item.id).current_price">
              winner id:{{ findAuctionInStore(item.id).current_winner_id }} -
              {{ findAuctionInStore(item.id).current_price }}$
            </p>
        
        </div>
        <div
          class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100"
        >
          <span
            href="#"
            class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center"
          >
            <svg
              height="13px"
              width="13px"
              version="1.1"
              id="Layer_1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              x="0px"
              y="0px"
              viewBox="0 0 512 512"
              style="enable-background: new 0 0 512 512"
              xml:space="preserve"
            >
              <g>
                <g>
                  <path
                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"
                  ></path>
                </g>
              </g>
            </svg>
            <span class="ml-1 mycolor" :key="findAuctionInStore(item.id).timer"
              >start in:
              <vue-countdown
                :time="
                  convertDateToMilliSeconds(findAuctionInStore(item.id).timer)
                "
                v-slot="{ days, hours, minutes, seconds }"
              >
                {{ days }} days, {{ hours }}: {{ minutes }}: {{ seconds }}
              </vue-countdown>
            </span>
          </span>

          <!-- <span
            href="#"
            class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center"
          >
            <svg
              class="h-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
              ></path>
            </svg>
            <span class="ml-1">{{ translateAuctionStatus(item.status) }}</span>
          \
          </span> -->
        </div>
      </div>
    </div>
    <button class="text-gray-500 text-sm" @click="checkChanges()">check</button>
  </div>
  <!-- {{ storedAuctions }} -->
</template>

<script>
import { mapGetters, mapActions } from "vuex";

import {
  translateAuctionStatus,
  convertDateToMilliSeconds,
} from "@/modules/utilities.js";
export default {
  props: {
    auctions: Array,
  },
  computed: {
    ...mapGetters(["baseUrl", "storedAuctions", "findAuction"]),
  },
  created() {
    this.$store.watch(
      (auctions) => {
        return this.$store.state.auctions; // could also put a Getter here
      },
      (newValue, oldValue) => {
        console.log("changed");
      },
      //Optional Deep if you need it
      {
        deep: true,
      }
    );
    // this.unsubscribe = this.$store.subscribe((mutation, state) => {
    //   if (mutation.type === 'setSingleAuction') {
    //     console.log(`subscribe... ` );
    //     // console.log(state);
    //   }
    // });
  },
  beforeDestroy() {
    this.disconnect();
  },
  methods: {
    translateAuctionStatus,
    convertDateToMilliSeconds,

    checkChanges() {
      console.log(this.storedAuctions);
    },
    findAuctionInStore(id) {
      return this.findAuction(id);
    },
  },
  components: {},
};
</script>

<style lang="scss" scoped>
.mycolor {
  animation: mymove 1s;
}
@keyframes mymove {
  from {
    background-color: rgba(238, 255, 0, 0.952);
  }
  to {
    background-color: rgba(255, 255, 0, 0);
  }
}
</style>