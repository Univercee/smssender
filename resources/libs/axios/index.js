import axios from 'axios'
window.axios = axios
axios.defaults.headers.common['Content-Type'] = 'application/json';
let token = sessionStorage.getItem('token');
if(token) axios.defaults.headers.common.Authorization = 'Bearer ' + token;
axios.interceptors.response.use((response) => {
    return response;
}, function (error) {
    return Promise.reject(error.response);
});
export default axios