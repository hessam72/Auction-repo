import store from "../vue/store/index.js";

export async function searchAuctions(data = {}) {

    try {
        var url = store.getters.baseUrl + "auctions/search";
        var headers = { Accept: "application/json" };
        const response = await fetch(url, {
            method: "POST", // *GET, POST, PUT, DELETE, etc.
            headers: headers,
            body: JSON.stringify(data), // body data type must match "Content-Type" header
        });
        if (response.ok) {

            return response; // parses JSON response into native JavaScript objects
        } else {
            const error = {
                status: response.status,
                ok: response.ok,
                statusText: response.statusText,
            };
            throw error;
        }
    } catch (error) {
        throw error;
    }
}