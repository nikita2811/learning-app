<template>
    <div v-if="message">
        <v-snackbar v-for="(error, index) in errorArray" :key="index" v-model="snackbar.show" :timeout="snackbar.timeout"
            :style="`top:${index * 80 + 10}px`" :color="type" location="top">{{
                error }}
            <v-btn float-right @click="hide(index)">
                Close
            </v-btn>
        </v-snackbar>
    </div>
</template>
    
<script>
export default {
    props: ['message', 'type'],
    data() {
        return {
            errors: [],
            snackbar: {
                show: true,
                color: '',
                timeout: 90000
            }

        }
    },
    computed: {
        errorArray() {
            this.errors = [];
            if (this.message.length == undefined) {
                for (let index in this.message) {
                    for (let i in this.message[index]) {
                        this.errors.push(this.message[index][i]);
                    }
                }
            } else {
                this.errors = this.message
            }
            return this.errors;
        }

    },
    methods: {
        hide(index) {
            this.errors.splice(index, 1)
        }
    },

}
</script>
    
<style>
.spacing {
    position: fixed;
    right: 25px;
    bottom: 25px;
}
</style>
