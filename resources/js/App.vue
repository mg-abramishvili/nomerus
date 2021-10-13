<template>
    <div class="wrapper">
        {{$route.params.name}}
        <template v-if="$route.name === 'Home' || $route.name === 'Gallery' || $route.name === 'OrderCreate' || $route.name === 'OrderComplete' || $route.name === 'Addresses' || $route.name === 'Reviews' || $route.name === 'About' || $route.name === 'Policy'">
            <FrontLayout />
        </template>

        <template
            v-if="$route.name === 'AdminOrders' || $route.name === 'AdminCertificates' || $route.name === 'AdminCertificateCreate' || $route.name === 'AdminGallery' || $route.name === 'AdminGalleryCreate' || $route.name === 'AdminAddresses' || $route.name === 'AdminAddressCreate' || $route.name === 'AdminTypes' || $route.name === 'AdminTypeEdit' || $route.name === 'AdminPartners' || $route.name === 'AdminLeads'">
            <AdminLayout />
        </template>
    </div>
</template>

<script>
    import FrontLayout from './components/front/FrontLayout.vue'
    import AdminLayout from './components/admin/AdminLayout.vue'
    export default {
        data() {
            return {
                
            }
        },
        created() {
            
        },
        methods: {
        },
        components: {
            FrontLayout,
            AdminLayout
        }
    }
</script>