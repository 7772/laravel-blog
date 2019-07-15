<template>
    <div class="container">
        <ul>
            <a v-for="post in posts" @click="show(post.id)" href="#">
                <div style="width: 70em; height: 15em; overflow: hidden; margin-bottom: 50px; background-color: #f3f3f6; padding: 10px;">
                    <div class="" style="border-bottom: 2px solid #262933">
                        <div class="d-flex">
                            <h1 class="mr-auto p-2 align-self-center">{{ post.title }}</h1>
                            <h6 class="p-2 align-self-center">{{ post.created_at }}</h6>
                        </div>
                    </div>
                    <div style="padding-top: 10px;">
                        <h2>{{ post.content }}</h2>
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
            console.log('postlist mounted');
            this.getList();
        },
        methods: {
            getList() {
                let params = {page: this.page};

                apis.posts.getList(params, response => {
                    console.log('postlist response', response);
                    this.posts = response.data.posts;
                    this.resultMetadata = response.data.result_metadata;
                    // this.page = this.resultMetadata.current_page;
                }, error => {
                    alert(error);
                });
            },
        }
    }
</script>

<style scoped>

</style>