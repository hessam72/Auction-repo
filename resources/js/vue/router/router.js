import { createRouter, createWebHistory } from "vue-router";
import store from "../store/index.js";

import homePage from "../pages/public/homePage/index.vue";
import AuctionList from "../pages/public/auction/auctionList.vue";
import help from "../pages/public/help/index.vue";
import AuctionIndex from "../pages/public/auction/AuctionIndex.vue";
import winners from "../pages/public/winners/index.vue";
import UserIndex from "../pages/user/index.vue";
import bookmarks from "../pages/user/bookmarks.vue";
import challenges from "../pages/user/challenges.vue";
import support from "../pages/user/support.vue";
import unpaidWins from "../pages/user/unpaid_wins.vue";
import buy_it_now from "../pages/user/buy_it_now.vue";
import wins_and_shipping from "../pages/user/wins&shipping.vue";
import profile from "../pages/user/profile.vue";

import auth from "../pages/auth/login.vue";

const router = createRouter({
    history: createWebHistory(),
    
    routes: [
        // public routes

        {
            path: "/vue/v1/auctions",
            name: "auctions",
            component: AuctionList,
            // meta: { isGuest: true },
        },
        {
            path: "/vue/v1/auction/:id",
            name: "auction-index",
            component: AuctionIndex,
            // meta: { isGuest: true },
        },
        {
            path: "/vue/v1/help",
            name: "help",
            component: help,
            // meta: { isGuest: true },
        },
        {
            path: "/vue/v1/winners",
            name: "winners",
            component: winners,
            // meta: { isGuest: true },
        },
        {
            path: "/vue/v1/",
            name: "home",
            component: homePage,
            // meta: { isGuest: true },
        },

        {
            path: "/vue/v1/user",
            name: "user-index",
            component: UserIndex,
            meta: { needUserAuth: true },
            children: [{
                    path: "",
                    name: "profile",
                    component: profile,
                    meta: { needUserAuth: true },

                },
                {
                    path: "bookmarks",
                    name: "bookmarks",
                    component: bookmarks,
                },
                {
                    path: "challenges",
                    name: "challenges",
                    component: challenges,
                },
                {
                    path: "buy_it_now",
                    name: "buy_it_now",
                    component: buy_it_now,
                },
                {
                    path: "support",
                    name: "support",
                    component: support,
                },
                {
                    path: "unpaid-wins",
                    name: "unpaidWins",
                    component: unpaidWins,
                },{
                    path: "wins&shipping",
                    name: "wins&shipping",
                    component: wins_and_shipping,
                },
            ],
        },

        //auth routes
        {
            path: "/vue/v1/auth",
            name: "auth",
            component: auth,
            // meta: { isGuest: true },
        },
        // {
        //     path: "/vue/v1/login",
        //     name: "login",
        //     component: loginPage,
        //     // meta: { isGuest: true },
        // },
    ],
    scrollBehavior(to, from, savedPosition) {
        // always scroll to top
        return { top: 0 }
      },
});
// sessionStorage.clear();

router.beforeEach(function(to, from, next) {
    // document.title = translatePageName(to.name);

    // authenticating user
    if (to.meta.needUserAuth && store.getters.UserAuthToken === null) {
        // save url user tried to visit for redirect
        // store.dispatch("setHistoryUrl", {
        //     path: to.fullPath,
        // });
        // this.$router.push({ name: 'login', query: { redirect: to.fullPath } });
        next({ name: "auth", query: { redirect: to.fullPath } });
        return;
    }

   

    //user must not be authenticated
    if (to.meta.isGuest) {
        if (
            store.getters.UserAuthToken === null &&
            store.getters.RoomAuthToken === null
        ) {
            next();
            return;
        } else if (store.getters.UserAuthToken != null) {
            //redirect to user profile
            next({ name: "user-wheelofluck" });
            return;
        } else if (store.getters.RoomAuthToken != null) {
            //redirect to user profile

            next({ name: "collector-booked-plans" });
            return;
        }
    }

    
    next();
});

export default router;