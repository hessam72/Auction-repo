export async function sendPost(
    url = "",
    data = {},
    headers = {}
) {
    // Default options are marked with *

    try {
        const response = await fetch(url, {
            method: "POST", // *GET, POST, PUT, DELETE, etc.

            headers: headers,

            body: JSON.stringify(data), // body data type must match "Content-Type" header
        });
        if (response.ok) {

            // return response.json(); // parses JSON response into native JavaScript objects
            return response // parses JSON response into native JavaScript objects
        } else {
            console.log(response)
            const error = {
                status: response.status,
                ok: response.ok,
                statusText: response.statusText,
            };
            throw error;
        }
    } catch (error) {
        // console.log("inside catch error");
        // console.dir(error);
        throw error;
        // return (error);
    }
}

export async function sendFormData(
    url = "",
    data = {},
    headers = {}
) {
    // Default options are marked with *

    try {
        const response = await fetch(url, {
            method: "POST", // *GET, POST, PUT, DELETE, etc.

            headers: headers,

            body: data, // body data type must match "Content-Type" header
        });
        if (response.ok) {
            console.log(response);
            return response.json(); // parses JSON response into native JavaScript objects
        } else {
            console.log("inside try error");
            console.log(response);

            const error = {
                status: response.status,
                ok: response.ok,
                statusText: response.statusText,
            };
            throw error;
        }
    } catch (error) {
        console.log("inside catch error");
        console.log(error);
        throw error;
        // return (error);
    }
}
export async function updateFormData(
    url = "",
    data = {},
    headers = {}
) {
    // Default options are marked with *

    try {
        const response = await fetch(url, {
            method: "PUT", // *GET, POST, PUT, DELETE, etc.

            headers: headers,

            body: data, // body data type must match "Content-Type" header
        });
        if (response.ok) {
            return response.json(); // parses JSON response into native JavaScript objects
        } else {
            console.log("inside try error");
            console.log(response);

            const error = {
                status: response.status,
                ok: response.ok,
                statusText: response.statusText,
            };
            throw error;
        }
    } catch (error) {
        // console.log("inside catch error");
        // console.dir(error);
        throw error;
        // return (error);
    }
}
export async function sendPut(
    url = "",
    data = {},
    headers = { Accept: "application/json" }
) {
    // Default options are marked with *

    try {
        const response = await fetch(url, {
            method: "PUT", // *GET, POST, PUT, DELETE, etc.

            headers: headers,

            body: JSON.stringify(data), // body data type must match "Content-Type" header
        });
        if (response.ok) {
            return response.json(); // parses JSON response into native JavaScript objects
        } else {
            console.log("inside try error");
            console.log(response);
            throw new Error(error);
        }
    } catch (error) {
        console.log("inside catch error");
        console.log(error);

        throw new Error(error);
    }
}

export async function sendGet(
    url = "",

    headers = { "Content-Type": "application/json" }
) {
    // Default options are marked with *

    try {
        const response = await fetch(url, {
            method: "GET", // *GET, POST, PUT, DELETE, etc.

            headers: headers,

            // body: JSON.stringify(data), // body data type must match "Content-Type" header
        });
        if (response.ok) {
            return response.json(); // parses JSON response into native JavaScript objects
        } else {
            console.log("inside try error");
            // console.log(response.status);
            throw response.status;
        }
    } catch (error) {
        throw error;
    }
}