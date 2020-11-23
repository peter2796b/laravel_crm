<template>
    <div>
        <table class="table" v-if="transactions.length">
            <thead>
            <tr>
                <th v-if="!hideClient" scope="col"></th>
                <th v-if="!hideClient" scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th v-if="!hideActions"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(transaction,index) in transactions">
                <td v-if="!hideClient">
                    <img :src="`/storage/clients/avatars/${transaction.client_avatar}`" class="avatar"/>
                </td>
                <td v-if="!hideClient">{{ transaction.client_name }}</td>
                <td>{{ transaction.amount }}</td>
                <td>{{ transaction.transaction_date }}</td>
                <td v-if="!hideActions" class="text-right">
                    <a :href="`/transactions/${transaction.id}/edit`" class="btn btn-success btn-sm">Edit</a>
                    <a @click="deleteTransaction(transaction.id)" class="btn btn-danger btn-sm">Delete</a>

                </td>
            </tr>
            </tbody>
        </table>
        <div v-else class="text-center">
            There are no transactions on the system
        </div>
    </div>
</template>
<script>
export default {
    props: {
        transactions: {
            type: Array
        },
        hideClient: {
            type: Boolean,
            default: false
        },
        hideActions: {
            type: Boolean,
            default: false
        }

    },
    methods: {
        async deleteTransaction(id) {
            await axios.delete(`/transactions/${id}`);
            window.location.reload();
        }
    }
}
</script>
<style>
.avatar {
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
</style>
