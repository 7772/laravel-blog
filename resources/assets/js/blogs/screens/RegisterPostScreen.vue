<template>
    <div class="container">
        <div class="col-lg-12 col-centered">
            <div class="card-body">
                <b-form-input
                    v-model="title"
                    class="no-border title"
                    placeholder="title"
                    autocomplete="off"
                ></b-form-input>
            </div>
            <div class="card-body">
                <b-form-textarea
                    v-model="content"
                    class="no-border content"
                    placeholder="content"
                    rows="12"
                    autocomplete="off"
                ></b-form-textarea>
            </div>
            <div class="card-body">
                <b-button variant="light" class="no-border" @click="register">register</b-button>
            </div>
        </div>
    </div>
</template>

<script>
    import apis from '../apis';
    export default {
        name: "RegisterPostScreen",
        data() {
            return {
                title: null,
                content: null,
            };
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
        font-size: 25px;
        height: 100%;
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
</style>