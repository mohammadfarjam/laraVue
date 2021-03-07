import Vue from 'vue/dist/vue';
require('./bootstrap');

window.Vue =new Vue;
import VueRouter from 'vue-router';
import routes from './routes';
import axios from "axios";
import VueAxios from 'vue-axios';

Vue.use(VueRouter);
Vue.use(axios);
Vue.use(VueAxios, axios)





// Vue.component('header', require('./components/Header.vue').default);


const app = new Vue({
    el: '#app',
    router : new VueRouter(routes)
});
