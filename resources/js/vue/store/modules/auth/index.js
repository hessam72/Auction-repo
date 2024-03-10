export default {
    state() {
        return {
            UserAuthToken: null,

        };
    },
    //setting state
    mutations: {
        setUserAuthToken(state, payload) {
            //payload can be anything like string or object
            state.UserAuthToken = payload;
        },


    },
    //calling mutations
    actions: {
        loginUser(context, payload) {
            context.commit("setUserAuthToken", payload);
        },
        logoutUser(context) {
            sessionStorage.clear();
            context.commit("setUserAuthToken", null);

        },


    },
    // getting states
    getters: {
        UserAuthToken(state) {
            return state.UserAuthToken;
        },

    },
};