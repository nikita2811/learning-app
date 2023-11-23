<template>
  <div class="d-flex align-center flex-column">
    <v-card width="500" class="mt-8">
      <v-card-item>
        <v-card-title>Sign In</v-card-title>
        <v-divider></v-divider>
      </v-card-item>
      <v-card-text>
        <v-form v-model="valid" @submit.prevent="login">


          <div class="form-group mb-4">
            <label>Email</label>
            <v-text-field type="email" variant="solo" v-model="email" color="f3f3f3" bg-color=" #f8fafc"
              :rules="[required('email'), rules.email]"></v-text-field>
            <span>New Member? </span><router-link to="/register" style="text-decoration:none">Sign
              Up</router-link>
          </div>



          <!-- Password and Confirm Password Row -->





          <div class="form-group mb-4">
            <label>Password</label>
            <router-link to="/forgot-password" style="text-decoration:none;float: right;">Forgot Password?</router-link>
            <v-text-field type="password" variant="solo" v-model="password" color="f3f3f3" bg-color=" #f8fafc"
              :rules="[required('password'), minLength('password', 6)]"></v-text-field>
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
        return value => (value && value.length >= 6) || `${propertyType} must have ${minLength} characters`
      },

      rules: {

        email: value => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          return pattern.test(value) || 'Invalid e-mail.'
        },

      },

      email: '',
      password: '',
      type: '',
      valid: false,
      errors: [],
    }


  },


  methods: {
    login() {

      axios.post('api/login', {
        email: this.email,
        password: this.password,
      }).then((res) => {

        if (res.data.status) {
          this.type = 'success';
        } else {
          this.type = 'error';
        }
        this.$router.push({ name: 'Dashboard' })


      }).catch((error) => {

        this.errors = error.response.data.errors
        this.emitter.emit('getNotification', { 'eventContent': this.errors, type: 'error' })


      })
    },

  }

}

</script>

