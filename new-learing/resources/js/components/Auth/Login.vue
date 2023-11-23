<template>
  <div class="d-flex align-center flex-column">

    <v-card width="400">
      <v-card-item>
        <v-card-title>Login</v-card-title>
        <v-divider></v-divider>
      </v-card-item>

      <v-card-text>
        <v-text-field label="Email"></v-text-field>
        <v-text-field label="Password"></v-text-field>
        <v-divider></v-divider>
        <v-btn color="primary"
        prominent rounded="sm" class="float-right mb-4">Login</v-btn>
      </v-card-text>
    </v-card>
  </div>
</template>
<script>
export default {

}
</script>
