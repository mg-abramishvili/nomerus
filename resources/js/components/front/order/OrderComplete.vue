<template>
    <div class="order-complete">
        <h1 class="text-success">Заказ принят!</h1>
        <p>Мы скоро с вами свяжемся.</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        created() {
            ym(86309721, 'hit', `/order-complete`, {
                title: 'Заказ принят',
                referer: `http://номерус.рф/order-complete`
            });

            ym(86309721,'reachGoal','oformil_zakaz')
        },
        methods: {
        },
        components: {
        }
    }
</script>