import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

import session from './modules/session';

const store = new Vuex.Store({
    modules: {
        session,
    },
    plugins: [createPersistedState()],
});

export default store;