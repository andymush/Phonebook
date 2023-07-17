import Router from 'vue-router'
import { createRouter, createWebHistory } from 'vue-router'
import Index from '../components/Contacts/Index.vue'
import Login from '../components/Auth/Login.vue'
import Register from '../components/Auth/Register.vue'


export default new Router({
  routes: [
    {
      path: '/Index',
      name: 'home',
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
    }
    
  ]
})
