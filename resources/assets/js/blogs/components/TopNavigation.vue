<template>
    <b-navbar class="header" fixed="top" type="light" variant="light">
        <b-navbar-brand href="#">7772's Blog</b-navbar-brand>
        <router-link v-if="isLoggedIn" class="top-link" to="/posts/register">Register</router-link>
        <a v-if="isLoggedIn" class="top-link" @click="logout" href="#">Logout</a>
    </b-navbar>
</template>

<script>
    import apis from '../apis';

    export default {
        name: 'Navigation',
        data() {
            return {
                email: null,
                name: null,
            };
        },
        computed: {
            isLoggedIn() {
                return this.$store.getters.hasAccessToken;
            },
        },
        methods: {
            logout() {
                apis.auths.logout(response => {
                    this.$store.commit('initAccessToken');
                }, error => {
                    console.log(error);
                });
            },
        }
    }
</script>

<style scoped>
    .top-link {
        margin-left: 10px;
    }
</style>