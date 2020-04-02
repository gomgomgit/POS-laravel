require('./bootstrap');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import AddComponent from './components/order/add.vue';

const routes =[
	{
		name: '',
		path: 'orders/add',
		component: AddComponent
	}	
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({router}, App )).$mount('#app');