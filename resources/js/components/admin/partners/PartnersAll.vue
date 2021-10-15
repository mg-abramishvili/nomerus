<template>
    <div class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Логотип</th>
                    <th>Название</th>
                    <th class="text-end"><router-link :to="{name: 'AdminPartnerCreate'}" class="btn btn-sm btn-primary">Добавить</router-link></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="partner in partners" :key="'partner_' + partner.id">
                    <td>
                        <img :src="partner.image" style="width: auto; height: auto; max-width: 70px; max-height: 70px; display: block; margin: 0 auto;">
                    </td>
                    <td>
                        {{ partner.name }}
                    </td>
                    <td class="text-end">
                        <router-link :to="{name: 'AdminPartnerEdit', params: {id: partner.id}}" class="btn btn-sm btn-outline-danger">Изменить</router-link>
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
                partners: [],
            }
        },
        created() {
            this.$parent.subheader = 'Партнеры'
            axios
            .get('/api/admin/partners')
            .then(response => (
                this.partners = response.data
            ))
        },
        methods: {
        },
        components: {
        }
    }
</script>
