import axios from 'axios';

export default {
    search(params, cb, errCb) {
        axios.get('/posts', params)
            .then(cb)
            .catch(errCb);
    },
};