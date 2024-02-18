export default {
    state() {
        return {
            // one queue for each auction - sorted by date
            BiddingQueues: [
                // {
                // id: null,
                // bid_buddy_id: null,
                // auction_id: null,
                // status: null,
                // },
            ],
        };
    },
    //setting state
    mutations: {
        setBiddingQueues(state, data) {
            state.BiddingQueues = data;
        },

        setSingleBiddingQueue(state, data) {
            try {
                var index = state.BiddingQueues.findIndex(
                    (obj) => obj.auction_id === data.auction_id
                );

                state.BiddingQueues[index] = data;
            } catch (e) {}
        },
        addBiddingQueue(state, data) {
            //replace old bidding queue with new one
            console.log("------------------------------------");
            console.log(state.BiddingQueues);
            if (!data) return;

            if (state.BiddingQueues.length === 0) {
                var x = [data];
                state.BiddingQueues = x;
            } else {
                var index = state.BiddingQueues.findIndex(
                    (obj) => obj.auction_id === data.auction_id
                );
                if (state.BiddingQueues[index]) {
                    state.BiddingQueues[index] = data;
                } else {
                    state.BiddingQueues.push(data);
                }
            }
            console.log(state.BiddingQueues);
        },
    },
    //calling mutations
    actions: {
        setBiddingQueues(context, payload) {
            context.commit("setBiddingQueues", payload);
        },
        setSingleBiddingQueue(context, payload) {
            context.commit("setSingleBiddingQueue", payload);
        },
        addBiddingQueue(context, payload) {
            context.commit("addBiddingQueue", payload);
        },
    },
    // getting states
    getters: {
        BiddingQueues(state) {
            return state.BiddingQueues;
        },
        findBiddingQueue: (state) => (id) => {
            try {
                return state.BiddingQueues.find((x) => x.auction_id === id);
            } catch (error) {
                return null;
            }
        },
    },
};