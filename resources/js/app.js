import Vue from 'vue';
import './bootstrap';


window.Vue =require('vue');

import VueRouter from 'vue-router';
import routes from './routes';
import axios from "axios";
Vue.use(VueRouter);
// Vue.use(axios);

// Vue.component('register', require('./components/Register.vue').default);


const app = new Vue({
    el: '#app',
    router : new VueRouter(routes)
});
