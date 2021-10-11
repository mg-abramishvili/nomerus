import Home from './components/front/home/Home.vue';

import OrderCreate from './components/front/order/OrderCreate.vue';
import OrderComplete from './components/front/order/OrderComplete.vue';

import Orders from './components/admin/orders/OrdersAll.vue';
import Certificates from './components/admin/certificates/CertificatesAll.vue';
import CertificateCreate from './components/admin/certificates/CertificateCreate.vue';

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
        path: '/order-complete',
        name: 'OrderComplete',
        component: OrderComplete
    },
    {
        path: '/admin/orders',
        name: 'Orders',
        component: Orders
    },
    {
        path: '/admin/certificates',
        name: 'Certificates',
        component: Certificates
    },
    {
        path: '/admin/certificates/create',
        name: 'CertificateCreate',
        component: CertificateCreate
    },
];