<template>
    <div class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Город</th>
                    <th>Адрес</th>
                    <th>Телефон</th>
                    <th>Координаты</th>
                    <th class="text-end">
                        <router-link :to="{name: 'AdminAddressCreate'}" class="btn btn-sm btn-primary">Добавить</router-link>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="address in addresses" :key="'address_' + address.id">
                    <td>
                        {{ address.city.name }}
                    </td>
                    <td>
                        {{ address.name }}
                    </td>
                    <td>
                        {{ address.tel }}
                    </td>
                    <td>
                        {{ address.coordinates }}
                    </td>
                    <td>
                        <router-link :to="{name: 'AdminAddressEdit', params: {id: address.id}}" class="btn btn-sm btn-outline-danger">Изменить</router-link>
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
                addresses: [],
            }
        },
        created() {
            this.$parent.subheader = 'Адреса'
            axios
            .get('/api/admin/addresses')
            .then(response => (
                this.addresses = response.data
            ))
        },
        methods: {
        },
        components: {
        }
    }
</script>
