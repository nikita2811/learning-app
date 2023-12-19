<template>
  <v-app>


    <v-app-bar image="https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg">
      <v-app-bar-nav-icon> <v-icon icon="mdi-menu" /></v-app-bar-nav-icon>

      <v-toolbar-title>New Project {{ this.authenticated }}</v-toolbar-title>
      <v-spacer></v-spacer>
      <div v-if="this.authenticated">
        <v-btn variant="plain" @click="logout">Logout</v-btn>

      </div>
      <div v-else>
        <router-link to="/register" style="text-decoration:none">Register</router-link>
        <router-link to="/login" class="ml-2" style="text-decoration:none">Login</router-link>
      </div>
      <v-btn variant="text" icon="mdi-filter"></v-btn>
      <v-btn variant="text" icon="mdi-dots-vertical"></v-btn>
    </v-app-bar>

    <v-navigation-drawer v-if="this.authenticated" expand-on-hover rail
      image="https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg">
      <v-list>
        <v-list-item prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg" v-bind:title="`${this.user.name}`"
          v-bind:subtitle="`${this.user.email}`"></v-list-item>
      </v-list>

      <v-divider></v-divider>

      <v-list density="compact" nav>
        <v-list-item prepend-icon="mdi-folder" title="Tasks" value="myfiles">

        </v-list-item>
        <v-list-item prepend-icon="mdi-calendar" title="Calender" value="shared"></v-list-item>
        <v-list-item prepend-icon="mdi-account-multiple" title="Chat UI" value="starred"></v-list-item>
        <v-list-item prepend-icon="mdi-file" title="Files" value="starred"></v-list-item>
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
  </v-app>
</template>
<script>
import Warning from './Alerts/Warning.vue';
export default {
  data() {
    return {
      msg: "",
      type: "",
      name: "",
      user: {},
      authenticated: true,
      drawer: null,

    }
  },


  mounted() {
    this.emitter.on('getNotification', (evt) => {
      this.msg = evt.eventContent;
      this.type = evt.type;

    });
    this.checkAuthentication()

  },
  components: {
    Warning,
  },
  methods: {

  }
};
</script>
<style>
.v-list-item-title {
  color: #fff;
}

.v-toolbar-title {
  color: #fff;
}
</style>

