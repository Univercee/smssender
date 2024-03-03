import axios from 'axios'
window.axios = axios
axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.interceptors.response.use((response) => {
    return response;
}, function (error) {
    return Promise.reject(error.response);
});
export default axios