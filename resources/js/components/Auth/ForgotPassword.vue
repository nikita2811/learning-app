<template>
    <div class="d-flex align-center flex-column">
        <v-card width="500" class="mt-8">
            <v-card-item>
                <v-card-title>Forgot Password</v-card-title>
                <v-divider></v-divider>
            </v-card-item>
            <v-card-text>
                <v-form v-model="valid" @submit.prevent="forgotPassword">
                    <div class="form-group mb-4">
                        <label>Registered Email</label>
                        <v-text-field type="email" variant="solo" v-model="email" color="f3f3f3" bg-color=" #f8fafc"
                            :rules="[required('email'), rules.email]">
                        </v-text-field>

                    </div>
                    <!-- Submit Button -->
                    <div class="buttons-w mt-4 float-right mb-4">
                        <v-btn class="btn primary" type="submit" style="margin-left:120px" color="indigo-darken-3"
                            :disabled="!valid">Send Email</v-btn>
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


            rules: {

                email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Invalid e-mail.'
                },

            },

            email: '',
            type: '',
            valid: false,
        }
    },
    methods: {
        forgotPassword() {
            axios.post('api/forgot-password', { email: this.email })
                .then((res) => {
                    this.emitter.emit('getNotification', { 'eventContent': [res.data.message], type: 'success' })
                }).catch((error) => {
                    this.emitter.emit('getNotification', { 'eventContent': error.response.data.errors, type: 'error' })
                })
        }

    }

}
</script>