//resources
import './bootstrap';
import { createApp } from "vue";
import App from "./vue/App.vue";
import axios from 'axios';
import router from "./vue/router/router.js";
import store from "./vue/store/index.js";

//global components
import loading from "./vue/components/utilities/loading.vue";
import VueCountdown from '@chenfengyuan/vue-countdown';


const app = createApp(App);
axios.defaults.withCredentials = true;
app.use(router);
router.app = app;
app.use(store);

app.component(VueCountdown.name, VueCountdown);
app.component("loading", loading);

app.mount("#app");