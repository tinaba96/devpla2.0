// require('./bootstrap')
import './bootstrap'

import Alpine from 'alpinejs'

// ルーティングの定義をインポートする
import router from './router'
// ルートコンポーネントをインポートする
import App from './App'

import Vue from 'vue'
import Vuetify from 'vuetify'
import vuetify from '../../plugins/vuetify' // path to vuetify export
// import 'material-design-icons-iconfont/dist/material-design-icons.css'
// import '@mdi/font/css/materialdesignicons.css'
Vue.use(Vuetify);
Vue.config.productionTip = false;
window.Vue = require('vue').default;

import store from './store' // ★追加

// import vuetify from "../../plugins/vuetify.js"

window.Alpine = Alpine;

Alpine.start();

new Vue({
    el: '#app',
    router, // ルーティングの定義を読み込む
    components: { App }, // ルートコンポーネントの使用を宣言する
    template: '<App />', // ルートコンポーネントを描画する
    //vuetify: new Vuetify()
    router: router,
    vuetify: vuetify,
    store // ★追加
})