<template>
    <v-table>
        <thead>
            <tr>
                <th class="text-left">
                    Task
                </th>
                <th class="text-left">
                    Priority
                </th>
                <th class="text-left">
                    Status
                </th>
                <th class="text-left">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in tasks" :key="item.name">
                <td>{{ item.name }}</td>
                <td>{{ item.priority }}</td>
                <td>{{ item.status }}</td>
                <td><v-btn variant="text" icon="mdi-update"></v-btn>
                    <v-btn variant="text" icon="mdi-checkbox-marked-circle-outline"></v-btn>
                    <v-btn variant="text" icon="mdi-delete"></v-btn>
                </td>
            </tr>
        </tbody>
    </v-table>
</template>
<script>
export default {
    props: ['tasks'],
    data() {
        return {


        }

    },

}
</script>