<template>
    <div class="container post-container">
        <ul>
            <a v-for="post in posts" @click="navigateToPost(post.id)" href="#">
                <div style="width: 70em; height: 15em; overflow: hidden; margin-bottom: 50px; background-color: #f3f3f6; padding: 10px;">
                    <div class="" style="border-bottom: 1px solid #262933">
                        <div class="d-flex">
                            <h1 class="mr-auto p-2 align-self-center">{{ post.title }}</h1>
                            <h6 class="p-2 align-self-center">{{ post.created_at }}</h6>
                        </div>
                    </div>
                    <div style="padding-top: 10px;" v-html="compiledMarkdown(post.content)">
                        <!--<h3 v-html="compiledMarkdown">{{ compiledMarkdown(post.content) | truncate(100) }}</h3>-->
                    </div>
                </div>
            </a>
        </ul>

        <pagination :data="pagination" @pagination-change-page="getList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>

    </div>
</template>

<script>
    import marked from 'marked';
    import apis from '../apis';

    export default {
        name: "PostList",
        data () {
            return {
                pagination: {},
                posts: [],
            }
        },
        mounted() {
            this.getList();
        },
        methods: {
            getList(page = 1) {
                apis.posts.getList({page}, response => {
                    console.log(response);
                    this.pagination = response.data.posts;
                    this.posts = this.pagination.data;
                }, error => {
                    alert(error);
                });
            },
            navigateToPost(id) {
                this.$router.push({
                    path: `/posts/${id}`
                });
            },
            compiledMarkdown: function (content) {
                return marked(content, { sanitize: true })
            }
        }
    }
</script>

<style scoped>
    .post-container {
        margin-top: 100px;
    }

    a {color: rgba(6, 6, 6, 0.75);}         /* Unvisited link  */
    a:visited {color: rgba(0, 0, 0, 0.74);} /* Visited link    */
    a:hover {
        color: rgba(6, 6, 6, 0.60);
        text-decoration: none;
    }
    a:active {color: rgba(6, 6, 6, 0.60);}         /* Unvisited link  */

</style>