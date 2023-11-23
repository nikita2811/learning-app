<template>
<div class="d-flex align-center flex-column">
    <v-card width="500" class="mt-8">
      <v-card-item>
        <v-card-title>Register</v-card-title>
        <v-divider></v-divider>
      </v-card-item>
      <v-card-text>
  <form @submit.prevent="register">
    <!-- First and Last Name Row -->

        <div class="form-group mb-4">
          <label for="name"> Name</label>
          <input class="form-control" type="text" id="name" v-model="v$.form.firstName.$model" autocomplete="name">
          <div class="pre-icon os-icon os-icon-user-male-circle"></div>
          <!-- Error Message -->
          <div class="input-errors" v-for="(error, index) of v$.form.firstName.$errors" :key="index">
            <div class="error-msg">{{ error.$message }}</div>
          </div>
        </div>





    <!-- Email Row -->
    <div class="form-group mb-4">
      <label for="email"> Email address</label>
      <input class="form-control" id="email" type="email" v-model="v$.form.email.$model" autocomplete="email">
      <div class="pre-icon os-icon os-icon-email-2-at2"></div>
       <span>Already a member?</span><router-link to="/login" style="text-decoration:none">Login</router-link>
      <!-- Error Message -->
        <div class="input-errors" v-for="(error, index) of v$.form.email.$errors" :key="index">
          <div class="error-msg">{{ error.$message }}</div>
        </div>
    </div>



    <!-- Password and Confirm Password Row -->
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="password"> Password</label>
          <input class="form-control" id="password" type="password" v-model="v$.form.password.$model">
          <div class="pre-icon os-icon os-icon-fingerprint"></div>
          <!-- Error Message -->
          <div class="input-errors" v-for="(error, index) of v$.form.password.$errors" :key="index">
            <div class="error-msg">{{ error.$message }}</div>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="confirm">Confirm Password</label>
          <input  class="form-control" id="confirm" type="password" v-model="v$.form.confirm.$model">
          <!-- Error Message -->
          <div class="input-errors" v-for="(error, index) of v$.form.confirm.$errors" :key="index">
            <div class="error-msg">{{ error.$message }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Submit Button -->
    <div class="buttons-w mt-4 float-right mb-4">
      <v-btn class="btn primary" type="submit" style="margin-left:120px" color="indigo-darken-3">Signup</v-btn>
    </div>

  </form>

      </v-card-text>
    </v-card>
</div>
</template>
<script>
import useVuelidate from '@vuelidate/core'
import { required, email, minLength, sameAs } from '@vuelidate/validators'


export function validName(name) {
  let validNamePattern = new RegExp("^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$");
  if (validNamePattern.test(name)){
    return true;
  }
  return false;
}


export default {

  setup () {
    return { v$: useVuelidate() }
  },

  data() {
    return {
      form: {
        firstName: '',
        lastName: '',
        email: '',
        password: '',
        confirm: '',
      }
    }
  },

  validations() {
    return {
      form: {
        firstName: {
          required, name_validation: {
            $validator: validName,
            $message: 'Invalid Name. Valid name only contain letters, dashes (-) and spaces'
          }
        },

        email: { required, email },
        password: { required, min: minLength(6) },
        confirm: {required,
      sameAs: sameAs(this.form.password)}
      },
    }
  },
  methods:{
    register(){

axios.post('api/register',{
    name:this.form.firstName,
    email:this.form.email,
    password:this.form.password,
    }).then((res)=>{
    console.log(res.email)
this.emitter.emit('getNotification', {'eventContent': res.email})


}).catch((error)=>{
this.emitter.emit('getNotification', {'eventContent': error.response.data})
})
    },
    addData(){
       this.emitter.emit('getNotification', {'eventContent': 'String changed'});

    }
  }

}

</script>
