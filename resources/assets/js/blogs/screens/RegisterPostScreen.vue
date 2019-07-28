<template>
    <div>
        <!--<div class="col-lg-12 col-centered">-->
            <div class="card-body">
                <b-form-input
                    v-model="title"
                    class="no-border title"
                    placeholder="title"
                    autocomplete="off"
                ></b-form-input>
            </div>
            <!--<div class="card-body">-->
                <!--<b-form-textarea-->
                    <!--v-model="content"-->
                    <!--class="no-border content"-->
                    <!--placeholder="content"-->
                    <!--rows="12"-->
                    <!--autocomplete="off"-->
                <!--&gt;</b-form-textarea>-->
            <!--</div>-->

            <div id="editor" class="content">
                <b-form-textarea
                    v-model="content"
                    @input="update"
                    rows="12"
                ></b-form-textarea>
                <div v-html="compiledMarkdown"></div>
            </div>

            <div class="card-body">
                <b-button variant="light" class="no-border" @click="register">register</b-button>
            </div>
        <!--</div>-->
    </div>
</template>

<script>
    import _ from 'lodash';
    import marked from 'marked';
    import apis from '../apis';
    export default {
        name: "RegisterPostScreen",
        data() {
            return {
                title: null,
                content: '# hello',
            };
        },
        computed: {
            compiledMarkdown: function () {
                return marked(this.content, { sanitize: true })
            }
        },
        methods: {
            register() {
                const params = {
                    title: this.title,
                    content: this.content,
                };

                apis.posts.register(params, response => {
                    this.$router.push('/');
                }, error => {
                    console.log(error);
                });
            },
            update: _.debounce(function (e) {
                this.content = e.target.value
            }, 300)
        },
    }
</script>

<style scoped>
    .no-border {
        border: 0;
        box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
    }

    .title {
        margin-top: 3em;
        font-size: 40px;
    }

    .content {
        padding: 20px;
        font-size: 25px;
        height: 10em;
    }

    textarea:hover,
    input:hover,
    textarea:active,
    input:active,
    textarea:focus,
    input:focus,
    button:focus,
    button:active,
    button:hover,
    label:focus,
    .btn:active,
    .btn.active
    {
        outline:0px !important;
        -webkit-appearance:none;
        box-shadow: none !important;
    }

    html, body, #editor {
        margin: 0;
        height: 100%;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        color: #333;
    }

    textarea, #editor div {
        display: inline-block;
        width: 49%;
        height: 100%;
        font-size: 25px;
        vertical-align: top;
        box-sizing: border-box;
        padding: 0 20px;
    }

    textarea {
        border: none;
        border-right: 1px solid #ccc;
        resize: none;
        outline: none;
        background-color: #f6f6f6;
        font-size: 25px;
        font-family: 'Monaco', courier, monospace;
        padding: 20px;
    }

    code {
        color: #f66;
    }
</style>