require('../bootstrap');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import axios from 'axios';
// import Paginate from 'vuejs-paginate';
// import ToggleButton from 'vue-js-toggle-button'
// import wysiwyg from "vue-wysiwyg";
// import VModal from 'vue-js-modal';
import router from './router';
import store from './store';
import apis from './apis';

Vue.use(BootstrapVue);
Vue.prototype.$http = axios;

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

// Vue.use(ToggleButton);
// Vue.use(VModal);
// Vue.use(wysiwyg, {}); // config is optional. more below
// Vue.use(PrettyCheckbox);

// Vue.component('paginate', Paginate);
// Vue.component('pagination', require('laravel-vue-pagination'));

axios.interceptors.request.use(function (config) {
    const vuexFromLocalStorage = JSON.parse(localStorage.getItem('vuex'));
    const accessToken = (
        vuexFromLocalStorage &&
        vuexFromLocalStorage.session &&
        !!vuexFromLocalStorage.session.accessToken
    ) ? vuexFromLocalStorage.session.accessToken : null;

    if (accessToken) {
        config.headers.Authorization = `Bearer ${accessToken}`;
    }

    return config;
}, function (error) {
    return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if (
        error &&
        error.response &&
        error.response.status === 401
    ) {
        router.push('login');
        localStorage.removeItem('vuex');
        return true;
    }

    return Promise.reject(error);
});

const app = new Vue({
    router,
    components: {},
    store,
    created() {
        const hasAccessToken = this.$store.getters.hasAccessToken;

        if (hasAccessToken) {
            this.$store.dispatch('getMyInfo');
        }
    },
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
