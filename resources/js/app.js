import './bootstrap';
import { createApp } from 'vue';
import App from "./components/App.vue"
import router from "./routes.js"
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import mitt from 'mitt'
const emitter = mitt()

const vuetify = createVuetify({
  components,
  directives,
})
const app = createApp(
  App
)

app.config.globalProperties.emitter = emitter




const create = app.use(vuetify).use(router).mount('#app');



