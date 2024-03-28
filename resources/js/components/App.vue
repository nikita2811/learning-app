<template>
  <v-app>


    <v-app-bar v-if="isAuthenticated">
      <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer" @click="rail = false"><v-icon
          icon="mdi-menu" /></v-app-bar-nav-icon>


      <v-toolbar-title>New Project</v-toolbar-title>
      <v-spacer></v-spacer>
      <div>
        <v-btn variant="plain" @click="logout">Logout</v-btn>

      </div>
      <!-- <div v-else>
        <router-link to="/register" style="text-decoration:none">Register</router-link>
        <router-link to="/login" class="ml-2" style="text-decoration:none">Login</router-link>
      </div>
      <v-btn variant="text" icon="mdi-filter"></v-btn>
      <v-btn variant="text" icon="mdi-dots-vertical"></v-btn> -->

    </v-app-bar>

    <v-navigation-drawer v-model="drawer" :rail="rail" permanent @click="rail = false" v-if="isAuthenticated"
      image="https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg">
      <v-list>
        <v-list-item prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
          v-bind:title="`${currentUser.name}`" v-bind:subtitle="`${currentUser.email}`"></v-list-item>
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


    <v-main :class="{ 'main-content-open': drawer }">
      <div class="mt-8">
        <Warning :message="msg" :type="type"></Warning>
      </div>





      <!-- route outlet -->
      <!-- component matched by the route will render here -->
      <router-view></router-view>

    </v-main>
  </v-app>
</template>
<script setup>
import { useTheme } from 'vuetify'
const theme = useTheme()
function toggleTheme() {
  theme.global.name.value = theme.global.current.value.dark ? 'light' : 'dark'
}
</script>
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
      rail: true,
      drawer: false,
      authenticated: false

    }
  },

  computed: {
    isAuthenticated() {
      return this.$store.getters.isAuthenticated;
    },
    currentUser() {
      return this.$store.getters.currentUser;
    },
  },

  mounted() {
    this.emitter.on('getNotification', (evt) => {
      this.msg = evt.eventContent;
      this.type = evt.type;

    });


  },
  components: {
    Warning,
  },

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
<!-- <style scoped>
.main-content-open {
  transition: margin-left 0.3s;
  margin-left: 300px;
  /* Adjust the width based on your sidebar width */
}
</style> -->
