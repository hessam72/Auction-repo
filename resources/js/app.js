//resources
// import global.jQuery from 'jquery';
// var $ = global.jQuery;
// window.$ = $;
import './bootstrap';
import { createApp } from "vue";
import App from "./vue/App.vue";
import axios from 'axios';
import router from "./vue/router/router.js";
import store from "./vue/store/index.js";
import mitt from 'mitt';
//global components
import loading from "./vue/components/utilities/loading.vue";
import more_btn from "./vue/components/utilities/more_btn.vue";
import page_title from "./vue/components/user/page_title.vue";
import inline_loading from "./vue/components/utilities/inline_loading.vue";
import VueCountdown from '@chenfengyuan/vue-countdown';
import StarRating from 'vue-star-rating';
import Countdown from 'vue3-flip-countdown'
import jQuery from 'jquery';

import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const options = {
    // You can set your default options here
};


var $ = jQuery;
window.$ = $;
const emitter = mitt();

const app = createApp(App);
app.config.globalProperties.emitter = emitter;

axios.defaults.withCredentials = true;

axios.defaults.baseURL = 'http://localhost:8000/api/';

app.use(router);
app.use(Countdown);
app.use(Toast, options);

router.app = app;
app.use(store);

app.component(VueCountdown.name, VueCountdown);
app.component("loading", loading);
app.component("more-btn", more_btn);
app.component("page-title", page_title);
app.component("inline-loading", inline_loading);
app.component("star-rating", StarRating);

app.mount("#app");