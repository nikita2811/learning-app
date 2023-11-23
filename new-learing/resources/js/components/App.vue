<template>

    <v-layout>


      <v-app-bar

      >
        <v-app-bar-nav-icon variant="text"></v-app-bar-nav-icon>

        <v-toolbar-title>My Learning App{{msg}}</v-toolbar-title>


        <v-spacer></v-spacer>

         <router-link to="/register">Register</router-link>
          <router-link to="/login" class="ml-2">Login</router-link>
        <!-- <v-btn variant="text" icon="mdi-magnify" >Register</v-btn> -->

        <v-btn variant="text" icon="mdi-filter"></v-btn>

        <v-btn variant="text" icon="mdi-dots-vertical"></v-btn>
      </v-app-bar>

      <v-navigation-drawer
        location="left"
        temporary
      >
        <v-list>
         <v-list-item> hi</v-list-item>
        </v-list>
      </v-navigation-drawer>

      <v-main style="height: 500px;">
        <v-card-text>




        <!-- route outlet -->
  <!-- component matched by the route will render here -->
  <router-view></router-view>
        </v-card-text>
      </v-main>
    </v-layout>

</template>
<script>
export default {
    data(){
        return {
            msg:"",
        }
    },

  mounted() {
this.emitter.on('getNotification', (evt) => {
      this.msg = evt.eventContent;

        });
        console.log(this.msg)

  },
  methods:{
    confirm(){
        this.snackbar = true
         console.log("nothing returned")



    }
  }
};
</script>

