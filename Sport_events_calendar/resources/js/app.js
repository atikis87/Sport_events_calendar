require('./bootstrap');
import Vue from 'vue';
import App from './app.vue';
import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import DatePicker from 'vue2-datepicker'
import 'vue2-datepicker/index.css'

Vue.use(DatePicker);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.component('app', require('./app.vue').default);

const app = new Vue({
    el: '#app',
    components: {
        'app': App
    }
});