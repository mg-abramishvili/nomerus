<template>
    <div class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Данные</th>
                    <th>Сумма</th>
                    <th>Состав заказа</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in orders" :key="'order_' + order.id">
                    <td>
                        {{ order.created_at | moment }}
                    </td>
                    <td>
                        <template v-if="order.client_type === 'fz'">
                            физ. лицо<br>
                        </template>
                        <template v-if="order.client_type === 'ur'">
                            юр. лицо<br>
                        </template>

                        <template v-if="order.name">
                            {{ order.name }}<br>
                        </template>

                        <template v-if="order.company">
                            {{ order.company }}<br>
                        </template>

                        {{ order.tel }}<br>
                        
                        <template v-if="order.email">
                            {{ order.email }}
                        </template>

                        <template v-if="order.city">
                            {{ order.city.name }}
                        </template>
                    </td>
                    <td>
                        {{ order.price }} руб.
                    </td>
                    <td>
                        <ul>
                            <li v-for="orderItem in order.order_items" :key="'orderItem_' + orderItem.id">
                                <div class="my-2">
                                    <strong>
                                        <u v-if="orderItem.transport == 'avto'">Автомобиль</u>
                                        <u v-if="orderItem.transport == 'moto'">Мотоцикл</u>
                                        <u v-if="orderItem.transport == 'pricep'">Прицеп</u>
                                    </strong>
                                    <br>

                                    {{ orderItem.plate }}<br>

                                    <template v-if="orderItem.komplekt">
                                        комплект<br>
                                    </template>

                                    <strong class="text-danger" style="text-transform: uppercase;">{{ orderItem.number }}</strong><br>
                                    
                                    <template v-if="orderItem.zhirniy == true">
                                        жирный шрифт<br>
                                    </template>

                                    <template v-if="orderItem.bez_otverstiy == true">
                                        без отверстий<br>
                                    </template>

                                    {{ orderItem.price }} руб.
                                </div>
                            </li>
                        </ul>
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
                orders: [],
                moment: moment,
            }
        },
        created() {
            this.$parent.subheader = 'Заказы'
            axios
            .get('/api/admin/orders')
            .then(response => (
                this.orders = response.data
            ))
        },
        methods: {
        },
        filters: {
            moment: function (date) {
                return moment(date).format('DD.MM.YYYY');
            }
        },
        components: {
        }
    }
</script>
