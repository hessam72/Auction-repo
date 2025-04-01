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
import NProgress from 'nprogress';
import 'nprogress/nprogress.css';

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi'
// import { fa } from 'vuetify/iconsets/fa' // FontAwesome
// import '@fortawesome/fontawesome-free/css/all.css'

import '@mdi/font/css/materialdesignicons.css'

const vuetify = createVuetify({
    theme: {
        defaultTheme: 'myCustomTheme', // Set default theme
        themes: {
          myCustomTheme: {
            dark: true, // Set to true for dark mode
            colors: {
              primary: '#1976D2', // Change primary color
              secondary: '#424242',
              accent: '#82B1FF',
              error: '#FF5252',
              info: '#2196F3',
              success: '#4CAF50',
              warning: '#FB8C00',
            },
          },
        },
      },
    components,
    directives,
    icons: {
      defaultSet: 'mdi', // Set MDI as the default icon set
      aliases,
      sets: {
          mdi
      },
  },
  })


const options = {
    // You can set your default options here
};

NProgress.configure({ showSpinner: false });

var $ = jQuery;
window.$ = $;
const emitter = mitt();

const app = createApp(App);
app.config.globalProperties.emitter = emitter;

axios.defaults.withCredentials = true;

axios.defaults.baseURL = 'http://localhost:8000/api/';
// axios.defaults.baseURL = 'https://dealioners.com/api/';
app.use(vuetify);

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