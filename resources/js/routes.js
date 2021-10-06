import Home from './components/front/home/Home.vue';
import OrderCreate from './components/front/order/OrderCreate.vue';

import Orders from './components/admin/orders/OrdersAll.vue';

export const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/order/:kto/:transport',
        name: 'OrderCreate',
        component: OrderCreate
    },
    {
        path: '/admin/orders',
        name: 'Orders',
        component: Orders
    },
];