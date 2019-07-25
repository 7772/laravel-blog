<template>
    <div class="container post-container">
        <ul>
            <a v-for="post in posts" @click="navigateToPost(post.id)" href="#">
                <div style="width: 70em; height: 15em; overflow: hidden; margin-bottom: 50px; background-color: #f3f3f6; padding: 10px;">
                    <div class="" style="border-bottom: 2px solid #262933">
                        <div class="d-flex">
                            <h1 class="mr-auto p-2 align-self-center">{{ post.title }}</h1>
                            <h6 class="p-2 align-self-center">{{ post.created_at }}</h6>
                        </div>
                    </div>
                    <div style="padding-top: 10px;">
                        <h2>{{ post.content | truncate(20) }}</h2>
                    </div>
                </div>
            </a>
        </ul>
    </div>
</template>

<script>
    import apis from '../apis';

    export default {
        name: "PostList",
        components: {},
        data () {
            return {
                page: 0,
                resultMetadata: null,
                posts: [],
            }
        },
        mounted() {
            this.getList();
        },
        methods: {
            getList() {
                let params = {page: this.page};

                apis.posts.getList(params, response => {
                    this.posts = response.data.posts;
                    this.resultMetadata = response.data.result_metadata;
                }, error => {
                    alert(error);
                });
            },
            navigateToPost(id) {
                this.$router.push({
                    path: `/posts/${id}`
                });
            },
        }
    }
</script>

<style scoped>
    .post-container {
        margin-top: 100px;
    }
</style>