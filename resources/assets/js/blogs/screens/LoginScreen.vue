<template>
    <div id="login">
        <h1>Login</h1>
        <input type="email" name="email" v-model="input.email" placeholder="Email" />
        <input type="password" name="password" v-model="input.password" placeholder="Password" />
        <button type="button" v-on:click="login()">Login</button>
    </div>
</template>

<script>
    import apis from '../apis';

    export default {
        name: 'LoginScreen',
        data() {
            return {
                input: {
                    email: "",
                    password: ""
                }
            }
        },
        methods: {
            login() {
                const params = {
                    email: this.input.email,
                    password: this.input.password,
                };

                this.$store.dispatch('login', params)
                    .then(response => {
                        this.$router.push('/');
                    });
            }
        }
    }
</script>

<style scoped>
    #login {
        width: 500px;
        border: 1px solid #CCCCCC;
        background-color: #FFFFFF;
        margin: auto;
        margin-top: 200px;
        padding: 20px;
    }
</style>