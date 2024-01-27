import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";

import authentication from "./modules/auth/index.js";
import user from "./modules/user/index.js";


const store = createStore({
    modules: {
        authentication,
        user,
    },
    plugins: [
        createPersistedState({
            paths: ['authentication', 'user'],
            storage: window.sessionStorage,
        }),
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