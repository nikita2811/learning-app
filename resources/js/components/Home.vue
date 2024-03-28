<template>
    <div>
        <div v-if="!isAuthenticated">
            <Login></Login>
        </div>

    </div>
</template>
<script>
import Login from './Auth/Login.vue';
import Dashboard from './Dashboard.vue'
export default {

    computed: {
        isAuthenticated() {
            return this.$store.getters.isAuthenticated;
        },
        currentUser() {
            return this.$store.getters.currentUser;
        },
    },
    components: {
        Login,
        Dashboard
    }
}
</script>
