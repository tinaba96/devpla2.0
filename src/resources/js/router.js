/*========== vue.js ルート機能 =========*/

import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from './components/Login.vue'
import Account from './components/Account.vue'
import SignUp from './components/SignUp.vue'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/user/login',
      name: 'login',
      component: Login,
    },
    {
      path: '/user/account',
      name: 'account',
      component: Account,
    },
    {
      path: '/signup',
      name: 'signup',
      component: SignUp,
    },
  ]
})

export default router
