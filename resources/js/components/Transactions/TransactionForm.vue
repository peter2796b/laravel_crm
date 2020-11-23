<template>
    <div>
        <form method="post" action="/transactions">
            <client-search v-model="client"/>
            <p class="text-danger" v-if="errors.client_id">Please select a client</p>
            <div v-if="client.full_name" class="d-flex  selected_client">
                <img :src="`/storage/clients/avatars/${client.avatar}`" class="avatar"/>
                <div class="ml-5 align-self-center">{{ client.full_name }}</div>
            </div>
            <div class="form-group">
                <label>Amount</label>
                <money v-model="transaction.amount" v-bind="money" class="form-control"
                       :class="errors.amount?'is-invalid':''"></money>
                <p class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</p>
            </div>
            <div class="form-group">
                <label>Date Of Transaction</label>
                <datepicker required bootstrap-styling v-model="transaction.transaction_date"></datepicker>
                <p class="text-danger" v-if="errors.transaction_date">{{ errors.transaction_date[0] }}</p>
            </div>
            <div>
                <button class="btn btn-block btn-primary" type="button" @click="save">Save</button>
            </div>
        </form>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import ClientSearch from "../../widgets/ClientSearch";

export default {
    components: {
        ClientSearch,
        Datepicker,
    },
    props: {
        entity: {
            required: false,
            default: () => null
        },
        clientProp: {
            required: false,
            default: () => null
        },
    },
    data() {
        return {
            errors: [],
            client: {},
            transaction: {
                transaction_date: new Date(),
                amount: 0,
            },
            money: {
                decimal: '.',
                thousands: ',',
                prefix: '£ ',
                precision: 2,
                masked: false
            }
        }
    },
    created() {
        if (this.entity) {
            this.transaction = this.entity;
            this.transaction.amount /= 100;
            this.transaction.transaction_date = new Date(this.transaction.transaction_date);
            this.client = this.clientProp;
            this.client.full_name = this.client.first_name + ' ' + this.client.last_name;
        }

    },
    methods: {
        async createNew() {
            await axios.post('/transactions', {
                amount: this.transaction.amount,
                client_id: this.client.id,
                transaction_date: this.transaction.transaction_date.toISOString().split('T')[0]
            });
        },
        async updateTransaction(id) {
            await axios.put(`/transactions/${id}`, {
                amount: this.transaction.amount,
                client_id: this.client.id,
                transaction_date: this.transaction.transaction_date.toISOString().split('T')[0]
            });
        },


        async save() {
            try {
                if (this.transaction.id) {
                    await this.updateTransaction(this.transaction.id);
                } else {
                    await this.createNew();
                }
                window.location = '/transactions';
            } catch (err) {
                console.log(err);
                this.errors = err.response.data.errors;
            }


        }
    }
}
</script>
<style scoped>
.selected_client {
    padding: 1em;
    border-radius: 10px;
    background: whitesmoke;
    box-shadow: 3px 5px #f5f5f5;
    margin: 1.5em;
}
</style>

