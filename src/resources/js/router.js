/*========== vue.js ルート機能 =========*/

import Vue from 'vue'
import VueRouter from 'vue-router'

import Test from './pages/Test.vue'
import Test2 from './pages/Test2.vue'
import Login from './pages/Login.vue'

Vue.use(VueRouter)

const routes = [
	{
		// リクエストを/にしたとき
		path: '/',
		component: Test
	},
	{
		// リクエストを/testにしたとき(test用のURL)
		path: '/test',
		component: Test2
	},
	{
		// リクエストを/loginにしたとき
		path: '/login',
		component: Login
	}
]

const router = new VueRouter({
	mode: 'history', // ★ 追加
	routes
  })
  
export default router
