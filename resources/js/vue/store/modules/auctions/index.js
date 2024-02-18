export default {
    state() {
        return {
            auctions: [{
                id: null,
                current_winner_id: null,
                current_price: null,
                timer: null,
                status: null,
            }, ],
        };
    },
    //setting state
    mutations: {
        setAuctions(state, data) {
            state.auctions = data;

            console.log("state.auction all________final");
            console.log(state.auctions);
        },
        addAuction(state, data) {
            console.log("add ****************");
            console.log(data);
            console.log(state.auctions);

            if (state.auctions[0].id === null) {
                var x = [data];
                state.auctions = x;
            } else {
                var index = state.auctions.findIndex(
                    (obj) => obj.id === data.id
                );
                if (state.auctions[index]) {
                    state.auctions[index] = data;
                } else {
                    state.auctions.push(data);
                }
            }

            console.log("state.auction sing;e________final");
            console.log(state.auctions);
        },

        setSingleAuction(state, data) {
            var index = state.auctions.findIndex(
                (obj) => obj.id === data.data.id
            );
            console.log(state.auctions[index]);
            const new_item = {
                id: data.data.id,
                current_winner_id: data.data.current_winner_id,
                current_price: data.data.bid_price,
                timer: data.data.timer, // +10 sec
            };
            state.auctions[index] = new_item;
        },
    },
    //calling mutations
    actions: {
        setAuctions(context, payload) {
            context.commit("setAuctions", payload);
        },
        setSingleAuction(context, payload) {
            context.commit("setSingleAuction", payload);
        },

        addAuction(context, payload) {
            context.commit("addAuction", payload);
        },
        // SOCKET_test(state, data) {
        //     console.log('inside socket action')
        // },
    },
    // getting states
    getters: {
        storedAuctions(state) {
            return state.auctions;
        },
        findAuction: (state) => (id) => {
            return state.auctions.find((x) => x.id === id);
        },
    },
};