<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Контакты</th>
                    <th>Сумма</th>
                    <th>Состав заказа</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in orders" :key="'order_' + order.id">
                    <td>
                        {{ order.created_at }}
                    </td>
                    <td>
                        {{ order.email }}
                        {{ order.tel }}
                    </td>
                    <td>
                        {{ order.price }} руб.
                    </td>
                    <td>
                        <ul>
                            <li v-for="orderItem in order.order_items" :key="'orderItem_' + orderItem.id">
                                {{ orderItem.number }}
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
            }
        },
        created() {
            axios
            .get('/api/admin/orders')
            .then(response => (
                this.orders = response.data
            ))
        },
        methods: {
        },
        components: {
        }
    }
</script>
