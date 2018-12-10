
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'

Vue.use(VueRouter)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 const sample = require('./components/sampleComponent.vue');
  const example = require('./components/ExampleComponent.vue');
  const todo = require('./components/TodoComponent.vue');
 const routes = [
 	{
 		path:'/sample',
 		component:sample
 	},
 	{
 		path:'/example',
 		component: example
 	},
 	{
 		path:'/',
 		component:todo
 	}
 ];
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
const router = new VueRouter({
	routes
});
const app = new Vue({
    el: '#app',
    router
});
