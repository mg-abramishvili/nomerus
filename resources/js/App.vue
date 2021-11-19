<template>
    <div class="wrapper">
        {{$route.params.name}}
        <template v-if="$route.name === 'Home' || $route.name === 'Gallery' || $route.name === 'OrderCreate' || $route.name === 'OrderComplete' || $route.name === 'Addresses' || $route.name === 'Reviews' || $route.name === 'About' || $route.name === 'Policy'">
            <FrontLayout />
        </template>

        <template
            v-if="
                $route.name === 'AdminOrders' ||
                $route.name === 'AdminCertificates' ||
                $route.name === 'AdminCertificateCreate' ||
                $route.name === 'AdminCertificateEdit' ||
                $route.name === 'AdminGallery' ||
                $route.name === 'AdminGalleryCreate' ||
                $route.name === 'AdminAddresses' ||
                $route.name === 'AdminAddressCreate' ||
                $route.name === 'AdminAddressEdit' ||
                $route.name === 'AdminTypes' ||
                $route.name === 'AdminTypeEdit' ||
                $route.name === 'AdminPartners' ||
                $route.name === 'AdminPartnerCreate' ||
                $route.name === 'AdminPartnerEdit' ||
                $route.name === 'AdminLeads' ||
                $route.name === 'AdminServices' ||
                $route.name === 'AdminServiceEdit' ||
                $route.name === 'AdminTextEdit' ||
                $route.name === 'AdminLoginPage'
            ">
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
            /*(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");*/

            ym(86309721, 'init', {
                defer: true,
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
            })
        },
        methods: {
        },
        components: {
            FrontLayout,
            AdminLayout
        }
    }
</script>