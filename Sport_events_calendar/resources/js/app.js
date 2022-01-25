require('./bootstrap');
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { Datetime } from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'
import Vue from 'vue';
import App from './app.vue';
 
Vue.use(Datetime);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.component('app', require('./app.vue').default);

const app = new Vue({
    el: '#app',
    components:{'app':App}
});