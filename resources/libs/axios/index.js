import axios from 'axios'
import router from '../router';
window.axios = axios
axios.defaults.headers.common['Content-Type'] = 'application/json';
let token = sessionStorage.getItem('token');
if(token) axios.defaults.headers.common.Authorization = 'Bearer ' + token;
axios.interceptors.response.use((response) => {
    return response;
}, function (error) {
    if(error.response.status == 401){
        router.push({name: 'index'})
    }
    return Promise.reject(error.response);
});
export default axios