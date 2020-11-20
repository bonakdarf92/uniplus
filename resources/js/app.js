
import Vue from 'vue'
import router from './router'
import axios from 'axios'
import '@fortawesome/fontawesome-free/css/all.css'
import store from './store'
import Clipboard from 'v-clipboard'



Vue.use(Clipboard)

// import Axios from 'axios'

Vue.use(axios)
require('./bootstrap');

require('bootstrap/dist/css/bootstrap.min.css')
require('bootstrap/dist/js/bootstrap.min')
require('jquery')
require('popper.js')

window.Vue = require('vue');
window.axios=require('axios');


var username = 'admin';
var password = 'admin';
var basicAuth = 'Basic ' + btoa(username + ':' + password);


axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;
// axios.defaults.headers.common['Authorization'] = basicAuth;
// Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

const token = localStorage.getItem('user-token')
if (token) {
    axios.defaults.headers.common['Authorization'] = token
}

/**
 * The following block of code may be used to automatically register your
 * Vue comp. It will recursively scan this directory for the Vue
 * comp and automatically register them with their "basename".
 *
 * Eg. ./comp/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding comp to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    store,
    el: '#app',
});
