<template>
    <div class="w-100">
        <div class="row">
            <div class="col-12 col-md-6">
                <label>1шт</label>
                <input v-model="odin" type="text" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-6">
                <label>Комплект</label>
                <input v-model="komplekt" type="text" class="form-control mb-3">
            </div>

            <div class="col-12 col-md-6">
                <label>Жирный 1шт</label>
                <input v-model="zhirniy" type="text" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-6">
                <label>Жирный комплект</label>
                <input v-model="zhirniy_komplekt" type="text" class="form-control mb-3">
            </div>

            <div class="col-12 col-md-6">
                <label>Без отверстий 1шт</label>
                <input v-model="bez_otverstiy" type="text" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-6">
                <label>Без отверстий комплект</label>
                <input v-model="bez_otverstiy_komplekt" type="text" class="form-control mb-3">
            </div>
        </div>
        
        <button @click="updateType()" class="btn btn-primary">Сохранить</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                price: {},

                odin: '',
                komplekt: '',
                zhirniy: '',
                zhirniy_komplekt: '',
                bez_otverstiy: '',
                bez_otverstiy_komplekt: '',
            }
        },
        created() {
            axios
            .get(`/api/admin/price/${this.$route.params.id}`)
            .then(response => (
                this.price = response.data,

                this.$parent.subheader = response.data.name,
                this.odin = response.data.odin,
                this.komplekt = response.data.komplekt,
                this.zhirniy = response.data.zhirniy,
                this.zhirniy_komplekt = response.data.zhirniy_komplekt,
                this.bez_otverstiy = response.data.bez_otverstiy,
                this.bez_otverstiy_komplekt = response.data.bez_otverstiy_komplekt
            ))
        },
        methods: {
            updateType() {
                axios
                .put(`/api/admin/price/${this.$route.params.id}/update`, {
                    odin: this.odin,
                    komplekt: this.komplekt,
                    zhirniy: this.zhirniy,
                    zhirniy_komplekt: this.zhirniy_komplekt,
                    bez_otverstiy: this.bez_otverstiy,
                    bez_otverstiy_komplekt: this.bez_otverstiy_komplekt
                })
                .then(response => (
                    this.$router.push({name: 'AdminPrices', params: {city: this.price.city.namecode}})
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