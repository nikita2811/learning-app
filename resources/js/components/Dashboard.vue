<template>
    <h1>Dashboard</h1>

    <!-- <div>This Page is Preserved for graphs only</div> -->



    <v-dialog width="500" transition="dialog-bottom-transition">
        <template v-slot:activator="{ props }">
            <v-btn v-bind="props" text="Create Task" prepend-icon="mdi-plus"> </v-btn>
        </template>

        <template v-slot:default="{ isActive }">

            <v-card>
                <v-toolbar color="primary" title="Create Task"></v-toolbar>
                <v-form @submit.prevent="createTask">
                    <v-text-field v-model="task" label="Task" class="mr-4 ml-4 mt-4"
                        :rules="[required('task'), minLength('task', 3)]"></v-text-field>
                    <v-select clearable v-model="priority" :items="items" item-value="id" item-title="name" label="Priority"
                        item-color="red" class="mr-4 ml-4 mb-4" :rules="[required('priority')]"></v-select>


                    <v-spacer></v-spacer>
                    <v-card-actions class="justify-end">
                        <v-btn type="submit">Submit</v-btn>
                        <v-btn text="Close Dialog" @click="isActive.value = false"></v-btn>


                    </v-card-actions>
                </v-form>


            </v-card>

        </template>
    </v-dialog>
    <Tasks :tasks="tasks"></Tasks>
</template>
<script>
import Tasks from './Tasks.vue'
export default {
    mounted() {
        this.checkAuthentication()
        this.getTasks()

    },
    components: {
        Tasks
    },
    data() {
        return {
            required(propertyType) {
                return value => !!value || `${propertyType} is required`
            },
            minLength(propertyType, minLength) {
                return value => (value && value.length >= 3) || `${propertyType} must have ${minLength} characters`
            },

            task: null,
            priority: null,
            items: [
                { id: 1, name: 'Low' },
                { id: 2, name: 'Medium' },
                { id: 3, name: 'High' }
            ],
            tasks: [],
        }
    },
    methods: {
        createTask() {
            axios.post('api/tasks', {
                task: this.task,
                priority: this.priority
            }).then((res) => {
                this.getTasks()
                this.emitter.emit('getNotification', { 'eventContent': res.data.message, type: 'success' })
            }).catch((error) => {
                console.log(error)
                this.emitter.emit('getNotification', { 'eventContent': error.response.data.errors, type: 'error' })
            })
        },
        getTasks() {
            axios.get('api/tasks').then((res) => {
                this.tasks = res.data.data


            }).catch((error) => {

                this.emitter.emit('getNotification', { 'eventContent': error.response.data.errors, type: 'error' })
            })
        }
    }

}
</script>