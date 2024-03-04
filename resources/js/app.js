import '../libs/axios';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from '../libs/router';
import store from '../libs/store';
import {createApp} from 'vue';
import App from './App.vue';

import customersTable from './components/customers/show.vue';
import customerDelete from './components/customers/delete.vue';
import customerCreate from './components/customers/create.vue';


const app = createApp(App);
app.component('customers-table', customersTable)
app.component('customer-delete', customerDelete)
app.component('customer-create', customerCreate)
app.use(router).use(store);

app.mount("#app");