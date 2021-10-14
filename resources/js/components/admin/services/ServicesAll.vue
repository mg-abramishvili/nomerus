<template>
    <div class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Название</th>
                    <th class="text-end"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="service in services" :key="'service_' + service.id">
                    <td>
                        {{ service.name }}
                    </td>
                    <td class="text-end">
                        <router-link :to="{name: 'AdminServiceEdit', params: {id: service.id}}" class="btn btn-sm btn-outline-danger">Изменить</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                services: [],
            }
        },
        created() {
            this.$parent.subheader = 'Виды услуг'
            axios
            .get('/api/admin/services')
            .then(response => (
                this.services = response.data
            ))
        },
        methods: {
        },
        components: {
        }
    }
</script>
