export default {
    state() {
        return {
            user: {

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
    },
    // getting states
    getters: {
        user(state) {
            return state.user;
        },
    },
};