export function generatePaymentLink() {
    // login to payment to get jwt token
    loginToPayment();
    // generate payment link
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
        "Access-Control-Allow-Methods": "GET,PUT,POST,DELETE,PATCH,OPTIONS"
    };
   
    axios({
        method: "post",
        url: "https://api.nowpayments.io/v1/auth",
        data: body,
        headers:config
    })
        // .get(this.baseUrl + this.userUrl, body , config)
        .then((response) => {
            console.log('login response');
            console.log(response);
            // update user avatar
          
        })
        .catch((error) => {
            console.log("error");
            console.log(error);
        })
        .finally(() => {
          
        });
}
