<template>
    <div>
        <table class="table" v-if="clients.data.length">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(client,index) in clients.data">
                <td>
                    <img :src="`/storage/clients/avatars/${client.avatar}`" class="avatar"/>
                </td>
                <td>{{ client.first_name }}</td>
                <td>{{ client.last_name }}</td>
                <td>{{ client.email }}</td>
                <td class="text-right">
                    <a :href="`/clients/${client.id}`" class="btn btn-primary btn-sm">Transactions</a>
                    <a :href="`/clients/${client.id}/edit`" class="btn btn-success btn-sm">Edit</a>
                    <a @click="deleteClient(client.id)" class="btn btn-danger btn-sm">Delete</a>

                </td>
            </tr>
            </tbody>
        </table>
        <div v-else class="text-center">
            You have no clients yet.
        </div>
    </div>
</template>
<script>
export default {
    props: {
        clients: {
            type: Object
        }
    },
    methods: {
        async deleteClient(id) {
            await axios.delete(`/clients/${id}`);
            window.location.reload();
        }
    }
}
</script>

