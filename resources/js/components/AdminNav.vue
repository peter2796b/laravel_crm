<template>
    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
        <a class="nav-link" :class="isActive('home')?'active':''" href="/home">Dashboard</a>
        <a class="nav-link " :class="isActive('clients')?'active':''" href="/clients">Clients</a>
        <a class="nav-link " :class="isActive('transactions')?'active':''" href="/transactions">Transactions</a>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        isActive(path) {
            return window.location.pathname.includes(path);
        }
    }
}
</script>
