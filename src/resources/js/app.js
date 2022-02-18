// require('./bootstrap')
import './bootstrap'

import Alpine from 'alpinejs'
window.Alpine = Alpine;
Alpine.start();

// ルーティングの定義をインポートする
import router from './router'
// ルートコンポーネントをインポートする
import App from './App.vue'

import Vue from 'vue'
import Vuetify from 'vuetify'
import vuetify from '../../plugins/vuetify' // path to vuetify export
import 'material-design-icons-iconfont/dist/material-design-icons.css' // css-loaderを使用していることを確認してください
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader

Vue.use(Vuetify);
Vue.config.productionTip = false;
window.Vue = require('vue').default;


const app = new Vue({
  el: '#app',
  router: router,
  vuetify: vuetify,
  components: { App },
  template: '<App />'
});


// import store from './store'

// import vuetify from "../../plugins/vuetify.js"


// const createApp = async () => {
//     await store.dispatch('auth/currentUser')
  
//     new Vue({
//       el: '#app',
//       router,
//       store,
//       vuetify: vuetify,
//       components: { App },
//       template: '<App />'
//     })
//   }
  
  // createApp()