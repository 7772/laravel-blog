import axios from 'axios';

export default {
    login(params, cb, errCb) {
        axios.post('/ajax/login', params)
            .then(cb)
            .catch(errCb);
    }
};