export async function axGet(url = "",

    headers = { Accept: "application/json" }) {
    await axios
        .get(url, {
            headers: { headers }
        })
        .then(function(response) {

            return response;
        })
        .catch(function(error) {
            console.log(error);
        })
        .finally(function() {
            // always executed
        });
}