require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router';
import routes from './route';
import store from './store';
import App from "./components/App";

Vue.use(VueRouter);

const router = new VueRouter(routes);
const app = new Vue({
    el: '#app',
    components: {App},
    router,
    store
});
