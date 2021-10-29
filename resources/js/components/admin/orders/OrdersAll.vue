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

                        <template v-if="order.cities">
                            <template v-for="oc in order.cities">
                                {{ oc.name }}<br>
                            </template>
                        </template>
                    </td>
                    <td>
                        {{ order.price }} руб.
                    </td>
                    <td>
                        <ul>
                            <li v-for="orderItem in order.order_items" :key="'orderItem_' + orderItem.id">
                                <div class="my-2">
                                    <template v-for="transport in transports">
                                        <template v-if="transport.id == orderItem.transport"><strong><u>{{ transport.name }}</u></strong><br></template>
                                    </template>
                                    {{ orderItem.type }}<br>
                                    <template v-if="orderItem.komplekt_type">
                                        + {{ orderItem.komplekt_type }}<br>
                                    </template>
                                    <strong class="text-danger" style="text-transform: uppercase;">{{ orderItem.number }}</strong><br>
                                    <template v-if="orderItem.bold == true">
                                        жирный шрифт<br>
                                    </template>
                                    <template v-if="orderItem.noholes == true">
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
                transports: [],
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
            axios
            .get('/api/admin/transports')
            .then(response => (
                this.transports = response.data
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
