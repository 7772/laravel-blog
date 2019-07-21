<template>
    <div>
        <top-navigation></top-navigation>
        <post-list></post-list>
    </div>
</template>

<script>
    import PostList from '../components/PostList';
    import TopNavigation from "../components/TopNavigation";

    export default {
        name: "Home.vue",
        components: {
            TopNavigation,
            PostList,
        },
        data () {
            return {};
        },
        methods: {},
    }
</script>

<style scoped>
</style>