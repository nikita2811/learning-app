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
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in tasks" :key="item.name">
                <td>{{ item.name }}</td>
                <td>{{ item.priority }}</td>
                <td>{{ item.status }}</td>
            </tr>
        </tbody>
    </v-table>
</template>
<script>
export default {
    props: ['tasks'],
    // data() {
    //     return {
    //       tasks:[],
    //     }

    // },

}
</script>