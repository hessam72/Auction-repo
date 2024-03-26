import { createRouter, createWebHistory } from "vue-router";
import store from "../store/index.js";

import homePage from "../pages/public/homePage/index.vue";
import AuctionList from "../pages/public/auction/auctionList.vue";
import all_auctions_test from "../pages/public/auction/all.vue";
import help from "../pages/public/help/index.vue";
import AuctionIndex from "../pages/public/auction/AuctionIndex.vue";
import AuctionIndex_test from "../pages/public/auction/index.vue";
import winners from "../pages/public/winners/index.vue";
import UserIndex from "../pages/user/index.vue";
import bookmarks from "../pages/user/bookmarks.vue";
import challenges from "../pages/user/challenges.vue";
import support from "../pages/user/support.vue";
import buy_it_now from "../pages/user/buy_it_now.vue";
import wins_and_shipping from "../pages/user/wins&shipping.vue";
import profile from "../pages/user/profile.vue";
import bidPackages from "../pages/user/bid_packages.vue";

import auth from "../pages/auth/login_singup.vue";

import success_payment from "../pages/payment/success.vue";
import fail_payment from "../pages/payment/fail.vue";
import partially_paid from "../pages/payment/partially_paid.vue";

const router = createRouter({
    history: createWebHistory(),

    routes: [
        // public routes

        {
            path: "/vue/v1/success_payment",
            name: "success_payment",
            component: success_payment,
        },
        {
            path: "/vue/v1/fail_payment",
            name: "fail_payment",
            component: fail_payment,
        },
        {
            path: "/vue/v1/partially_paid",
            name: "partially_paid",
            component: partially_paid,
        },
        {
            path: "/vue/v1/auctions",
            name: "auctions",
            component: AuctionList,
            // meta: { isGuest: true },
        },
        {
            path: "/vue/v1/auctions_test",
            name: "all_auctions_test",
            component: all_auctions_test,
            // meta: { isGuest: true },
        },
        {
            path: "/vue/v1/auction/:id",
            name: "auction-index",
            component: AuctionIndex,
            // meta: { isGuest: true },
        },
        {
            path: "/vue/v1/auction_test/:id",
            name: "auction-index_test",
            component: AuctionIndex_test,
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
            children: [
                {
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
                    path: "bid_packages",
                    name: "bid_packages",
                    component: bidPackages,
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
            meta: { isGuest: true },
        },
    ],
    scrollBehavior(to, from, savedPosition) {
        // always scroll to top
        return { top: 0 };
    },
});
// sessionStorage.clear();

router.beforeEach(function (to, from, next) {
    // save visitor

    const body = {
        url: to.fullPath,
    };
    axios({
        method: "post",
        url: "http://localhost:8000/api/save_visit",
        data: body,
    })
        .then((response) => {
            //    console.log(response)
        })
        .catch((error) => {
            console.log(error);
        });



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
        if (store.getters.UserAuthToken === null) {
            next();
            return;
        } else if (store.getters.UserAuthToken != null) {
            //redirect to user profile
            next({ name: "user-index" });
            return;
        }
    }

    next();
});

export default router;
