<template>
    <div class="d-flex align-center flex-column">
        <v-card width="500" class="mt-8">
            <v-card-item>
                <v-card-title>Reset Password</v-card-title>
                <v-divider></v-divider>
            </v-card-item>
            <v-card-text>
                <v-form v-model="valid" @submit.prevent="resetPassword">
                    <div class="form-group mb-4">
                        <label>Email</label>
                        <v-text-field type="email" variant="solo" v-model="email" color="f3f3f3" bg-color=" #f8fafc"
                            :rules="[required('email'), rules.email]"></v-text-field>
                    </div>
                    <div class="form-group mb-4">
                        <label>New Password</label>
                        <v-text-field type="password" variant="solo" v-model="password" color="f3f3f3" bg-color=" #f8fafc"
                            :rules="[required('password'), minLength('password', 6)]"></v-text-field>
                    </div>
                    <div class="form-group mb-4">
                        <label>Confirm Password</label>
                        <v-text-field type="password" variant="solo" v-model="password_confirmation" color="f3f3f3"
                            bg-color=" #f8fafc" :rules="[required('confirm password'), rules.confirm]"></v-text-field>
                    </div>
                    <!-- Submit Button -->
                    <div class="buttons-w mt-4 float-right mb-4">
                        <v-btn class="btn primary" type="submit" style="margin-left:120px" color="indigo-darken-3"
                            :disabled="!valid">Reset password</v-btn>
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

                confirm: value => (value === this.password) || 'password not matched',
            },
            email: '',
            password: '',
            password_confirmation: '',
            type: '',
            valid: false,
            token: '',
        }

    },
    mounted() {
        console.log(this.$route.params)
    },
    methods: {
        resetPassword() {

            axios.post('api/reset-password', {
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
                // token: 'xyz',
            })
                .then((res) => {
                    console.log(res)
                }).catch((error) => {
                    console.log(error)
                })
        }
    }

}
</script>