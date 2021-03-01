import Vue from 'vue/dist/vue'
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import routes from './routes';
Vue.use(VueRouter);





// Vue.component('header', require('./components/Header.vue').default);


const app = new Vue({
    el: '#app',
    router : new VueRouter(routes)
});
