<template>
    <div class="row">
        <top-navigation></top-navigation>
        <div class="container post-container">
            <section class="post-title">
                <h1 v-if="!!title">{{title}}</h1>
                <p v-if="!!createdAt">{{createdAt}}</p>
            </section>

            <section
                class="post-content"
                v-html="compiledMarkdown"
            >
            </section>

        </div>
    </div>
</template>

<script>
    import marked from 'marked';
    import apis from '../apis';
    import TopNavigation from '../components/TopNavigation';

    export default {
        name: "ShowPostScreen",
        components: {
            TopNavigation,
        },
        data() {
            return {
                id: null,
                title: null,
                content: '',
                createdAt: null,
            };
        },
        mounted() {
            this.show();
        },
        computed: {
            compiledMarkdown: function () {
                return marked(this.content, { sanitize: true })
            }
        },
        methods: {
            show() {
                const {id} = this.$route.params;
                this.id = id;

                apis.posts.show(this.id, response => {
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
    .post-container {
        margin-top: 10em;
    }

    .post-title {
        display: block;
        word-wrap: break-word;
        width: 100%;
    }

    .post-content {
        padding: 1em;
        display: block;
        word-wrap: break-word;
        width: 100%;
        height: auto;
    }
</style>