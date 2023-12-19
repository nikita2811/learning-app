<template>
  <div class="d-flex align-center flex-column">
    <v-card width="500" class="mt-8">
      <v-card-item>
        <v-card-title>Sign Up</v-card-title>
        <v-divider></v-divider>
      </v-card-item>
      <v-card-text>
        <v-form v-model="valid" @submit.prevent="register">
          <!-- First and Last Name Row -->

          <div class="form-group mb-4">
            <label>Name</label>
            <v-text-field type="text" variant="solo" v-model="name" color="f3f3f3" bg-color=" #f8fafc"
              :rules="[required('name'), minLength('name', 3)]" class="rounded-text-field"></v-text-field>
          </div>
          <div class="form-group mb-4">
            <label>Email</label>
            <v-text-field type="email" variant="solo" v-model="email" color="f3f3f3" bg-color=" #f8fafc"
              :rules="[required('email'), rules.email]"></v-text-field>
            <span>Already a member?</span><router-link to="/login" style="text-decoration:none">Login</router-link>
          </div>
          <div class="form-group mb-4">
            <label>Password</label>
            <v-text-field type="password" variant="solo" v-model="password" color="f3f3f3" bg-color=" #f8fafc"
              :rules="[required('password'), minLength('password', 8)]"></v-text-field>
          </div>
          <div class="form-group mb-4">
            <label>Confirm Password</label>
            <v-text-field type="password" variant="solo" v-model="password_confirmation" color="f3f3f3"
              bg-color=" #f8fafc" :rules="[required('confirm password'), rules.password_confirmation]"></v-text-field>
          </div>


          <!-- Submit Button -->
          <div class="buttons-w mt-4 float-right mb-4">
            <v-btn class="btn primary" type="submit" style="margin-left:120px" color="indigo-darken-3"
              :disabled="!valid">Signup</v-btn>
          </div>

        </v-form>

      </v-card-text>
    </v-card>
  </div>
</template>
<script>

export default {


  data() {
    return {

      required(propertyType) {
        return value => !!value || `${propertyType} is required`
      },
      minLength(propertyType, minLength) {
        return value => (value && value.length >= minLength) || `${propertyType} must have ${minLength} characters`
      },

      rules: {

        email: value => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          return pattern.test(value) || 'Invalid e-mail.'
        },
        password_confirmation: value => (value === this.password) || 'password not matched',
      },
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      type: '',
      valid: false,
    }
  },

  methods: {



    register() {

      axios.post('api/register', {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation,
      }).then((res) => {


        this.$router.push({ name: 'Dashboard' })


      }).catch((error) => {

        this.emitter.emit('getNotification', { 'eventContent': error.response.data.errors, type: 'error' })
      })





    },

  }

}

</script>
<style>
.rounded-text-field {
  border-radius: 20px;
  /* Adjust this value to control the roundness of the text field */
}
</style>
Again, please check the official Vuetify 3 documentation or release notes for the specific property or class name that should be used to achieve rounded text fields in Vuetify 3, as there may have been changes or improvements in the framework since my last update.







