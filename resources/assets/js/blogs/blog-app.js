require('../bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
// import Paginate from 'vuejs-paginate';
// import ToggleButton from 'vue-js-toggle-button'
// import wysiwyg from "vue-wysiwyg";
// import VModal from 'vue-js-modal';

import Welcome from './components/Welcome';
import PostList from "./components/PostList";

Vue.prototype.$http = axios;

Vue.use(VueRouter);
// Vue.use(ToggleButton);
// Vue.use(VModal);
// Vue.use(wysiwyg, {}); // config is optional. more below
// Vue.use(PrettyCheckbox);

// Vue.component('paginate', Paginate);
// Vue.component('pagination', require('laravel-vue-pagination'));


const routes = [
    { path: '/', component: PostList},
];

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    router,
    components: {},
    template: `
<div>
    <div class="content-wrapper">
        <section class="content container-fluid">
            <router-view></router-view>
        </section>
    </div>
</div>
`
}).$mount('#blog-app');
