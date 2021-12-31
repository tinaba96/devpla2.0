import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'
import Vue from 'vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)

const opts = {}

export default new Vuetify({
    /* ここから追加 */
    icons: {
      iconfont: 'mdi',
    }
    /* ここまで */
  },opts)