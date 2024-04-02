<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img
                class="mx-auto h-10 w-auto"
                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company"
            />
            <h2
                class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
            >
                Sign in to your account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form @submit.prevent="login()" class="space-y-6">
                <div>
                    <label
                        for="email"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Email address</label
                    >
                    <div class="mt-2">
                        <input
                            v-model="email"
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label
                            for="password"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Password</label
                        >
                        <div class="text-sm">
                            <a
                                href="#"
                                class="font-semibold text-indigo-600 hover:text-indigo-500"
                                >Forgot password?</a
                            >
                        </div>
                    </div>
                    <div class="mt-2">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            v-model="password"
                            autocomplete="current-password"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { sendGet, sendPost } from "@/modules/api.js";
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {
            loginUrl: "auth/login",
            email: null,
            password: null,
        };
    },
    computed: {
        ...mapGetters(["baseUrl"]),
    },
    methods: {
        ...mapActions(["loginUser", "setUser"]),
        login() {
            const body = {
                email: this.email,
                password: this.password,
            };

            //   var data = new FormData();
            //   data.append('email' , this.email)
            //   data.append('password' , this.password)

            axios
                .post(this.baseUrl + this.loginUrl, {
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                    // console.log("response");
                    console.log(response);
                    var token = "Bearer " + response.data.token;
                    this.loginUser(token);
                    this.setUser(response.data.user);

                })
                .catch(function (error) {
                    console.log("error");
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
        },

        //fetch sanctum token
        // getToken() {
        //     console.log("getting tokens");
        //     axios
        //         .get("http://localhost:8000/sanctum/csrf-cookie")
        //         .then((response) => {
        //             console.log("response");
        //             console.log(response);
        //             this.login();
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         })
        //         .finally(function () {
        //             // always executed
        //         });

        //     //  ;
        // },
    },
};
</script>

<style></style>
