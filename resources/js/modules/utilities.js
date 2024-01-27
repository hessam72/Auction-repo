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

export function translateAuctionStatus(value) {
    if (value === 1) return 'Active';
    if (value === 0) return 'DeActive';
    if (value === 3) return 'Finished';
    if (value === 100) return 'Open';


    return value;
}

export function convertDateToMilliSeconds(time) {
    // var date = new Date("11/21/1987 16:00:00"); // some mock date
    var date = new Date(time)
    var milliseconds = date.getTime();
    // This will return you the number of milliseconds
    // elapsed from January 1, 1970 
    // if your date is less than that date, the value will be negative
    var now = new Date();
    var nowMili = now.getTime();



    var difference = milliseconds - nowMili;


    return difference;
}

export function dayOfWeek(number) {
    if (number === 0) return "شنبه";
    if (number === 1) return "یکشنبه";
    if (number === 2) return "دوشنبه";
    if (number === 3) return "سه شنبه";
    if (number === 4) return "چهارشنبه";
    if (number === 5) return "پنج شنبه";
    if (number === 6) return "جمعه";
}

export function splitPrice(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

}