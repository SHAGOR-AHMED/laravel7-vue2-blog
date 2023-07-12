require('./bootstrap');

// Vue JS
window.Vue = require('vue');

// vForm
// import { Form, HasError, AlertError } from 'vform';
import Form from 'vform';
window.Form = Form; // j name debo,oi nam deye call korte hobe.

// Vue.component(HasError.name, HasError)
// Vue.component(AlertError.name, AlertError)

// Vue Router
import VueRouter from 'vue-router';
//import abc from 'vue-router';
Vue.use(VueRouter);
//Vue.use(abc);

// Routes
import {routes} from './routes/routes.js';

const router = new VueRouter({
  routes,
  // mode:"history",
});

// Sweet Alert
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;

// Toastr Alert
import toastr from 'toastr'
window.toastr = toastr;

// VueX
import Vuex from 'vuex'

Vue.use(Vuex)
import storeData from './store/store.js';

const store = new Vuex.Store(
  storeData 
);

// Moment Js
import {moment} from './filter/filter.js';

//CKEditor
import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use(CKEditor);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('my-component', require('./components/MyComponent.vue').default);
Vue.component('sidebar-menu', require('./components/backend/sidebar.vue').default);
Vue.component('home', require('./components/backend/home.vue').default);

const app = new Vue({
    el: '#content',
    router,
    store
});
