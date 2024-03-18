<template>
    <!-- <single-nav></single-nav> -->
    <div class="container">
        <div class="icon-container">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.1"
                width="256"
                height="256"
                viewBox="0 0 256 256"
                xml:space="preserve"
            >
                <defs></defs>
                <g
                    style="
                        stroke: none;
                        stroke-width: 0;
                        stroke-dasharray: none;
                        stroke-linecap: butt;
                        stroke-linejoin: miter;
                        stroke-miterlimit: 10;
                        fill: none;
                        fill-rule: nonzero;
                        opacity: 1;
                    "
                    transform="translate(45.02412451361867 45.024124513618645) scale(1.83 1.83)"
                >
                    <path
                        d="M 45 88.11 h 40.852 c 3.114 0 5.114 -3.307 3.669 -6.065 L 48.669 4.109 c -1.551 -2.959 -5.786 -2.959 -7.337 0 L 0.479 82.046 c -1.446 2.758 0.555 6.065 3.669 6.065 H 45 z"
                        style="
                            stroke: none;
                            stroke-width: 1;
                            stroke-dasharray: none;
                            stroke-linecap: butt;
                            stroke-linejoin: miter;
                            stroke-miterlimit: 10;
                            fill: rgb(213, 39, 6);
                            fill-rule: nonzero;
                            opacity: 1;
                        "
                        transform=" matrix(1 0 0 1 0 0) "
                        stroke-linecap="round"
                    />
                    <path
                        d="M 45 64.091 L 45 64.091 c -1.554 0 -2.832 -1.223 -2.9 -2.776 l -2.677 -25.83 c -0.243 -3.245 2.323 -6.011 5.577 -6.011 h 0 c 3.254 0 5.821 2.767 5.577 6.011 L 47.9 61.315 C 47.832 62.867 46.554 64.091 45 64.091 z"
                        style="
                            stroke: none;
                            stroke-width: 1;
                            stroke-dasharray: none;
                            stroke-linecap: butt;
                            stroke-linejoin: miter;
                            stroke-miterlimit: 10;
                            fill: rgb(255, 255, 255);
                            fill-rule: nonzero;
                            opacity: 1;
                        "
                        transform=" matrix(1 0 0 1 0 0) "
                        stroke-linecap="round"
                    />
                    <circle
                        cx="44.995999999999995"
                        cy="74.02600000000001"
                        r="4.626"
                        style="
                            stroke: none;
                            stroke-width: 1;
                            stroke-dasharray: none;
                            stroke-linecap: butt;
                            stroke-linejoin: miter;
                            stroke-miterlimit: 10;
                            fill: rgb(255, 255, 255);
                            fill-rule: nonzero;
                            opacity: 1;
                        "
                        transform="  matrix(1 0 0 1 0 0) "
                    />
                </g>
            </svg>
        </div>
        <div class="content">
            <div class="wrapper-1">
                <div class="wrapper-2">
                    <h1>UnSuccessfull</h1>

                    <p>Your Purchase was unsuccessfull</p>

                    <p>you can go back and try again</p>

                    <button @click="redirect" class="go-home">go back</button>
                </div>
            </div>
        </div>
    </div>
    <link
        href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro"
        rel="stylesheet"
    />
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import singleNav from "../../components/global/singleNav.vue";
export default {
    data() {
        return {};
    },
    methods: {},
    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken", "user"]),
    },
    created(){
        //update transaction record


        //then based on payment type { 
//      1=> add bid amount to user wallet
// 2=> update shiped product status table 
        // }
    },
    components: {
        singleNav,
    },
};
</script>
<style lang="scss" scoped>
.container {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.icon-container {
    position: absolute;
    left: 43%;
    top: 16%;
}
* {
    box-sizing: border-box;
    /* outline:1px solid ;*/
}
body {
    background: #ffffff;
    background: linear-gradient(to bottom, #ffffff 0%, #e1e8ed 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e1e8ed',GradientType=0 );
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.wrapper-1 {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
}
.wrapper-2 {
    padding: 30px;
    text-align: center;
}
h1 {
    font-family: "Kaushan Script", cursive;
    font-size: 4em;
    letter-spacing: 3px;
    color: #a31d03;
    margin: 0;
    margin-bottom: 20px;
}
.wrapper-2 p {
    margin: 0;
    font-size: 1.3em;
    color: #333;
    font-family: "Source Sans Pro", sans-serif;
    letter-spacing: 1px;
}
.go-home {
    color: #fff;
    background: #5892ff;
    border: none;
    padding: 10px 50px;
    margin: 30px 0;
    border-radius: 30px;
    text-transform: capitalize;
    box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
}
.footer-like {
    margin-top: auto;
    background: #d7e6fe;
    padding: 6px;
    text-align: center;
}
.footer-like p {
    margin: 0;
    padding: 4px;
    color: #5892ff;
    font-family: "Source Sans Pro", sans-serif;
    letter-spacing: 1px;
}
.footer-like p a {
    text-decoration: none;
    color: #5892ff;
    font-weight: 600;
}

@media (min-width: 360px) {
    h1 {
        font-size: 4.5em;
    }
    .go-home {
        margin-bottom: 20px;
    }
}

@media (min-width: 600px) {
    .content {
        max-width: 1000px;
        margin: 0 auto;
    }
    .wrapper-1 {
        height: initial;
        max-width: 620px;
        margin: 0 auto;
        margin-top: 50px;
        box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
    }
}
</style>
