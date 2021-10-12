<template>
    <div class="w-100">
        <select v-model="city" class="form-select mb-3">
            <option v-for="city in cities" :key="'city_' + city.id" :value="city.id">{{ city.name }}</option>
        </select>
        <input v-model="name" type="text" class="form-control mb-3" placeholder="Название">
        <input v-model="tel" type="text" class="form-control mb-3" placeholder="Телефон">
        <input v-model="coordinates" type="text" class="form-control mb-3" placeholder="Координаты">
        <button @click="saveAddress()" class="btn btn-primary">Сохранить</button>
        <hr>
        <a href="https://yandex.ru/map-constructor/location-tool/" target="_blank">Сервис определения координат Яндекс</a>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            tel: '',
            city: '',
            coordinates: '',
            cities: [],
        }
    },
    created() {
        this.$parent.subheader = 'Новый адрес'
        axios
            .get('/api/admin/cities')
            .then(response => (
                this.cities = response.data
            ))
    },
    methods: {
        saveAddress() {
            if(this.name && this.city && this.coordinates) {
                axios
                .post(`/api/admin/addresses`, { name: this.name, tel: this.tel, city: this.city, coordinates: this.coordinates })
                .then(response => (
                    this.$router.push({name: 'AdminAddresses'})
                ))
                .catch((error) => {
                    if(error.response) {
                        for(var key in error.response.data.errors){
                            console.log(key)
                        }
                    }
                });
            } else {
                alert('Заполните поля')
            }
        },
    },
    components: {
    }
}
</script>