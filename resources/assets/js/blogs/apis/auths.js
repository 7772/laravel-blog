import axios from 'axios';

export default {
    login(params, cb, errCb) {
        axios.post('/ajax/login', params)
            .then(cb)
            .catch(errCb);
    },
    logout(cb, errCb) {
        axios.post('/ajax/logout')
            .then(cb)
            .catch(errCb);
    },
    getMyInfo(cb, errCb) {
        axios.get('/ajax/me')
            .then(cb)
            .catch(errCb);
    },
};