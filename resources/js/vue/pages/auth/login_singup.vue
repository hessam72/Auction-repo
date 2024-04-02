<template>
    <!-- <nav-bar-section></nav-bar-section> -->
    <div class="auth-container">
        <div class="forms-container">
            <div class="signin-signup">
                <form @submit.prevent="login()" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <ion-icon class="icon" name="person"></ion-icon>
                        <input
                            v-model="login_email"
                            type="email"
                            placeholder="Email"
                            required
                        />
                    </div>
                    <div class="input-field">
                        <ion-icon class="icon" name="key"></ion-icon>
                        <input
                            v-model="login_password"
                            type="password"
                            placeholder="Password"
                        />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                </form>
                <form @submit.prevent="register()" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <ion-icon class="icon" name="person"></ion-icon>
                        <input
                            v-model="username"
                            type="text"
                            placeholder="Username"
                            required
                        />
                    </div>
                    <div class="input-field">
                        <ion-icon class="icon" name="at"></ion-icon>
                        <input
                            v-model="register_email"
                            type="email"
                            placeholder="Email"
                            required
                        />
                    </div>
                    <div class="input-field">
                        <ion-icon class="icon" name="key"></ion-icon>
                        <input
                            v-model="register_password"
                            type="password"
                            placeholder="Password"
                            required
                        />
                    </div>
                    <div class="input-field">
                        <ion-icon class="icon" name="key"></ion-icon>
                        <input
                            type="password"
                            placeholder="Confirm Password"
                            v-model="confirm_pass"
                            id="confirm_password"
                            required
                        />
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="a-content">
                    <h3>New Here ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Veniam repellendus debitis asperiores laudantium,
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img
                    src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png"
                    class="image"
                    alt=""
                />
            </div>
            <div class="panel right-panel">
                <div class="a-content">
                    <h3>Already a Member ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Veniam repellendus debitis asperiores laudantium,
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img
                    src="https://i.ibb.co/nP8H853/Mobile-login-rafiki.png"
                    class="image"
                    alt=""
                />
            </div>
        </div>
    </div>
</template>

<script>
import navBarSection from "../../components/global/navbar.vue";
import { mapGetters, mapActions } from "vuex";
import { useToast } from "vue-toastification";

