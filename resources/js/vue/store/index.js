import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";


import authentication from "./modules/auth/index.js";
import user from "./modules/user/index.js";
import auctions from "./modules/auctions/index.js";
import biddingQueues from "./modules/biddingQueue/index.js";

const store = createStore({
    modules: {
        authentication,
        user,
        auctions,
        biddingQueues,
    },
    plugins: [
        createPersistedState({
            paths: ["authentication", "user", "auctions", "biddingQueues"],
            storage: window.sessionStorage,
        }),
        // createMutationsSharer({ predicate: ["setSingleAuction"] }),
        // createMultiTabState(),
    ],
    state() {
        return {
            //data
            baseUrl: "http://localhost:8000/api/",
        };
    },
    mutations: {},

    actions: {
        //can have same name as mutations
    },
    getters: {
        baseUrl(state) {
            return state.baseUrl; // if needed to use getters
        },
    },
});

export default store;