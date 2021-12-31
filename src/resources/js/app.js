require('./bootstrap');

import Vue from 'vue'
import vuetify from "../../plugins/vuetify.js"
import router from './router'
import App from './App.vue'


new Vue({
    el: '#app',
    vuetify,
    router,
    components: { App },
    template: '<App />'
  })

