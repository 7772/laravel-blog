import Vuex from 'vuex';

import session from './modules/session';

const store = new Vuex.Store({
    modules: {
        session,
    },
});

export default store;