<template>
    <div>
    <p v-if="!!id">{{id}}</p>
    <p v-if="!!title">{{title}}</p>
    <p v-if="!!content">{{content}}</p>
    <p v-if="!!createdAt">{{createdAt}}</p>
    </div>
</template>

<script>
    import apis from '../apis';

    export default {
        name: "ShowPostScreen",
        data() {
            return {
                id: null,
                title: null,
                content: null,
                createdAt: null,
            };
        },
        mounted() {
            this.show();
        },
        methods: {
            show() {
                const {id} = this.$route.params;
                this.id = id;

                apis.posts.show(this.id, response => {
                    console.log(response);
                    const {post} = response.data;

                    this.id = post.id;
                    this.title = post.title;
                    this.content = post.content;
                    this.createdAt = post.created_at;
                }, error => {});
            },
        },
    }
</script>

<style scoped>

</style>