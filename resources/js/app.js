import '../libs/axios';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from '../libs/router';
import store from '../libs/store';
import {createApp} from 'vue';
import App from './App.vue';

import customerDelete from './components/customers/delete.vue';
import customerCreate from './components/customers/create.vue';
import notification from './components/notifications/show.vue';


const app = createApp(App);
app.component('customer-delete', customerDelete)
app.component('customer-create', customerCreate)
app.component('notification', notification)
app.use(router).use(store);

app.mount("#app");