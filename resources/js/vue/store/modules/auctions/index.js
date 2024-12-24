export default {
    state() {
        return {
            auctions: [{
                id: null,
                current_winner_id: null,
                current_price: null,
                timer: null,
                avatar:null,
                status: null,
            }, ],
        };
    },
    //setting state
    mutations: {
        setAuctions(state, data) {
            state.auctions = data;
        },
        addAuction(state, data) {
           

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

          
        },

        setSingleAuction(state, data) {
            
            var index = state.auctions.findIndex(
                (obj) => obj.id === data.id
            );
               
               
            const new_item = {
                id: data.id,
                current_winner_id: data.current_winner_id,
                current_winner_username: data.current_winner_username,
                current_price: data.bid_price,
                status: data.status,
                avatar: data.avatar,
                timer: data.timer, // +10 sec
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
            console.log('inside store auctions...' , state)
            return state.auctions;
        },
        findAuction: (state) => (id) => {
            return state.auctions.find((x) => x.id === id);
        },
    },
};