import './bootstrap';
import { createApp } from 'vue';
import App from "./components/App.vue"
import router from "./routes.js"
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import mitt from 'mitt'
import '@mdi/font/css/materialdesignicons.css';
import store from './store';
// import draggable from 'vuedraggable';
// import sortable from 'sortable';
const emitter = mitt()

const vuetify = createVuetify({
  components,
  directives,
})
const app = createApp(
  App
)

const apiMixin = {
  data() {
    return {
      token: '',
    };
  },


  methods: {
    checkAuthentication() {
      axios.get('/api/user')
        .then((res) => {
          this.user = res.data;
        }).catch((error) => {
          console.log(error)
          // User is not authenticated
          //this.authenticated = false;
          //this.$router.push({ name: 'login' })
        });
    },
    // getCSRFToken() {
    //   this.token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //   console.log(this.token)

    // },
    logout() {
      axios.post('/api/logout').then((res) => {
        this.$router.push({ name: 'login' })
        this.$store.dispatch('logout');
      }).catch((error) => {
        console.log(error)
      });


    },


  }
}
app.mixin(apiMixin)

app.config.globalProperties.emitter = emitter




const create = app.use(vuetify).use(store).use(router).mount('#app');



