<template>
    <div class="w-100">
        <select v-model="selected.city" @change="changeCity()" class="form-select form-select-lg mb-4">
            <template v-for="city in cities">
                <option v-if="city.addresses && city.addresses.length" :value="city.namecode">{{ city.name }}</option>
            </template>
        </select>

        <table class="table">
            <thead>
                <tr>
                    <th><small>Тип</small></th>
                    <th><small>1шт</small></th>
                    <th><small>Комплект</small></th>
                    <th><small>Жирный 1шт</small></th>
                    <th><small>Жирный комплект</small></th>
                    <th><small>Без отверстий 1шт</small></th>
                    <th><small>Без отверстий комплект</small></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="price in prices" :key="price.id">
                    <td>
                        <small v-if="price.plate.transport == 'avto'">автомобиль</small>
                        <small v-if="price.plate.transport == 'moto'">мотоцикл</small>
                        <small v-if="price.plate.transport == 'pricep'">прицеп</small>
                        <br>
                        {{ price.plate.name }}
                    </td>
                    <td>
                        {{ price.odin ? price.odin : '-' }}
                    </td>
                    <td>
                        {{ price.komplekt ? price.komplekt : '-' }}
                    </td>
                    <td>
                        {{ price.zhirniy ? price.zhirniy : '-' }}
                    </td>
                    <td>
                        {{ price.zhirniy_komplekt ? price.zhirniy_komplekt : '-' }}
                    </td>
                    <td>
                        {{ price.bez_otverstiy ? price.bez_otverstiy : '-' }}
                    </td>
                    <td>
                        {{ price.bez_otverstiy_komplekt ? price.bez_otverstiy_komplekt : '-' }}
                    </td>
                    <td class="text-end">
                        <router-link :to="{name: 'AdminPriceEdit', params: {id: price.id}}" class="btn btn-sm btn-outline-primary">правка</router-link>
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
                cities: [],
                prices: [],

                selected: {
                    city: '',
                },
            }
        },
        created() {
            this.$parent.subheader = 'Цены'
            
            axios
            .get(`/api/admin/prices/${this.$route.params.city}`)
            .then(response => (
                this.prices = response.data
            ))
            
            axios
            .get(`/api/admin/cities`)
            .then(response => (
                this.cities = response.data
            ))

            this.selected.city = this.$route.params.city
        },
        methods: {
            changeCity() {
                if(this.$route.params.city != this.selected.city) {
                    this.$router.push({name: 'AdminPrices', params: {city: this.selected.city}})
                }
            }
        },
        components: {
        }
    }
</script>
