<template>
    <div class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Тип</th>
                    <th>Цена (мин)</th>
                    <th>Цена (обычная)</th>
                    <th>Цена (макс)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="type in types" :key="'type_' + type.id">
                    <td>
                        {{ type.name }}
                    </td>
                    <td>
                        <template v-for="city in type.cities">
                            {{ city.pivot.min_price }} руб.
                        </template>
                    </td>
                    <td>
                        <template v-for="city in type.cities">
                            {{ city.pivot.price }} руб.
                        </template>
                    </td>
                    <td>
                        <template v-for="city in type.cities">
                            {{ city.pivot.max_price }} руб.
                        </template>
                    </td>
                    <td class="text-end">
                        <router-link :to="{name: 'AdminTypeEdit', params: {type_id: type.id, city_id: type.cities[0].id}}" class="btn btn-sm btn-outline-primary">правка</router-link>
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
                types: [],
            }
        },
        created() {
            this.$parent.subheader = 'Цены'
            axios
            .get(`/api/admin/types/${this.$route.params.city}`)
            .then(response => (
                this.types = response.data
            ))
        },
        methods: {
            updateType() {
                
            }
        },
        components: {
        }
    }
</script>
