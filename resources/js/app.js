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

//global components
import loading from "./vue/components/utilities/loading.vue";
import more_btn from "./vue/components/utilities/more_btn.vue";
import page_title from "./vue/components/user/page_title.vue";
import inline_loading from "./vue/components/utilities/inline_loading.vue";
import VueCountdown from '@chenfengyuan/vue-countdown';
import StarRating from 'vue-star-rating';
import Countdown from 'vue3-flip-countdown'
import jQuery from 'jquery';
var $ = jQuery;
window.$ = $;
const app = createApp(App);
axios.defaults.withCredentials = true;

axios.defaults.baseURL = 'http://localhost:8000/api/';

app.use(router);
app.use(Countdown);

router.app = app;
app.use(store);

app.component(VueCountdown.name, VueCountdown);
app.component("loading", loading);
app.component("more-btn", more_btn);
app.component("page-title", page_title);
app.component("inline-loading", inline_loading);
app.component("star-rating", StarRating);

app.mount("#app");