import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

import apis from '../../apis';


Vue.use(Vuex);
const session = {
    state: {
        isLoggedIn: false,
        accessToken: null,
        email: null,
        name: null,
    },
    actions: {
        login({dispatch, commit}, payload) {
            return new Promise((resolve, reject) => {
                apis.auths.login(payload, response => {
                    let auth = response.data.auth;
                    let accessToken = auth.access_token;
                    let userInfo = {
                        email: auth.email,
                        name: auth.name,
                    };

                    commit('setAccessToken', accessToken);
                    commit('setUserInfo', userInfo);

                    resolve(response);
                }, error => {
                    reject(error);
                });
            });
        },
    },
    mutations: {
        setAccessToken(state, accessToken) {
            state.accessToken = accessToken;
        },
        initAccessToken(state) {
            state.accessToken = null;
        },
        setUserInfo(state, params) {
            state.email = params.email;
            state.name = params.name;
        },
        initUserInfo(state) {
            state.email = null;
            state.name = null;
        }
    },
    // getters: {
    //     accessToken(state) {
    //         return state.accessToken;
    //     },
    // },
    plugins: [createPersistedState()],
}

export default session;

