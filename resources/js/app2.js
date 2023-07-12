require('./bootstrap');

// Vue JS
window.Vue = require('vue');

// Vue Router
import VueRouter from 'vue-router';
//import abc from 'vue-router';
Vue.use(VueRouter);
//Vue.use(abc);

// Routes
import {routes} from './public-routes/routes.js';

const router = new VueRouter({
  routes,
  // mode:"history",
});

// VueX
import Vuex from 'vuex'

Vue.use(Vuex)
import storeData from './store/store.js';

const store = new Vuex.Store(
  storeData 
);

// Moment Js
import {moment} from './filter/filter.js';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home', require('./components/backend/home.vue').default);
Vue.component('footer-bottom', require('./components/public/Footer.vue').default);
Vue.component('header-main', require('./components/public/Headermain.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));

//Vue.component('public - master', require('./components/public/PublicMaster').default);
import PublicMaster from './components/public/PublicMaster';
import Footer from './components/public/Footer';

const app = new Vue({
    el: '#content',
    router,
	  store,
    components:{
      'public-master': PublicMaster
    }
});
