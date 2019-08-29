require('./bootstrap');

window.Vue = require('vue');

window.VueRouter=require('vue-router').default;

window.VueAxios=require('vue-axios').default;

window.Axios=require('axios').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

let AppLayout = require('./components/App.vue').default;

const Listposts=Vue.component('Listposts', require('./components/Listposts.vue').default);
const Addpost=Vue.component('Addpost', require('./components/Addpost.vue').default);
const Editpost=Vue.component('Editpost', require('./components/Editpost.vue').default);
const Viewpost=Vue.component('Viewpost', require('./components/Viewpost.vue').default);
const Deletepost=Vue.component('Deletepost', require('./components/Deletepost.vue').default);

// Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// Error Handler
window.form = Form;
import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
// registering modules
Vue.use(VueRouter, VueAxios, axios);

const routes = [
	{
		name: 'Listposts',
		path: '/',
		component: Listposts
	},
	{
		name: 'Addpost',
		path: '/add-post',
		component: Addpost
	},	
	{
		name: 'Editpost',
		path: '/edit/:id',
		component: Editpost
	},
	{
		name: 'Deletepost',
		path: '/post-delete/:id',
		component: Deletepost
	},	
	{
		name: 'Viewpost',
		path: '/view/:id',
		component: Viewpost
	}
];


const router = new VueRouter({ mode: 'history', routes: routes});	

new Vue(
  Vue.util.extend(
  { router },
  AppLayout
  )
).$mount('#app');