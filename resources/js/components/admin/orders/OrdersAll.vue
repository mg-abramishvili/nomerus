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
                        <template v-if="order.passport">
                            {{ order.passport }}<br>
                        </template>

                        <template v-if="order.company">
                            {{ order.company }}<br>
                        </template>
                        <template v-if="order.inn">
                            {{ order.inn }}<br>
                        </template>
                        <template v-if="order.kpp">
                            {{ order.kpp }}<br>
                        </template>
                        <template v-if="order.ogrn">
                            {{ order.ogrn }}<br>
                        </template>
                        <template v-if="order.uraddress">
                            {{ order.uraddress }}<br>
                        </template>
                        <template v-if="order.faktaddress">
                            {{ order.faktaddress }}<br>
                        </template>
                        <template v-if="order.ras_schet">
                            {{ order.ras_schet }}<br>
                        </template>
                        <template v-if="order.bank">
                            {{ order.bank }}<br>
                        </template>
                        <template v-if="order.bik">
                            {{ order.bik }}<br>
                        </template>
                        <template v-if="order.korr">
                            {{ order.korr }}<br>
                        </template>
                        <template v-if="order.director">
                            {{ order.director }}<br>
                        </template>

                        {{ order.tel }}<br>
                        {{ order.email }}
                    </td>
                    <td>
                        {{ order.price }} руб.
                    </td>
                    <td>
                        <ul>
                            <li v-for="orderItem in order.order_items" :key="'orderItem_' + orderItem.id">
                                <div class="my-2">
                                    {{ orderItem.type }}<br>
                                    <template v-if="orderItem.komplekt_type">
                                        + {{ orderItem.komplekt_type }}<br>
                                    </template>
                                    <strong class="text-danger" style="text-transform: uppercase;">{{ orderItem.number }}</strong><br>
                                    <template v-if="orderItem.bold == true">
                                        жирный шрифт<br>
                                    </template>
                                    <template v-if="orderItem.noholes == true">
                                        <br>без отверстий
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
