<template>
    <div style="background-color: #fff;">
        <div class="container order-page" id="order-page">
            <h1 class="order-block-title">Заказ номера</h1>
            <div class="row">

                <div class="col-12 col-md-7">
                    <div v-if="views.constructor" class="order-constructor">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-4">
                                    <label class="form-label mb-1">Транспорт</label>
                                    <select v-model="selected.transport" @change="changeTransport()" class="form-select form-select-lg">
                                        <option value="avto">Автомобиль</option>
                                        <option value="moto">Мотоцикл</option>
                                        <option value="pricep">Прицеп</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div v-if="selected.transport" class="mb-3">
                                    <label class="form-label mb-1">Госномер <i @click="openStsModal()">?</i></label>
                                    <template v-if="selected.transport == 'avto'">
                                        <input v-model="number" v-maska="{ mask: 'Z###ZZ', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" id="number_input" placeholder="а000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                                    </template>
                                    <template v-if="selected.transport == 'moto'">
                                        <input v-model="number" v-maska="{ mask: '####ZZ', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" id="number_input" placeholder="0000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                                    </template>
                                    <template v-if="selected.transport == 'pricep'">
                                        <input v-model="number" v-maska="{ mask: 'ZZ####', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" id="number_input" placeholder="аа0000" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                                    </template>
                                </div>
                                <div v-else class="mb-3">
                                    <label class="form-label mb-1">Госномер</label>
                                    <input disabled placeholder="а000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div v-if="selected.transport" class="mb-3">
                                    <label class="form-label mb-1">Регион</label>
                                    <input v-model="numberRegion" v-maska="{ mask: '###', tokens: { '###': { pattern: /[0-9]/ }}}" class="form-control form-control-lg">
                                </div>
                                <div v-else class="mb-3">
                                    <label class="form-label mb-1">Регион</label>
                                    <input disabled class="form-control form-control-lg">
                                </div>
                            </div>
                        </div>

                        <div v-if="selected.transport" class="order-form-item">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <label class="form-label mb-1">Тип номера</label>
                                    <select v-model="selected.plate" @change="changePlate()" class="form-select mb-3">
                                        <option v-for="plate in plates" :key="'plate_' + plate.id" :value="plate">{{ plate.name }}</option>
                                    </select>

                                    <div v-if="selected.plate.id == 1 || selected.plate.id == 2 || selected.plate.id == 7 || selected.plate.id == 8" class="form-check form-switch mt-2">
                                        <input v-model="selected.zhirniy" class="form-check-input" type="checkbox" value="1" id="boldSwitch">
                                        <label class="form-check-label" for="boldSwitch">жирный шрифт</label>
                                    </div>

                                    <div v-if="selected.plate.id == 1 || selected.plate.id == 2 || selected.plate.id == 7 || selected.plate.id == 8" class="form-check form-switch mt-2">
                                        <input v-model="selected.bez_otverstiy" class="form-check-input" type="checkbox" value="1" id="holesSwitch">
                                        <label class="form-check-label" for="holesSwitch">без отверстий</label>
                                    </div>

                                    <div v-if="selected.plate.id == 1 || selected.plate.id == 2" class="form-check form-switch mt-2">
                                        <input v-model="selected.komplekt" class="form-check-input" type="checkbox" value="1" id="komplSwitch">
                                        <label class="form-check-label" for="komplSwitch">комплект (2 номера)</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="order-plate-preview">
                                        <Avto v-if="selected.plate.id == 1 || selected.plate.id == 2" :number="number" :numberRegion="numberRegion" :selected="selected" />
                                        <AvtoKv v-if="selected.plate.id == 3 || selected.plate.id == 4" :number="number" :numberRegion="numberRegion" :selected="selected" />

                                        <Moto v-if="selected.plate.id == 5 || selected.plate.id == 6" :number="number" :numberRegion="numberRegion" :selected="selected" />
                                        
                                        <Pricep v-if="selected.plate.id == 7 || selected.plate.id == 8" :number="number" :numberRegion="numberRegion" :selected="selected" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="price > 0" class="text-center mb-4">
                            <h5 v-if="selected.transport" class="mt-4 text-center">{{ price }} руб.</h5>
                            <button @click="saveOrderItem()" class="btn btn-standard mt-1">Добавить к заказу</button>
                        </div>
                    </div>

                    <div v-if="views.orderFields" class="row">
                        <div v-if="errors.length" class="alert alert-danger mb-4" role="alert">
                            Заполните все поля
                        </div>

                        <div class="col-12 mb-4">
                            <div class="form-check form-check-inline">
                                <input v-model="clientType" class="form-check-input" type="radio" value="fz">
                                <label class="form-check-label" for="inlineRadio1">физ. лицо</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="clientType" class="form-check-input" type="radio" value="ur">
                                <label class="form-check-label" for="inlineRadio2">юр. лицо</label>
                            </div>
                        </div>

                        <div v-if="clientType == 'fz'" class="col-12 col-md-6">
                            <label class="form-label">Имя</label>
                            <input v-model="name" type="text" class="form-control mb-4">
                        </div>

                        <div v-if="clientType == 'ur'" class="col-12 col-md-12">
                            <label class="form-label">Наименование организации</label>
                            <input v-model="company" type="text" class="form-control mb-3">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Телефон</label>
                            <input v-model="tel" @keypress="onlyNumber" type="text" class="form-control mb-4">
                        </div>
                        <div v-if="clientType == 'ur'" class="col-12 col-md-6">
                            <label class="form-label">E-mail</label>
                            <input v-model="email" type="text" class="form-control mb-4">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <div class="order-list">
                        <p class="order-list-title">Ваш заказ</p>
                        <ul>
                            <li v-for="orderItem in orderList">
                                <div class="row">
                                    <div class="col-6">
                                        <button @click="removeOrderItem(orderItem.uid)" class="btn btn-del">&times;</button>
                                        {{ orderItem.number }}
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ orderItem.price }} руб.
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <h4 v-if="orderList.length" class="order-total-price text-center">{{ priceTotal }} руб.</h4>
                        <div v-else class="text-center text-muted mb-4">Заказ пуст</div>
                        <div class="order-buttons text-center">
                            <button v-if="orderList.length && views.constructor == false" @click="addAnotherNumber()" class="btn btn-lg btn-standard btn-standard-outline">Добавить еще номер</button>
                            <button v-if="orderList.length" @click="saveOrder()" class="btn btn-lg btn-standard">Оформить заказ</button>
                        </div>
                    </div>
                    <div class="disclaimer">
                        <p>Информация, размещенная на сайте, носит справочно-информационный характер и не является публичной офертой.</p>
                        <p>Нажимая кнопку "Оформить заказ", вы соглашаетесь с обработкой ваших персональных данных и <a href="/policy" target="_blank">политикой конфиденциальности</a> сайта.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
    import { maska } from 'maska'

    import Avto from './comps/Avto.vue'
    import AvtoKv from './comps/AvtoKv.vue'
    import Moto from './comps/Moto.vue'
    import Pricep from './comps/Pricep.vue'

    export default {
        directives: { maska },
        props: ['current_city'],
        data() {
            return {
                plates: [],

                number: '',
                numberRegion: '',

                clientType: 'fz',
                name: '',
                tel: '',
                email: '',
                company: '',
                orderList: [],
                city: '',

                selected: {
                    transport: 'avto',
                    plate: '',
                    komplekt: false,
                    zhirniy: false,
                    bez_otverstiy: false,
                },

                errors: [],

                views: {
                    constructor: true,
                    orderFields: false,
                }
            }
        },
        computed: {
            price() {
                if(!this.selected.plate) {
                    return 0
                }

                if(this.selected.zhirniy) {
                    if(this.selected.komplekt) {
                        return this.selected.plate.prices[0].zhirniy_komplekt
                    }

                    return this.selected.plate.prices[0].zhirniy
                }

                if(this.selected.bez_otverstiy) {
                    if(this.selected.komplekt) {
                        return this.selected.plate.prices[0].bez_otverstiy_komplekt
                    }
                    
                    return this.selected.plate.prices[0].bez_otverstiy
                }

                if(this.selected.komplekt) {
                    return this.selected.plate.prices[0].komplekt
                }
                
                return this.selected.plate.prices[0].odin
            },
            priceTotal() {
                if(this.orderList.length) {
                    return this.orderList.reduce((n, {price}) => n + price, 0)
                }
            }
        },
        created() {
            console.log(this.current_city.id)

            if(this.$route.params.transport === 'avto') {
                this.selected.transport = 'avto'
            }
            if(this.$route.params.transport === 'moto') {
                this.selected.transport = 'moto'
            }
            if(this.$route.params.transport === 'pricep') {
                this.selected.transport = 'pricep'
            }

            this.clientType = this.$route.params.kto

            ym(86309721, 'hit', `/order/fz/${this.$route.params.transport}/${this.$route.params.plate}`, {
                title: 'Заказ номера',
                referer: `http://номерус.рф/order/fz/${this.$route.params.transport}/${this.$route.params.plate}`
            });

            if(this.$route.params.transport === 'avto') {
                if(this.$route.params.plate == 1) {
                    ym(86309721,'reachGoal','zakaz_obichni_nomer')
                }
                if(this.$route.params.plate == 2) {
                    ym(86309721,'reachGoal','zakaz_bf')
                }
                if(this.$route.params.plate == 3) {
                    ym(86309721,'reachGoal','zakaz_kvadrat')
                }
            }
            if(this.$route.params.transport == 'moto') {
                ym(86309721,'reachGoal','zakaz_mtckl')
            }
            if(this.$route.params.transport == 'pricep') {
                ym(86309721,'reachGoal','zakaz_pricep')
            }

            axios.get('/api/city-detect/0')
            .then((response => {
                this.city = response.data.city
                this.loadPlates()
            }))
        },
        methods: {
            loadPlates() {
                axios.get(`/api/plates/${this.selected.transport}/${this.city.id}`)
                .then(response => {
                    this.plates = response.data
                    this.selected.plate = this.plates[0]

                    if(this.selected.transport == this.$route.params.transport) {
                        if(this.$route.params.plate) {
                            this.selected.plate = this.plates.find(plate => plate.id == this.$route.params.plate)
                        }
                    }
                })
            },
            changeTransport() {
                this.number = ''
                this.numberRegion = ''
                this.loadPlates()
                this.changePlate()
            },
            changePlate() {
                this.selected.zhirniy = false
                this.selected.bez_otverstiy = false
                this.selected.komplekt = false
            },
            saveOrderItem() {
                if(!this.number) {
                    return
                }
                if(!this.numberRegion) {
                    return
                }

                this.views.constructor = false
                this.views.orderFields = true

                axios.post(`/api/order-item`, {
                        transport: this.selected.transport,
                        plate: this.selected.plate.name,
                        komplekt: this.selected.komplekt,
                        number: this.number + this.numberRegion,
                        zhirniy: this.selected.zhirniy,
                        bez_otverstiy: this.selected.bez_otverstiy,
                        price: this.price,
                    })
                .then(response => (
                    this.changeTransport(),
                    this.orderList.push(response.data)
                ))
                .catch((error) => {
                    if(error.response) {
                        for(var key in error.response.data.errors){
                            console.log(key)
                        }
                    }
                })
            },
            addAnotherNumber() {
                this.changeTransport()

                this.views.constructor = true
                this.views.orderFields = false
            },
            onlyNumber ($event) {
                console.log($event)
                
                let mask = [1,2,3,4,5,6,7,8,9,0,'+','-','(',')']
                let key = $event.key

                if(!mask.includes(key)) {
                    $event.preventDefault()
                }
            },
            saveOrder() {
                this.errors = []

                if(this.clientType == 'fz') {
                    if(!this.name) {
                        this.errors.push(1)
                    }
                    if(!this.tel) {
                        this.errors.push(1)
                    }
                    if(this.errors.length) {
                        return
                    }

                    axios.post(`/api/order`, {
                        client_type: this.clientType,
                        tel: this.tel,
                        name: this.name,
                        price: this.priceTotal,
                        orderItems: this.orderList.map( (item) => item.uid ),
                        city: this.city.id
                    })
                    .then(response => (
                        this.$router.push({name: 'OrderComplete'})
                    ))
                    .catch((error) => {
                        if(error.response) {
                            for(var key in error.response.data.errors){
                                console.log(key)
                            }
                        }
                    })
                }

                if(this.clientType == 'ur') {
                    if(!this.company) {
                        this.errors.push(1)
                    }
                    if(!this.tel) {
                        this.errors.push(1)
                    }
                    if(!this.email) {
                        this.errors.push(1)
                    }
                    if(this.errors.length) {
                        return
                    }
                    
                    axios.post(`/api/order`, {
                        client_type: this.clientType,
                        tel: this.tel,
                        email: this.email,
                        company: this.company,
                        price: this.priceTotal,
                        orderItems: this.orderList.map( (item) => item.uid ),
                        city: this.city.id
                    })
                    .then(response => (
                        this.$router.push({name: 'OrderComplete'})
                    ))
                    .catch((error) => {
                        if(error.response) {
                            for(var key in error.response.data.errors){
                                console.log(key)
                            }
                        }
                    })
                }
            },
        },
        components: {
            Avto,
            AvtoKv,
            Moto,
            Pricep
        }
    }
</script>