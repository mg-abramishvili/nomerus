<template>
    <div class="w-100">
        <div class="row">
            <div class="col-12 col-md-4">
                <input v-model="min_price" type="text" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-4">
                <input v-model="price" type="text" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-4">
                <input v-model="max_price" type="text" class="form-control mb-3">
            </div>
        </div>
        
        <button @click="updateType()" class="btn btn-primary">Сохранить</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                type: {},

                min_price: '',
                price: '',
                max_price: '',
            }
        },
        created() {
            axios
            .get(`/api/admin/type/${this.$route.params.type_id}/${this.$route.params.city_id}`)
            .then(response => (
                this.type = response.data,
                this.$parent.subheader = response.data[0].name,
                this.min_price = response.data[0].cities[0].pivot.min_price,
                this.price = response.data[0].cities[0].pivot.price,
                this.max_price = response.data[0].cities[0].pivot.max_price
            ))
        },
        methods: {
            updateType() {
                axios
                .put(`/api/admin/type/${this.$route.params.type_id}/${this.$route.params.city_id}`, { min_price: this.min_price, price: this.price, max_price: this.max_price })
                .then(response => (
                    this.$router.push({name: 'AdminTypes', params: {city: 'ufa'}})
                ))
                .catch((error) => {
                    if(error.response) {
                        for(var key in error.response.data.errors){
                            console.log(key)
                        }
                    }
                });
            }
        },
        components: {
        }
    }
</script>