require('../bootstrap');

import Vue from 'vue';
import axios from 'axios';
// import Paginate from 'vuejs-paginate';
// import ToggleButton from 'vue-js-toggle-button'
// import wysiwyg from "vue-wysiwyg";
// import VModal from 'vue-js-modal';
import router from './router';
import store from './store';

Vue.prototype.$http = axios;

// Vue.use(ToggleButton);
// Vue.use(VModal);
// Vue.use(wysiwyg, {}); // config is optional. more below
// Vue.use(PrettyCheckbox);

// Vue.component('paginate', Paginate);
// Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    router,
    components: {},
    store,
    created() {
        // let accessToken = this.$store.getters.accessToken();
        let accessToken = this.$store.state.session.accessToken;
        console.log(accessToken);
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
