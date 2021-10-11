<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Файл</th>
                    <th>Название</th>
                    <th class="text-end"><router-link :to="{name: 'CertificateCreate'}" class="btn btn-sm btn-primary">Добавить</router-link></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="certItem in certificates" :key="'certItem_' + certItem.id">
                    <td style="width: 50px;">
                        <img :src="certItem.image" style="width: auto; height: 60px; display: block; margin: 0 auto;">
                    </td>
                    <td>
                        {{ certItem.name }}
                    </td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-danger">Удалить</button>
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
                certificates: [],
            }
        },
        created() {
            axios
            .get('/api/admin/certificates')
            .then(response => (
                this.certificates = response.data
            ))
        },
        methods: {
        },
        components: {
        }
    }
</script>