import { init_login_singup_styles } from "@/modules/utilities/login_singup.js";
export default {
    setup() {
        // Get toast interface
        const toast = useToast();

        return { toast };
    },
    components: {
        navBarSection,
    },
    data() {
        return {
            loginUrl: "auth/login",
            registerUrl: "auth/register",
            username: null,
            login_email: null,
            login_password: null,
            register_email: null,
            register_password: null,
            confirm_pass: null,
        };
    },
    computed: {
        ...mapGetters(["baseUrl"]),
    },
    methods: {
        ...mapActions(["loginUser", "setUser"]),
        redirect() {
            if (this.$route.query.redirect) {
                this.$router.push(this.$route.query.redirect);
            } else {
                this.$router.push({ name: "profile" });
            }
        },
        login() {
            const body = {
                email: this.login_email,
                password: this.login_password,
            };

            axios
                .post(this.baseUrl + this.loginUrl, body)
                .then((response) => {
                    var token = "Bearer " + response.data.token;
                    this.loginUser(token);
                    this.setUser(response.data.user);
                    this.redirect();
                })
                .catch(function (error) {
                    console.log("error");
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
        },
        register() {
            if (this.register_password != this.confirm_pass) {
                var confirm_password =
                    document.getElementById("confirm_password");
                // confirm_password.setCustomValidity();
                this.toast.error("Passwords Don't Match");

                return;
            }
            const body = {
                username: this.username,
                email: this.register_email,
                password: this.register_password,
            };

            axios
                .post(this.baseUrl + this.registerUrl, body)
                .then((response) => {
                    console.log("response");
                    console.log(response);
                    var token = "Bearer " + response.data.token;
                    this.loginUser(token);
                    this.setUser(response.data.user);
                    this.redirect();
                })
                .catch(function (error) {
                    console.log("error");
                    console.log(error);
                    this.toast.error(error.response.data.message);
                })
                .finally(function () {
                    // always executed
                });
        },
    },
    mounted() {
        init_login_singup_styles();
    },
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap");

body,
input {
    font-family: "Montserrat", sans-serif;
}

.auth-container {
    position: relative;
    width: 100%;
    background-color: #fff;
    background: linear-gradient(
        90deg,
        rgb(177, 194, 219) 0%,
        rgb(232, 232, 232) 41%
    );
    min-height: 100vh;
    overflow: hidden;
}

.forms-container {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

.signin-signup {
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    left: 75%;
    width: 50%;
    transition: 1s 0.7s ease-in-out;
    display: grid;
    grid-template-columns: 1fr;
    z-index: 5;
}

form {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0rem 5rem;
    transition: all 0.2s 0.7s;
    overflow: hidden;
    grid-column: 1 / 2;
    grid-row: 1 / 2;
}

form.sign-up-form {
    opacity: 0;
    z-index: 1;
}

form.sign-in-form {
    z-index: 2;
}

.title {
    font-size: 2.2rem;
    color: #444;
    margin-bottom: 10px;
}

.input-field {
    max-width: 380px;
    width: 100%;
    background-color: #f0f0f0;
    margin: 10px 0;
    height: 55px;
    border-radius: 5px;
    display: grid;
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
}

.input-field i {
    text-align: center;
    line-height: 55px;
    color: #acacac;
    transition: 0.5s;
    font-size: 1.1rem;
}

.input-field input {
    background: none;
    outline: none;
    border: none;
    line-height: 1;
    font-weight: 600;
    font-size: 1.1rem;
    color: #333;
}

.input-field input::placeholder {
    color: #aaa;
    font-weight: 500;
}

.btn {
    width: 150px;
    background-color: #372065;
    border: none;
    outline: none;
    height: 49px;
    border-radius: 4px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    margin: 10px 0;
    cursor: pointer;
    transition: 0.5s;
}

.btn {
    color: white;
    width: auto;
    padding: 0.5em 2em;
    font-size: 0.8em;
    border-radius: 0.3em;
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.btn:hover {
    opacity: 0.8;
}

.btn:before {
    content: "";
    position: absolute;
    top: 0;
    width: 100%;
    left: -100%;
    height: 100%;
    background: linear-gradient(
        220deg,
        transparent,
        rgba(200, 200, 200, 0.967),
        transparent
    );
    transition: all 350ms;
}

.btn:hover::before {
    left: 100%;
}

.panels-container {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
}

.auth-container:before {
    content: "";
    position: absolute;
    height: 2000px;
    width: 2000px;
    top: -10%;
    right: 48%;
    transform: translateY(-50%);
    background: rgb(55, 32, 96);
    background: linear-gradient(
        0deg,
        var(--color-primary) 0%,
        rgb(55 32 96 / 64%) 100%
    );
    transition: 1.8s ease-in-out;
    border-radius: 50%;
    z-index: 6;
}

.image {
    width: 100%;
    transition: transform 1.1s ease-in-out;
    transition-delay: 0.4s;
    filter: hue-rotate(217deg);
}

.panel {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: space-around;
    text-align: center;
    z-index: 6;
}

.left-panel {
    pointer-events: all;
    padding: 3rem 17% 2rem 12%;
}

.right-panel {
    pointer-events: none;
    padding: 3rem 12% 2rem 17%;
}

.panel .a-content {
    color: #fff;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.6s;
}

.panel h3 {
    font-weight: 600;
    line-height: 1;
    font-size: 1.5rem;
}

.panel p {
    font-size: 0.95rem;
    padding: 0.7rem 0;
}

.btn.transparent {
    margin: 0;
    background: none;
    border: 2px solid #fff;
    width: 130px;
    height: 41px;
    font-weight: 600;
    font-size: 0.8rem;
    margin-top: 1rem;
}

.btn.transparent:hover {
    border-color: #7384ff;
    transform: translate(10px, -10px);
    box-shadow: -10px 10px 0px 0px #222;
}

.right-panel .image,
.right-panel .a-content {
    transform: translateX(800px);
}

/* ANIMATION */

.auth-container.sign-up-mode:before {
    transform: translate(100%, -50%);
    right: 52%;
}

.auth-container.sign-up-mode .left-panel .image,
.auth-container.sign-up-mode .left-panel .a-content {
    transform: translateX(-800px);
}

.auth-container.sign-up-mode .signin-signup {
    left: 25%;
}

.auth-container.sign-up-mode form.sign-up-form {
    opacity: 1;
    z-index: 2;
}

.auth-container.sign-up-mode form.sign-in-form {
    opacity: 0;
    z-index: 1;
}

.auth-container.sign-up-mode .right-panel .image,
.auth-container.sign-up-mode .right-panel .a-content {
    transform: translateX(0%);
}

.auth-container.sign-up-mode .left-panel {
    pointer-events: none;
}

.auth-container.sign-up-mode .right-panel {
    pointer-events: all;
}
.icon {
    font-size: 2rem;
    margin: auto;
    color: #372065;
}

@media (max-width: 870px) {
    .auth-container {
        min-height: 800px;
        height: 100vh;
    }

    .signin-signup {
        width: 100%;
        top: 95%;
        transform: translate(-50%, -100%);
        transition: 1s 0.8s ease-in-out;
    }

    .signin-signup,
    .auth-container.sign-up-mode .signin-signup {
        left: 50%;
    }

    .panels-container {
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 2fr 1fr;
    }

    .panel {
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        padding: 2.5rem 8%;
        grid-column: 1 / 2;
    }

    .right-panel {
        grid-row: 3 / 4;
    }

    .left-panel {
        grid-row: 1 / 2;
    }

    .image {
        width: 200px;
        transition: transform 0.9s ease-in-out;
        transition-delay: 0.6s;
    }

    .panel .a-content {
        padding-right: 15%;
        transition: transform 0.9s ease-in-out;
        transition-delay: 0.8s;
    }

    .panel h3 {
        font-size: 1.2rem;
    }

    .panel p {
        font-size: 0.7rem;
        padding: 0.5rem 0;
    }

    .btn.transparent {
        width: 110px;
        height: 35px;
        font-size: 0.7rem;
    }

    .auth-container:before {
        width: 1500px;
        height: 1500px;
        transform: translateX(-50%);
        left: 30%;
        bottom: 68%;
        right: initial;
        top: initial;
        transition: 2s ease-in-out;
    }

    .auth-container.sign-up-mode:before {
        transform: translate(-50%, 100%);
        bottom: 32%;
        right: initial;
    }

    .auth-container.sign-up-mode .left-panel .image,
    .auth-container.sign-up-mode .left-panel .a-content {
        transform: translateY(-300px);
    }

    .auth-container.sign-up-mode .right-panel .image,
    .auth-container.sign-up-mode .right-panel .a-content {
        transform: translateY(0px);
    }

    .right-panel .image,
    .right-panel .a-content {
        transform: translateY(300px);
    }

    .auth-container.sign-up-mode .signin-signup {
        top: 5%;
        transform: translate(-50%, 0);
    }
}

@media (max-width: 570px) {
    form {
        padding: 0 1.5rem;
    }

    .image {
        display: none;
    }

    .panel .a-content {
        padding: 0.5rem 1rem;
    }

    .auth-container {
        padding: 1.5rem;
    }

    .auth-container:before {
        bottom: 72%;
        left: 50%;
    }

    .auth-container.sign-up-mode:before {
        bottom: 28%;
        left: 50%;
    }
}
</style>
