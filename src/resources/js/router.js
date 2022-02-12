/*========== vue.js ルート機能 =========*/

import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from './views/SignIn.vue'
import Account from './views/Account.vue'
import SignUp from './views/SignUp.vue'
import Member from './views/Member.vue'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/user/signin',
      name: 'signin',
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
    {
      path: '/member',
      name: 'member',
      component: Member,
    },
  ]
})

export default router
