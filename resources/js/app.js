/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component(
//     'passport-clients',
//     require('./components/passport/Clients.vue').default
// );
// Vue.component(
//     'passport-authorized-clients',
//     require('./components/passport/AuthorizedClients.vue').default
// );
// Vue.component(
//     'passport-personal-access-tokens',
//     require('./components/passport/PersonalAccessTokens.vue').default
// );

// import VueRouter from 'vue-router'
// import routes from './routes'
//
// const router = new VueRouter({
//     routes
// });

// import axios from 'axios'
// import VueAxios from 'vue-axios'
//
// Vue.axios.defaults.baseURL = '/api/v1';
//
// import VueAuth from '@websanova/vue-auth'
//
// Vue.use(VueAxios, axios);
// Vue.use(VueAuth, {
//     auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
//     http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
//     router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js')
// });

// import App from './components/App'
// Vue.component('App', App);
//
// new Vue({
//     render: h => h(App),
//     // router
// }).$mount('#app');

import axios from 'axios'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import App from './components/App'
import auth from './auth'
import router from './router'

// Set Vue globally
window.Vue = Vue;

// Set Vue router
Vue.router = router;
Vue.use(VueRouter);

// Set Vue authentication
Vue.use(VueAxios, axios);
axios.defaults.baseURL = '/api/v1';

Vue.use(VueAuth, auth);

// Load Index
// Vue.component('App', App);
// const app = new Vue({
//     el: '#app',
//     router
// });

new Vue({
    render: h => h(App),
    router
}).$mount('#app');
