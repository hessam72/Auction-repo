<template>
  <!-- <div class="top">Scroll \/</div> -->
  <Disclosure
    as="nav"
    id="site_nav"
    class="main-nav bg-gray-50"
    v-slot="{ open }"
  >
    <div class="nav-content mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <DisclosureButton
            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
          >
            <span class="absolute -inset-0.5" />
            <span class="sr-only">Open main menu</span>
            <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
            <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
          </DisclosureButton>
        </div>
        <div
          class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
        >
          <div class="flex flex-shrink-0 items-center">
            <router-link
              style="background-color: rgba(255, 255, 255, 0)"
              :to="{ name: 'home' }"
            >
              <img
                class="h-8 w-auto"
                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                alt="Your Company"
              />
            </router-link>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div v-if="is_single_nav" class="flex space-x-4">
              <router-link
                v-for="(item, index) in links"
                :key="item.index"
                :to="{ name: item.route_name }"
                :class="[
                  item.current
                    ? 'bg-gray-900 text-white'
                    : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                  'rounded-md px-3 py-2 text-sm font-medium',
                ]"
                :aria-current="item.current ? 'page' : undefined"
                >{{ item.name }}</router-link
              >
            </div>
            <div v-else class="flex space-x-4">
              <a
                v-for="item in navigation"
                :key="item.name"
                :href="item.href"
                :class="[
                  item.current
                    ? 'bg-gray-900 text-white'
                    : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                  'rounded-md px-3 py-2 text-sm font-medium',
                ]"
                :aria-current="item.current ? 'page' : undefined"
                >{{ item.name }}</a
              >
            </div>
          </div>
        </div>
        <!-- search -->
        <div class="relative hidden sm:ml-6 sm:block">
          <label for="Search" class="sr-only"> Search </label>
          <input
            type="text"
            id="Search"
            placeholder="Search for..."
            class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm bg-slate-50"
          />

          <span
            class="search-label absolute inset-y-0 end-0 grid w-10 place-content-center"
          >
            <button type="button" class="text-gray-600 hover:text-gray-700">
              <span class="sr-only">Search</span>

              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-4 w-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                />
              </svg>
            </button>
          </span>
        </div>
        <div
          class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
        >
          <button
            type="button"
            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
          >
            <span class="absolute -inset-1.5" />
            <span class="sr-only">View notifications</span>
            <BellIcon class="h-6 w-6" aria-hidden="true" />
          </button>

          <!-- Profile dropdown -->
          <Menu as="div" class="relative ml-3">
            <div>
              <MenuButton
                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
              >
                <span class="absolute -inset-1.5" />
                <span class="sr-only">Open user menu</span>
                <img
                  class="h-8 w-8 rounded-full"
                  :src="'/storage/images/user_profiles/150-9.jpg'"
                  alt=""
                />
              </MenuButton>
            </div>
            <transition
              enter-active-class="transition ease-out duration-100"
              enter-from-class="transform opacity-0 scale-95"
              enter-to-class="transform opacity-100 scale-100"
              leave-active-class="transition ease-in duration-75"
              leave-from-class="transform opacity-100 scale-100"
              leave-to-class="transform opacity-0 scale-95"
            >
              <MenuItems
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              >
                <MenuItem as="a">
                  <router-link
                    :to="{ name: 'profile' }"
                    class="'block px-4 py-2 text-sm text-gray-700',"
                    >Dashboard</router-link
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100' : '',
                      'block px-4 py-2 text-sm text-gray-700',
                    ]"
                    >Settings</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    @click="logout"
                    :class="[
                      active ? 'bg-gray-100' : '',
                      'block px-4 py-2 text-sm text-gray-700',
                    ]"
                    >Sign out</a
                  >
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
        </div>
      </div>
    </div>

    <DisclosurePanel class="sm:hidden">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <DisclosureButton
          v-for="item in navigation"
          :key="item.name"
          as="a"
          :href="item.href"
          :class="[
            item.current
              ? 'bg-gray-900 text-white'
              : 'text-gray-300 hover:bg-gray-700 hover:text-white',
            'block rounded-md px-3 py-2 text-base font-medium',
          ]"
          :aria-current="item.current ? 'page' : undefined"
          >{{ item.name }}</DisclosureButton
        >
      </div>
    </DisclosurePanel>
  </Disclosure>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
} from "@headlessui/vue";
import { Bars3Icon, BellIcon, XMarkIcon } from "@heroicons/vue/24/outline";
export default {
  props: {
    is_single_nav: {
      default: false,
    },
  },
  data() {
    return {
      loginUrl: "auth/logout",
      email: null,
      password: null,
      links: [
        {
          name: "Auctions",
          route_name: "auctions",

          current: false,
        },

        {
          name: "Winners",
          route_name: "winners",

          current: false,
        },
        {
          name: "Help",
          route_name: "help",

          current: false,
        },
        {
          name: "Dashboard",
          route_name: "profile",
          current: false,
        },
      ],
      navigation: [
        {
          name: "Auctions",

          href: "#auctions",
          current: false,
        },
        {
          name: "Reviews",

          href: "#reviews",
          current: false,
        },
        {
          name: "Winners",

          href: "#winners",
          current: false,
        },
        { name: "Help", href: "#help", current: false },
        {
          name: "Pricing",

          href: "#pricing",
          current: false,
        },
      ],
    };
  },
  mounted() {
    
    this.sticky_navbar();
  },
  computed: {
    ...mapGetters(["baseUrl"]),
  },
  methods: {
    sticky_navbar() {
      //only sticky on home page
      if(this.$route.name != "home")return;
      // if(this.$route.name)
        //only sticky on home page
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
      
      }
    },
    logout() {
      axios
        .post(this.baseUrl + this.loginUrl, {})
        .then((response) => {
          console.log("logout response");
          console.log(response);
        })
        .catch(function (error) {
          console.log("error");
          console.log(error);
        })
        .finally(function () {
          // always executed
        });
    },
  },
  components: {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Bars3Icon,
    BellIcon,
    XMarkIcon,
  },
};
</script>



<style lang="scss" scoped>
#Search {
  border-radius: 40px;
  width: 20rem;
}

.search-label {
  background-color: var(--color-primary);
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;

  button {
    color: #fff;
  }
}

.main-nav {
  // background: rgb(41,24,76);
  // background: linear-gradient(90deg, rgba(41,24,76,1) 7%, rgba(77,115,173,0.9724089464887518) 100%);
  position: absolute;
  z-index: 30;
  width: 100vw;
  background: none;
 
  padding-top: 1.4rem;
}

.nav-content {
  width: 95%;
}

.router-link-exact-active {
  color: #fff;
  background-color: #4e11ad;
}
</style>
<!-- // sticky nav -->

<style lang="scss" scoped>
.sticky {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
  animation-name: enter_from_top;
  animation-duration: 1s;
  box-shadow: 3px 5px 10px #777;
  transform: translate(0, 0);
  padding-bottom: 1rem;
  z-index: 99999;
  background: linear-gradient(
    90deg,
    var(--color-primary),
    var(--color-secondary)
  );
  
}

.temp-sticky {
  position: relative;
  z-index: 99;
}
</style>
