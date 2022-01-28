import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from './components/Login.vue'
import Account from './components/Account.vue'

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
  ]
})

export default router