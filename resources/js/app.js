import './bootstrap';
import { createApp } from "vue";
import App from "./vue/App.vue";
import router from "./vue/router/router.js";
import store from "./vue/store/index.js";
import VueCountdown from '@chenfengyuan/vue-countdown';
const app = createApp(App);

app.use(router);
router.app = app;
app.use(store);

app.component(VueCountdown.name, VueCountdown);


app.mount("#app");