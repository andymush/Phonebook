import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import App from './layouts/App.vue'

const app = createApp({});

import Welcome from './components/Welcome.vue';
import Index from './components/Contacts/Index.vue';
import Create from './components/Contacts/Create.vue';
import Login from './components/Auth/Login.vue';
import Register from './components/Auth/Register.vue';


const routes = [
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    },
    {
        path: '/create',
        name: 'create',
        component: Create
    }
    
  ]

const router = createRouter({
    history: createWebHistory(),
    routes
})

app.component('Welcome', Welcome);
app.component('Index', Index);
app.component('Login', Login);
app.component('create',Create);
app.component('App', App);


app.use(router);
app.mount('#app');
