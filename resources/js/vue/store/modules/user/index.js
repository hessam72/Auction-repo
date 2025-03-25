export default {
    state() {
        return {
            user: {
                id: 1,
                username: null,
                email: null,
                birth_date: null,
                bio: null,
                profile_pic: null,
                bid_amount: 0,
                city: {},
            },
        };
    },
    //setting state
    mutations: {
        setUser(state, data) {
            state.user = data;
        },
    },
    //calling mutations
    actions: {
        setUser(context, payload) {
            context.commit("setUser", payload);
        },
        clearUser(context) {
            context.commit("setUser", {
                id: 1,
                username: null,
                email: null,
                birth_date: null,
                bio: null,
                profile_pic: null,
                bid_amount: 0,
                city: {},
            });
        },
    },
    // getting states
    getters: {
        user(state) {
            return state.user;
        },
    },
};
