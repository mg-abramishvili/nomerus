<template>
    <div class="wrapper">
        {{$route.params.name}}
        <template v-if="$route.name === 'Home' || $route.name === 'OrderCreate'">
            <FrontLayout />
        </template>

        <template
            v-if="$route.name === 'Leads'">
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