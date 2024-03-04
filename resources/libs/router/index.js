import { createRouter, createWebHashHistory } from 'vue-router';
import index from '../../js/views/index.vue';
import customers from '../../js/views/cusomers.vue'
import customerCreate from '../../js/views/customer-create.vue'

const routes = [
  {
    path: '/',
    name: 'index',
    component: index
  },
  {
    path: '/customers',
    name: 'customers',
    component: customers
  },
  {
    path: '/customers/create',
    name: 'customer-create',
    component: customerCreate
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router