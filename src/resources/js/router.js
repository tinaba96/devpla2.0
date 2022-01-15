/*========== vue.js ルート機能 =========*/
import Vue from 'vue'
import VueRouter from 'vue-router'

import Test from './pages/Test.vue'
import Test2 from './pages/Test2.vue'
import Login from './pages/Login.vue'
import SystemError from './pages/errors/System.vue'
import store from './store'


Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
	{
		// リクエストを/にしたとき
		path: '/test',
		component: Test
	},
	{
		// リクエストを/testにしたとき(test用のURL)
		path: '/test2',
		component: Test2
	},
	{
	  path: '/login',
	  component: Login,
	  beforeEnter (to, from, next) {
		if (store.getters['auth/check']) {
		  next('/')
		} else {
		  next()
		}
	  }
	},
	{
		path: '/500',
		component: SystemError
	}
  ]
  
  // VueRouterインスタンスを作成する
  const router = new VueRouter({
	mode: 'history',
	routes
  })
  
  // VueRouterインスタンスをエクスポートする
  // app.jsでインポートするため
  export default router