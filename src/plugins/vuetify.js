import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

const opts = {}

export default new Vuetify({
    /* ここから追加 */
    icons: {
      iconfont: 'mdi',
    }
    /* ここまで */
  },opts)