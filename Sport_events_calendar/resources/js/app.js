require('./bootstrap');

import Vue from 'vue';

import App from './app.vue';

Vue.component('app', require('./app.vue').default);

const app = new Vue({
    el: '#app',
    components:{'app':App}
});