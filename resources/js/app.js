import Vue from 'vue/dist/vue';
require('./bootstrap');

window.Vue =new Vue;
import VueRouter from 'vue-router';
import routes from './routes';
import axios from "axios";
Vue.use(VueRouter);
Vue.use(axios);





// Vue.component('header', require('./components/Header.vue').default);


const app = new Vue({
    el: '#app',
    router : new VueRouter(routes)
});
