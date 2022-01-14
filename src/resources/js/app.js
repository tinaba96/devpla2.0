require('./bootstrap')
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
// import 'material-design-icons-iconfont/dist/material-design-icons.css'
// import '@mdi/font/css/materialdesignicons.css'
Vue.use(Vuetify);
Vue.config.productionTip = false;
window.Vue = require('vue').default;

import store from './store'

// import vuetify from "../../plugins/vuetify.js"



new Vue({
    el: '#app',
    components: { App }, // ルートコンポーネントの使用を宣言する
    template: '<App />', // ルートコンポーネントを描画する
    //vuetify: new Vuetify()
    router: router,
    vuetify: vuetify,
    store
})