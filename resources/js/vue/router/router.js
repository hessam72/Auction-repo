import { createRouter, createWebHistory } from "vue-router";
import store from "../store/index.js";

import homePage from "../pages/public/homePage/index.vue"
import AuctionList from "../pages/public/auction/auctionList.vue"
import help from "../pages/public/help/index.vue"
import AuctionIndex from "../pages/public/auction/AuctionIndex.vue"
import winners from "../pages/public/winners/index.vue"
import UserIndex from "../pages/public/guarded/user/index.vue"

import auth from "../pages/auth/login_singup.vue"


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
        },  {
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
        // {
        //     path: "/vue/v1/auction/:id",
        //     name: "auction-index",
        //     component: AuctionIndex,
        //     // meta: { isGuest: true },
        // },
        {
            path: "/vue/v1/user",
            name: "user-index",
            component: UserIndex,
            // meta: { isGuest: true },
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

    ]
});
// sessionStorage.clear();

router.beforeEach(function(to, from, next) {


    next();
});

export default router;