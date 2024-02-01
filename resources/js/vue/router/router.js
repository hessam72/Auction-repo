import { createRouter, createWebHistory } from "vue-router";
import store from "../store/index.js";

import AuctionList from "../pages/public/auction/all.vue"
import AuctionIndex from "../pages/public/auction/index.vue"
import UserIndex from "../pages/public/guarded/user/index.vue"


const router = createRouter({
    history: createWebHistory(),
    routes: [
        // public routes

        {
            path: "/vue/v1/",
            name: "home",
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
            path: "/vue/v1/user",
            name: "user-index",
            component: UserIndex,
            // meta: { isGuest: true },
        },
    ]
});
// sessionStorage.clear();

router.beforeEach(function(to, from, next) {


    next();
});

export default router;