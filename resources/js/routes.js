import Home from './components/front/home/Home.vue';

import Gallery from './components/front/gallery/Gallery.vue';
import Reviews from './components/front/reviews/Reviews.vue';
import About from './components/front/about/About.vue';
import Policy from './components/front/policy/Policy.vue';

import OrderCreate from './components/front/order/OrderCreate.vue';
import OrderComplete from './components/front/order/OrderComplete.vue';

import Addresses from './components/front/addresses/Addresses.vue';

import AdminOrders from './components/admin/orders/OrdersAll.vue';

import AdminCertificates from './components/admin/certificates/CertificatesAll.vue';
import AdminCertificateCreate from './components/admin/certificates/CertificateCreate.vue';
import AdminCertificateEdit from './components/admin/certificates/CertificateEdit.vue';

import AdminGallery from './components/admin/gallery/GalleryAll.vue';
import AdminGalleryCreate from './components/admin/gallery/GalleryCreate.vue';

import AdminAddresses from './components/admin/addresses/AddressesAll.vue';
import AdminAddressCreate from './components/admin/addresses/AddressCreate.vue';
import AdminAddressEdit from './components/admin/addresses/AddressEdit.vue';

import AdminTypes from './components/admin/types/TypesAll.vue';
import AdminTypeEdit from './components/admin/types/TypeEdit.vue';

import AdminPartners from './components/admin/partners/PartnersAll.vue';
import AdminLeads from './components/admin/leads/LeadsAll.vue';

import AdminServices from './components/admin/services/ServicesAll.vue';
import AdminServiceEdit from './components/admin/services/ServiceEdit.vue';

import AdminTextEdit from './components/admin/text/TextEdit.vue';

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
        path: '/addresses',
        name: 'Addresses',
        component: Addresses
    },
    {
        path: '/about',
        name: 'About',
        component: About
    },
    {
        path: '/policy',
        name: 'Policy',
        component: Policy
    },
    {
        path: '/reviews',
        name: 'Reviews',
        component: Reviews
    },
    {
        path: '/order/:kto/:transport/:type',
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
        path: '/admin/certificates/:id',
        name: 'AdminCertificateEdit',
        component: AdminCertificateEdit
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
    {
        path: '/admin/addresses',
        name: 'AdminAddresses',
        component: AdminAddresses
    },
    {
        path: '/admin/addresses/create',
        name: 'AdminAddressCreate',
        component: AdminAddressCreate
    },
    {
        path: '/admin/addresses/:id',
        name: 'AdminAddressEdit',
        component: AdminAddressEdit
    },
    {
        path: '/admin/types/:city',
        name: 'AdminTypes',
        component: AdminTypes
    },
    {
        path: '/admin/types/:type_id/:city_id/edit',
        name: 'AdminTypeEdit',
        component: AdminTypeEdit
    },
    {
        path: '/admin/partners',
        name: 'AdminPartners',
        component: AdminPartners
    },
    {
        path: '/admin/leads',
        name: 'AdminLeads',
        component: AdminLeads
    },
    {
        path: '/admin/services',
        name: 'AdminServices',
        component: AdminServices
    },
    {
        path: '/admin/service/:id',
        name: 'AdminServiceEdit',
        component: AdminServiceEdit
    },
    {
        path: '/admin/text',
        name: 'AdminTextEdit',
        component: AdminTextEdit
    },
];