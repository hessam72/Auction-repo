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

import auth from "../pages/auth/login_singup.vue";

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
            // meta: { isGuest: true },
            children: [{
                    path: "",
                    name: "profile",
                    component: profile,
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
    
    next();
});

export default router;