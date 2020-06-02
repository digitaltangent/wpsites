// app.js

require('./bootstrap');
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader

window.Vue = require('vue');
//import Vue from "vue";

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Vuetify from 'vuetify';
import "vuetify/dist/vuetify.min.css";
Vue.use(Vuetify);

import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';
import TasksComponent from './components/TasksComponent.vue';
import CreateTaskComponent from './components/CreateTaskComponent.vue';
import EditTasksComponent from './components/EditTasksComponent.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        name: 'clients',
        path: '/clients',
        component: IndexComponent
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent
    },
    {
        name: 'tasks',
        path: '/tasks',
        component: TasksComponent
    },
    {
        name: 'createtask',
        path: '/createtask',
        component: CreateTaskComponent
    },
    {
        name: 'edittask',
        path: '/edittask/:id',
        component: EditTasksComponent
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});
//const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdiSvg', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
        },
        theme: {
            themes: {
                light: {
                    primary: '#546E7A', //blue-grey darken-1
                    secondary: '#F4511E', //deep-orange darken-1
                    accent: '#8c9eff',
                    error: '#b71c1c',
                },
            },
        },
        }
    ),
    router: router,
    render: h => h(App),
});


export default app;



