<template>
    <div>
        <p>HomeScreen</p>
        <post-list></post-list>
    </div>
</template>

<script>
    import PostList from '../components/PostList';

    export default {
        name: "Home.vue",
        components: {
            PostList,
        },
        mounted() {
            console.log('homescreen mounted');
        },
        data () {},
        methods: {},
    }
</script>

<style scoped>

</style>