export function generatePaymentLink(
    price,
    description,
    pay_url,
    pay_key,
    redirect_path = "/"
) {
    // generate payment link
    // generate order_id
    // dec2hex :: Integer -> String
    // i.e. 0-255 -> '00'-'ff'
    function dec2hex(dec) {
        return dec.toString(16).padStart(2, "0");
    }

    // generateId :: Integer -> String
    function generateId(len) {
        var arr = new Uint8Array((len || 40) / 2);
        window.crypto.getRandomValues(arr);
        return Array.from(arr, dec2hex).join("");
    }

    const order_id = generateId(10);

    // generate link

    var create_pay_link_body = {
        price_amount: price,
        price_currency: "usd",
        order_id: order_id, // random generated id for tracking paymennt from provider
        order_description: description,
        ipn_callback_url: "http://localhost:8000/vue/v1/?order_id="+order_id+"redirect=" + redirect_path,
        success_url:
            "http://localhost:8000/vue/v1/success_payment?order_id="+order_id+"&redirect=" +
            redirect_path,
        cancel_url:
            "http://localhost:8000/vue/v1/fail_payment?order_id="+order_id+"redirect=" +
            redirect_path,
        partially_paid_url:
            "http://localhost:8000/vue/v1/partially_paid?order_id="+order_id+"redirect=" +
            redirect_path,
        is_fixed_rate: true,
        is_fee_paid_by_user: true,
    };
    let config = {
        "x-api-key": pay_key,
        "Content-Type": "application/json",
    };
    var url = pay_url + "invoice";
    return new Promise(function (resolve, reject) {
        axios({
            method: "post",
            url: url,
            data: create_pay_link_body,
            headers: config,
            // withCredentials:false,
        })
            .then((response) => {
                resolve(response.data); 
            })
            .catch((error) => {
                console.log("error");
                console.log(error);
                reject(error); 
            })
            .finally(() => {});
    });
    // redirect user to link
}
function loginToPayment() {
    const body = {
        email: "tahamidev@gmail.com",
        password: "Seyed123",
    };
    let config = {
        "Content-Type": "application/json",
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Methods": "GET,PUT,POST,DELETE,PATCH,OPTIONS",
    };

    axios({
        method: "post",
        url: "https://api.nowpayments.io/v1/auth",
        data: body,
        headers: config,
    })
        // .get(this.baseUrl + this.userUrl, body , config)
        .then((response) => {
            console.log("login response");
            console.log(response);
            // update user avatar
        })
        .catch((error) => {
            console.log("error");
            console.log(error);
        })
        .finally(() => {});
}
