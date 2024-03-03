import '../libs/axios';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from '../libs/router';
import store from '../libs/store';
import {createApp} from 'vue';
import App from './App.vue';


const app = createApp(App);
app.use(router).use(store);

app.mount("#app");