import axios from 'axios';

export default {
    getList(params, cb, errCb) {
        axios.get('/ajax/posts', params)
            .then(cb)
            .catch(errCb);
    },
    register(params, cb, errCb) {
        axios.post('/ajax/posts/register', params)
            .then(cb)
            .catch(errCb);
    },
    show(id, cb, errCb) {
        axios.get('/ajax/posts/' + id)
            .then(cb)
            .catch(errCb);
    },
};