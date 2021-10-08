require('./bootstrap');

import { createApp } from 'vue';
import router from './router';
import store from "./store";
import axios from "axios";
import AOS from 'aos';
import 'aos/dist/aos.css';
import singleValidation from "./mixins/singleValidation";
import validation from "./mixins/validation";
import general from "./mixins/general";
import Notifications from 'notiwind';
import App from "./components/App";

axios.interceptors.request.use(
  (config) => {
    let token = localStorage.getItem('access_token');
    if (token) {
      config.headers['Authorization'] = `Bearer ${ token }`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

AOS.init();
const app = createApp(App);
app.config.globalProperties.axios = axios;
app.config.globalProperties.validate = require("validate.js");
app.config.globalProperties.serverUrl = process.env.MIX_APP_SERVER_URL;
app.use(router);
app.use(store);
app.use(Notifications);
app.mixin(general);
app.mixin(validation);
app.mixin(singleValidation);
app.mount('#app');
