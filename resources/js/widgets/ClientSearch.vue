<template>
    <div class="form-group">
        <label>Select Member</label>
        <multiselect
            label="full_name"
            v-model="client"
            placeholder="Type to search"
            :options="clients"
            :loading="isLoading"
            :internal-search="false"
            :max-height="600"
            @search-change="searchClients">

            <template slot="option" slot-scope="{option}">
                <div class="option_title">
                    <img class="avatar" :src="`/storage/clients/avatars/${option.avatar}`" alt="client profile image">
                    <span class="option_description">{{ option.full_name }}</span></div>
            </template>
        </multiselect>
    </div>
</template>
<script>
import Multiselect from 'vue-multiselect'
import _ from 'lodash';

export default {
    components: {
        Multiselect
    },
    data() {
        return {
            isLoading: false,
            client: null,
            clients: []
        }
    },
    watch: {
        client() {
            this.$emit('input', this.client);
        }
    },
    methods: {
        searchClients: _.debounce(async function (query) {
            this.isLoading = true
            let res = await axios.get(`/api/clients?name=${query}`)
            this.clients = res.data.data;
            this.isLoading = false;
        }, 500)
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>


