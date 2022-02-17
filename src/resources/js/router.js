/*========== vue.js ルート機能 =========*/

import Vue from 'vue'
import VueRouter from 'vue-router'

import SignIn from './views/SignIn.vue'
import Account from './views/Account.vue'
import SignUp from './views/SignUp.vue'
import Member from './views/Member.vue'
import Profile from './views/Profile.vue'
import Withdrawal from './views/Withdrawal.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/user/signin',
            name: 'signin',
            component: SignIn,
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
        {
            path: '/profile',
            name: 'profile',
            component: Profile,
        },
        {
            path: '/withdrawal',
            name: 'Withdrawal',
            component: Withdrawal,
        },
    ]
})

export default router
