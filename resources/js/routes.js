import Home from './components/front/home/Home.vue';

import Gallery from './components/front/gallery/Gallery.vue';

import OrderCreate from './components/front/order/OrderCreate.vue';
import OrderComplete from './components/front/order/OrderComplete.vue';

import AdminOrders from './components/admin/orders/OrdersAll.vue';

import AdminCertificates from './components/admin/certificates/CertificatesAll.vue';
import AdminCertificateCreate from './components/admin/certificates/CertificateCreate.vue';

import AdminGallery from './components/admin/gallery/GalleryAll.vue';
import AdminGalleryCreate from './components/admin/gallery/GalleryCreate.vue';

export const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/gallery',
        name: 'Gallery',
        component: Gallery
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
        name: 'AdminOrders',
        component: AdminOrders
    },
    {
        path: '/admin/certificates',
        name: 'AdminCertificates',
        component: AdminCertificates
    },
    {
        path: '/admin/certificates/create',
        name: 'AdminCertificateCreate',
        component: AdminCertificateCreate
    },
    {
        path: '/admin/gallery',
        name: 'AdminGallery',
        component: AdminGallery
    },
    {
        path: '/admin/gallery/create',
        name: 'AdminGalleryCreate',
        component: AdminGalleryCreate
    },
];