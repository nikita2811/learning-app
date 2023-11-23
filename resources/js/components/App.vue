<template>
  <v-layout>


    <v-app-bar>
      <v-app-bar-nav-icon variant="text"></v-app-bar-nav-icon>

      <v-toolbar-title>My Learning App</v-toolbar-title>


      <v-spacer></v-spacer>

      <router-link to="/register" style="text-decoration:none">Register</router-link>
      <router-link to="/login" class="ml-2" style="text-decoration:none">Login</router-link>
      <!-- <v-btn variant="text" icon="mdi-magnify" >Register</v-btn> -->

      <v-btn variant="text" icon="mdi-filter"></v-btn>

      <v-btn variant="text" icon="mdi-dots-vertical"></v-btn>
    </v-app-bar>

    <v-navigation-drawer location="left" temporary>
      <v-list>
        <v-list-item> hi</v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-main style="height: 500px;">
      <div class="mt-8">
        <Warning :message="msg" :type="type"></Warning>
      </div>

      <v-card-text>



        <!-- route outlet -->
        <!-- component matched by the route will render here -->
        <router-view></router-view>
      </v-card-text>
    </v-main>
  </v-layout>
</template>
<script>
import Warning from './Alerts/Warning.vue';
export default {
  data() {
    return {
      msg: "",
      type: "",
      name: "",
    }
  },

  mounted() {
    this.emitter.on('getNotification', (evt) => {
      this.msg = evt.eventContent;
      this.type = evt.type;

    });
    axios.get('api/user').then((res) => {
      console.log(res)
    }).catch((error) => {
      console.log(error)
    })

  },
  components: {
    Warning
  },
  methods: {
    confirm() {
      this.snackbar = true
      console.log("nothing returned")



    }
  }
};
</script>

