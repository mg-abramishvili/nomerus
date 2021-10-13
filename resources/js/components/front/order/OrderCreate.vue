<template>
    <div style="background-color: #fff;">
        <div class="container order-page" id="order-page">
            <h1 class="order-block-title">Заказ номера</h1>
            <div class="row">

                <div class="col-12 col-md-7">
                    <div v-if="constructor" class="order-constructor">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="mb-4">
                                    <label class="form-label mb-1">Транспорт</label>
                                    <select v-model="selected_transport" @change="selectTransport()" class="form-select form-select-lg">
                                        <option v-for="transport in transports" :key="'transport_' + transport.id" :value="transport">{{ transport.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div v-if="selected_transport && selected_transport.id" class="mb-3">
                                    <label id="number_label" class="form-label mb-1">Госномер</label>
                                    <template v-if="selected_transport.namecode === 'legkovoy'">
                                        <input v-model="number" v-maska="{ mask: 'Z###ZZ', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" id="number_input" placeholder="а000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                                    </template>
                                    <template v-if="selected_transport.namecode === 'moto'">
                                        <input v-model="number" v-maska="{ mask: '####ZZ', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" id="number_input" placeholder="0000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                                    </template>
                                    <template v-if="selected_transport.namecode === 'pricep'">
                                        <input v-model="number" v-maska="{ mask: 'ZZ####', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" id="number_input" placeholder="аа0000" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                                    </template>
                                </div>
                                <div v-else class="mb-3">
                                    <label class="form-label mb-1">Госномер</label>
                                    <input disabled placeholder="а000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div v-if="selected_transport && selected_transport.id" class="mb-3">
                                    <label id="number_region_label" class="form-label mb-1">Регион</label>
                                    <input v-model="number_region" v-maska="{ mask: '###', tokens: { '###': { pattern: /[0-9]/ }}}" id="number_region_input" class="form-control form-control-lg">
                                </div>
                                <div v-else class="mb-3">
                                    <label class="form-label mb-1">Регион</label>
                                    <input disabled class="form-control form-control-lg">
                                </div>
                            </div>
                        </div>

                        <div v-if="selected_transport && selected_transport.id" class="order-form-item">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <label class="form-label mb-1">Тип номера</label>
                                    <select v-model="selected_type" @change="selectType()" class="form-select">
                                        <option v-for="type in types" :key="'type_' + type.id" :value="type">{{ type.name }}</option>
                                    </select>
                                    <div v-if="selected_type.namecode === 'type1_with_flag' || selected_type.namecode === 'type1_without_flag' || selected_type.namecode === 'type2_with_flag' || selected_type.namecode === 'type2_without_flag'" class="form-check form-switch mt-2">
                                        <input v-model="bold" @change="changeBold()" class="form-check-input" type="checkbox" value="1" id="boldSwitch">
                                        <label class="form-check-label" for="boldSwitch">жирный шрифт</label>
                                    </div>
                                    <div v-if="selected_type.namecode === 'type1_with_flag' || selected_type.namecode === 'type1_without_flag' || selected_type.namecode === 'type2_with_flag' || selected_type.namecode === 'type2_without_flag'" class="form-check form-switch mt-2">
                                        <input v-model="noholes" @change="changeNoholes()" class="form-check-input" type="checkbox" value="1" id="holesSwitch">
                                        <label class="form-check-label" for="holesSwitch">без отверстий</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="order-plate-preview">
                                        <div v-if="selected_type.namecode === 'type1_with_flag' || selected_type.namecode === 'type1_without_flag'" class="type1_with_flag" :class="{ 'fw-bold' : bold == true}">               
                                            <div v-if="number && number.length > 0" class="numbers">
                                                <span>{{ number.slice(0, 1) }}</span>
                                                <span>{{ number.slice(1, 4) }}</span>
                                                <span>{{ number.slice(4, 6) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0 && number_region && number_region.length > 0" class="reg">
                                                <span>
                                                    {{ number_region }}
                                                </span>
                                                <div class="reg-inner">
                                                    <i>RUS</i>
                                                    <img v-if="selected_type.namecode === 'type1_with_flag'" src="/img/rus.svg"/>
                                                </div>
                                            </div>
                                            <div v-if="noholes == false" class="holes hole1"></div>
                                            <div v-if="noholes == false" class="holes hole2"></div>
                                        </div>
                                        <div v-if="selected_type.namecode === 'type1a' || selected_type.namecode === 'type1a_without_flag'" class="type1a">               
                                            <div v-if="number && number.length > 0" class="numbers">
                                                <span>{{ number.slice(0, 1) }}</span>
                                                <span>{{ number.slice(1, 4) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0" class="letters">
                                                <span>{{ number.slice(4, 6) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0 && number_region && number_region.length > 0" class="reg">
                                                <span>
                                                    {{ number_region }}
                                                </span>
                                                <div class="reg-inner">
                                                    <i>RUS</i>
                                                    <img v-if="selected_type.namecode === 'type1a'" src="/img/rus.svg"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="selected_type.namecode === 'type4' || selected_type.namecode === 'type4_without_flag' || selected_type.namecode === 'type4mini' || selected_type.namecode === 'type4mini_without_flag'" class="type4">               
                                            <div v-if="number && number.length > 0" class="numbers">
                                                <span>{{ number.slice(0, 4) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0" class="letters">
                                                <span>{{ number.slice(4, 6) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0 && number_region && number_region.length > 0" class="reg">
                                                <div class="reg-inner">
                                                    <i>RUS</i>
                                                    <img v-if="selected_type.namecode === 'type4' || selected_type.namecode === 'type4mini'" src="/img/rus.svg"/>
                                                </div>
                                                <span>
                                                    {{ number_region }}
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="selected_type.namecode === 'type2_with_flag' || selected_type.namecode === 'type2_without_flag'" class="type2_with_flag" :class="{ 'fw-bold' : bold == true}">               
                                            <div v-if="number && number.length > 0" class="numbers">
                                                <span>{{ number.slice(0, 1) }}</span>
                                                <span>{{ number.slice(1, 4) }}</span>
                                                <span>{{ number.slice(4, 6) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0 && number_region && number_region.length > 0" class="reg">
                                                <span>
                                                    {{ number_region }}
                                                </span>
                                                <div class="reg-inner">
                                                    <i>RUS</i>
                                                    <img v-if="selected_type.namecode === 'type2_with_flag'" src="/img/rus.svg"/>
                                                </div>
                                            </div>
                                            <div v-if="noholes == false" class="holes hole1"></div>
                                            <div v-if="noholes == false" class="holes hole2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="selected_type && selected_type.id && selected_type.komplekt && selected_type.komplekt.length > 0" class="form-check mb-3">
                            <input v-model="add_komplekt" @change="addKomplekt()" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Заказать комплект (+ 1шт.)
                            </label>
                        </div>

                        <div v-if="add_komplekt" class="order-form-item">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <template v-if="selected_transport && selected_type.komplekt && selected_type.komplekt.length > 0">
                                        <label class="form-label mb-1">Тип номера</label>
                                        <select v-model="selected_komplekt_type" @change="selectKomplektType()" class="form-select">
                                            <option v-for="type in selected_type.komplekt" :key="'type_' + type.id" :value="type">{{ type.name }}</option>
                                        </select>
                                        <div v-if="selected_komplekt_type.namecode === 'type1_with_flag' || selected_komplekt_type.namecode === 'type1_without_flag'" class="form-check form-switch mt-2">
                                            <input v-model="bold" @change="changeBold()" class="form-check-input" type="checkbox" value="1" id="boldSwitch">
                                            <label class="form-check-label" for="boldSwitch">жирный шрифт</label>
                                        </div>
                                        <div v-if="selected_komplekt_type.namecode === 'type1_with_flag' || selected_komplekt_type.namecode === 'type1_without_flag'" class="form-check form-switch mt-2">
                                            <input v-model="noholes" @change="changeNoholes()" class="form-check-input" type="checkbox" value="1" id="holesSwitch">
                                            <label class="form-check-label" for="holesSwitch">без отверстий</label>
                                        </div>
                                    </template>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="order-plate-preview">
                                        <div v-if="selected_komplekt_type.namecode === 'type1_with_flag' || selected_komplekt_type.namecode === 'type1_without_flag'" class="type1_with_flag">               
                                            <div v-if="number && number.length > 0" class="numbers">
                                                <span>{{ number.slice(0, 1) }}</span>
                                                <span>{{ number.slice(1, 4) }}</span>
                                                <span>{{ number.slice(4, 6) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0 && number_region && number_region.length > 0" class="reg">
                                                <span>
                                                    {{ number_region }}
                                                </span>
                                                <div class="reg-inner">
                                                    <i>RUS</i>
                                                    <img v-if="selected_komplekt_type.namecode === 'type1_with_flag'" src="/img/rus.svg"/>
                                                </div>
                                            </div>
                                            <div v-if="noholes == false" class="holes hole1"></div>
                                            <div v-if="noholes == false" class="holes hole2"></div>
                                        </div>
                                        <div v-if="selected_komplekt_type.namecode === 'type1a' || selected_komplekt_type.namecode === 'type1a_without_flag'" class="type1a">               
                                            <div v-if="number && number.length > 0" class="numbers">
                                                <span>{{ number.slice(0, 1) }}</span>
                                                <span>{{ number.slice(1, 4) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0" class="letters">
                                                <span>{{ number.slice(4, 6) }}</span>
                                            </div>
                                            <div v-if="number && number.length > 0 && number_region && number_region.length > 0" class="reg">
                                                <span>
                                                    {{ number_region }}
                                                </span>
                                                <div class="reg-inner">
                                                    <i>RUS</i>
                                                    <img v-if="selected_komplekt_type.namecode === 'type1a'" src="/img/rus.svg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <h5 v-if="selected_transport && selected_transport.id" class="mt-4 text-center">{{ price }} руб.</h5>
                            <button @click="saveOrderItem()" class="btn btn-standard mt-1">Добавить к заказу</button>
                        </div>
                    </div>

                    <div v-if="order_fields" class="row">
                        <div class="col-12 mb-4">
                            <div class="form-check form-check-inline">
                                <input v-model="client_type" class="form-check-input" type="radio" value="fz">
                                <label class="form-check-label" for="inlineRadio1">физ. лицо</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="client_type" class="form-check-input" type="radio" value="ur">
                                <label class="form-check-label" for="inlineRadio2">юр. лицо</label>
                            </div>
                        </div>

                        <div v-if="client_type == 'fz'" class="col-12 col-md-6">
                            <label id="name_label" class="form-label">Имя</label>
                            <input v-model="name" id="name_input" type="text" class="form-control mb-4">
                        </div>
                        <div v-if="client_type == 'fz'" class="col-12 col-md-6">
                            <label id="passport_label" class="form-label">Паспорт или водительские права</label>
                            <input v-model="passport" id="passport_input" type="text" class="form-control mb-4">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-12">
                            <label id="company_label" class="form-label">Наименование организации</label>
                            <input v-model="company" id="company_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-4">
                            <label id="inn_label" class="form-label">ИНН</label>
                            <input v-model="inn" id="inn_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-4">
                            <label id="kpp_label" class="form-label">КПП</label>
                            <input v-model="kpp" id="kpp_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-4">
                            <label id="ogrn_label" class="form-label">ОГРН</label>
                            <input v-model="ogrn" id="ogrn_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-6">
                            <label id="uraddress_label" class="form-label">Юридический адрес</label>
                            <input v-model="uraddress" id="uraddress_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-6">
                            <label id="faktaddress_label" class="form-label">Фактический адрес</label>
                            <input v-model="faktaddress" id="faktaddress_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-6">
                            <label id="ras_schet_label" class="form-label">Расчетный счет</label>
                            <input v-model="ras_schet" id="ras_schet_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-6">
                            <label id="bank_label" class="form-label">Наименование банка</label>
                            <input v-model="bank" id="bank_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-6">
                            <label id="korr_label" class="form-label">Корреспондентский счет</label>
                            <input v-model="korr" id="korr_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-6">
                            <label id="bik_label" class="form-label">БИК</label>
                            <input v-model="bik" id="bik_input" type="text" class="form-control mb-3">
                        </div>

                        <div v-if="client_type == 'ur'" class="col-12 col-md-12">
                            <label id="director_label" class="form-label">Директор</label>
                            <input v-model="director" id="director_input" type="text" class="form-control mb-3">
                        </div>

                        <div class="col-12 col-md-6">
                            <label id="tel_label" class="form-label">Телефон</label>
                            <input v-model="tel" id="tel_input" type="text" class="form-control mb-4">
                        </div>
                        <div class="col-12 col-md-6">
                            <label id="email_label" class="form-label">E-mail</label>
                            <input v-model="email" id="email_input" type="text" class="form-control mb-4">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <div class="order-list">
                        <p class="order-list-title">Ваш заказ</p>
                        <ul>
                            <li v-for="orderItem in order_list">
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
                        <h4 v-if="order_list && order_list.length > 0" class="order-total-price text-center">{{ price_total }} руб.</h4>
                        <div v-else class="text-center text-muted mb-4">Заказ пуст</div>
                        <div class="order-buttons text-center">
                            <button v-if="order_list && order_list.length > 0 && constructor == false" @click="addAnotherNumber()" class="btn btn-lg btn-standard btn-standard-outline">Добавить еще номер</button>
                            <button v-if="order_list && order_list.length > 0" @click="saveOrder()" class="btn btn-lg btn-standard">Оформить заказ</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import { maska } from 'maska'

    export default {
        directives: { maska },
        data() {
            return {
                transports: [],
                types: [],

                selected_transport: {},
                selected_type: {},

                add_komplekt: '',
                selected_komplekt_type: {},

                number: '',
                number_region: '',

                bold: false,
                noholes: false,

                price: '',
                price_total: '',

                order_list: [],

                constructor: true,
                order_fields: false,

                client_type: 'fz',
                name: '',
                tel: '',
                email: '',
                passport: '',
                company: '',
                inn: '',
                kpp: '',
                ogrn: '',
                uraddress: '',
                faktaddress: '',
                ras_schet: '',
                bank: '',
                bik: '',
                korr: '',
                director: '',
            }
        },
        created() {
            axios
                .get('/api/transports')
                .then((response => {
                    this.transports = response.data

                    if(this.$route.params.transport === 'legkovoy') {
                        this.selected_transport =  this.transports[0]
                        this.selectTransport()
                    }
                    if(this.$route.params.transport === 'moto') {
                        this.selected_transport =  this.transports[1]
                        this.selectTransport()
                    }
                }));
        },
        methods: {
            selectTransport() {
                axios
                .get(`/api/${this.$parent.current_city.id}/transport/${this.selected_transport.id}/types`)
                .then(response => (
                    this.types = response.data,
                    this.selected_type = this.types[0],
                    this.price = this.types[0].cities[0].pivot.price
                ));
                this.number = ''
                this.number_region = ''
                this.add_komplekt = false
            },
            selectType() {
                if(this.selected_type && this.selected_type.id) {
                    if(this.add_komplekt == true) {
                        this.selected_komplekt_type = this.selected_type.komplekt[0]
                    }
                    this.priceCalculate()
                }
            },
            addKomplekt() {
                if(this.add_komplekt == true) {
                    this.selected_komplekt_type = this.selected_type.komplekt[0]
                    this.priceCalculate()
                } else {
                    this.selected_komplekt_type = ''
                    this.price = this.selected_type.cities[0].pivot.price
                    this.priceCalculate()
                }
            },
            selectKomplektType() {
                this.priceCalculate()
            },
            changeBold() {
                this.priceCalculate()
            },
            changeNoholes() {
                this.priceCalculate()
            },
            priceCalculate() {
                if(this.add_komplekt == true) {
                    if(this.selected_type.id === this.selected_komplekt_type.id) {
                        if(this.bold == true || this.noholes == true) {
                            this.price = parseInt(this.selected_type.cities[0].pivot.max_price) + parseInt(this.selected_komplekt_type.cities[0].pivot.max_price)
                        } else {
                            this.price = parseInt(this.selected_type.cities[0].pivot.min_price) + parseInt(this.selected_komplekt_type.cities[0].pivot.min_price)
                        }
                    } else {
                        if(this.bold == true || this.noholes == true) {
                            this.price = parseInt(this.selected_type.cities[0].pivot.max_price) + parseInt(this.selected_komplekt_type.cities[0].pivot.max_price)
                        } else {
                            this.price = parseInt(this.selected_type.cities[0].pivot.price) + parseInt(this.selected_komplekt_type.cities[0].pivot.price)
                        }
                    }
                } else {
                    if(this.bold == true || this.noholes == true) {
                        this.price = parseInt(this.selected_type.cities[0].pivot.max_price)
                    } else {
                        this.price = parseInt(this.selected_type.cities[0].pivot.price)
                    }
                }
            },
            saveOrderItem() {
                document.getElementById('number_label').classList.remove('text-danger')
                document.getElementById('number_input').classList.remove('border-danger')
                
                document.getElementById('number_region_label').classList.remove('text-danger')
                document.getElementById('number_region_input').classList.remove('border-danger')

                if(this.selected_transport && this.selected_type && this.number && this.number_region) {
                    //document.getElementById('order-page').scrollIntoView();
                    this.constructor = false
                    this.order_fields = true
                    axios
                    .post(`/api/order-item`, {
                            transport: this.selected_transport.id,
                            type: this.selected_type.name,
                            komplekt_type: this.selected_komplekt_type.name,
                            number: this.number + this.number_region,
                            bold: this.bold,
                            noholes: this.noholes,
                            price: this.price,
                        })
                    .then(response => (
                        //console.log(response.data)
                        this.order_list.push(response.data),
                        this.price_total = this.order_list.reduce((n, {price}) => n + parseInt(price), 0)
                    ))
                    .catch((error) => {
                        if(error.response) {
                            for(var key in error.response.data.errors){
                                console.log(key)
                            }
                        }
                    });
                } else {
                    if(!this.number) {
                        document.getElementById('number_label').classList.add('text-danger')
                        document.getElementById('number_input').classList.add('border-danger')
                    }
                    if(!this.number_region) {
                        document.getElementById('number_region_label').classList.add('text-danger')
                        document.getElementById('number_region_input').classList.add('border-danger')
                    }
                }
            },
            removeOrderItem(uid) {
                axios
                .get(`/api/admin/order-item-del/${uid}`)
                .then((response => {
                    this.order_list = this.order_list.filter(function( obj ) {
                        return obj.uid !== uid
                    });
                    this.price_total = this.order_list.reduce((n, {price}) => n + parseInt(price), 0)
                    if(this.order_list.length == 0) {
                        this.constructor = true
                        this.order_fields = false
                        this.selected_transport = ''
                        this.selected_type = ''
                        this.number = ''
                        this.number_region = ''
                    }
                }));
            },
            saveOrder() {

                if(this.client_type == 'fz') {
                    document.getElementById('name_label').classList.remove('text-danger')
                    document.getElementById('name_input').classList.remove('border-danger')
                    document.getElementById('tel_label').classList.remove('text-danger')
                    document.getElementById('tel_input').classList.remove('border-danger')
                    document.getElementById('email_label').classList.remove('text-danger')
                    document.getElementById('email_input').classList.remove('border-danger')
                    document.getElementById('passport_label').classList.remove('text-danger')
                    document.getElementById('passport_input').classList.remove('border-danger')

                    if(
                        this.name && this.name.length > 0 &&
                        this.tel && this.tel.length > 0 &&
                        this.email && this.email.length > 0 &&
                        this.passport && this.passport.length > 0
                    ) {
                        axios
                        .post(`/api/order`, {
                                client_type: this.client_type,
                                tel: this.tel,
                                email: this.email,
                                name: this.name,
                                passport: this.passport,
                                price: parseInt(this.price_total),
                                orderItems: this.order_list.map( (item) => item.uid )
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
                        });
                    } else {
                        if(!this.name) {
                            document.getElementById('name_label').classList.add('text-danger')
                            document.getElementById('name_input').classList.add('border-danger')
                        }
                        if(!this.tel) {
                            document.getElementById('tel_label').classList.add('text-danger')
                            document.getElementById('tel_input').classList.add('border-danger')
                        }
                        if(!this.email) {
                            document.getElementById('email_label').classList.add('text-danger')
                            document.getElementById('email_input').classList.add('border-danger')
                        }
                        if(!this.passport) {
                            document.getElementById('passport_label').classList.add('text-danger')
                            document.getElementById('passport_input').classList.add('border-danger')
                        }
                    }
                }
                if(this.client_type == 'ur') {
                    document.getElementById('tel_label').classList.remove('text-danger')
                    document.getElementById('tel_input').classList.remove('border-danger')
                    document.getElementById('email_label').classList.remove('text-danger')
                    document.getElementById('email_input').classList.remove('border-danger')
                    document.getElementById('company_label').classList.remove('text-danger')
                    document.getElementById('company_input').classList.remove('border-danger')
                    document.getElementById('inn_label').classList.remove('text-danger')
                    document.getElementById('inn_input').classList.remove('border-danger')
                    document.getElementById('kpp_label').classList.remove('text-danger')
                    document.getElementById('kpp_input').classList.remove('border-danger')
                    document.getElementById('ogrn_label').classList.remove('text-danger')
                    document.getElementById('ogrn_input').classList.remove('border-danger')
                    document.getElementById('uraddress_label').classList.remove('text-danger')
                    document.getElementById('uraddress_input').classList.remove('border-danger')
                    document.getElementById('faktaddress_label').classList.remove('text-danger')
                    document.getElementById('faktaddress_input').classList.remove('border-danger')
                    document.getElementById('ras_schet_label').classList.remove('text-danger')
                    document.getElementById('ras_schet_input').classList.remove('border-danger')
                    document.getElementById('bank_label').classList.remove('text-danger')
                    document.getElementById('bank_input').classList.remove('border-danger')
                    document.getElementById('korr_label').classList.remove('text-danger')
                    document.getElementById('korr_input').classList.remove('border-danger')
                    document.getElementById('bik_label').classList.remove('text-danger')
                    document.getElementById('bik_input').classList.remove('border-danger')
                    document.getElementById('director_label').classList.remove('text-danger')
                    document.getElementById('director_input').classList.remove('border-danger')

                    if(
                        this.company && this.company.length > 0 &&
                        this.inn && this.inn.length > 0 &&
                        this.kpp && this.kpp.length > 0 &&
                        this.ogrn && this.ogrn.length > 0 &&
                        this.uraddress && this.uraddress.length > 0 &&
                        this.faktaddress && this.faktaddress.length > 0 &&
                        this.ras_schet && this.ras_schet.length > 0 &&
                        this.bank && this.bank.length > 0 &&
                        this.korr && this.korr.length > 0 &&
                        this.bik && this.bik.length > 0 &&
                        this.director && this.director.length > 0 &&
                        this.tel && this.tel.length > 0 &&
                        this.email && this.email.length > 0
                    ) {
                        axios
                        .post(`/api/order`, {
                                client_type: this.client_type,
                                tel: this.tel,
                                email: this.email,
                                company: this.company,
                                inn: this.inn,
                                kpp: this.kpp,
                                ogrn: this.ogrn,
                                uraddress: this.uraddress,
                                faktaddress: this.faktaddress,
                                ras_schet: this.ras_schet,
                                bank: this.bank,
                                korr: this.korr,
                                bik: this.bik,
                                director: this.director,
                                price: parseInt(this.price_total),
                                orderItems: this.order_list.map( (item) => item.uid )
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
                        });
                    } else {
                        if(!this.tel) {
                            document.getElementById('tel_label').classList.add('text-danger')
                            document.getElementById('tel_input').classList.add('border-danger')
                        }
                        if(!this.email) {
                            document.getElementById('email_label').classList.add('text-danger')
                            document.getElementById('email_input').classList.add('border-danger')
                        }
                        if(!this.company) {
                            document.getElementById('company_label').classList.add('text-danger')
                            document.getElementById('company_input').classList.add('border-danger')
                        }
                        if(!this.inn) {
                            document.getElementById('inn_label').classList.add('text-danger')
                            document.getElementById('inn_input').classList.add('border-danger')
                        }
                        if(!this.kpp) {
                            document.getElementById('kpp_label').classList.add('text-danger')
                            document.getElementById('kpp_input').classList.add('border-danger')
                        }
                        if(!this.ogrn) {
                            document.getElementById('ogrn_label').classList.add('text-danger')
                            document.getElementById('ogrn_input').classList.add('border-danger')
                        }
                        if(!this.uraddress) {
                            document.getElementById('uraddress_label').classList.add('text-danger')
                            document.getElementById('uraddress_input').classList.add('border-danger')
                        }
                        if(!this.faktaddress) {
                            document.getElementById('faktaddress_label').classList.add('text-danger')
                            document.getElementById('faktaddress_input').classList.add('border-danger')
                        }
                        if(!this.ras_schet) {
                            document.getElementById('ras_schet_label').classList.add('text-danger')
                            document.getElementById('ras_schet_input').classList.add('border-danger')
                        }
                        if(!this.bank) {
                            document.getElementById('bank_label').classList.add('text-danger')
                            document.getElementById('bank_input').classList.add('border-danger')
                        }
                        if(!this.korr) {
                            document.getElementById('korr_label').classList.add('text-danger')
                            document.getElementById('korr_input').classList.add('border-danger')
                        }
                        if(!this.bik) {
                            document.getElementById('bik_label').classList.add('text-danger')
                            document.getElementById('bik_input').classList.add('border-danger')
                        }
                        if(!this.director) {
                            document.getElementById('director_label').classList.add('text-danger')
                            document.getElementById('director_input').classList.add('border-danger')
                        }
                    }
                }
            },
            addAnotherNumber() {
                this.selected_transport = ''
                this.selected_type = ''
                this.number = ''
                this.number_region = ''
                this.add_komplekt = false

                this.constructor = true
                this.order_fields = false
            }
        },
        mounted() {
            this.$watch(
            "$parent.current_city.id",
            (new_value, old_value) => {
                this.selected_transport = ''
                this.selected_type = ''
                this.number = ''
                this.number_region = ''
                this.price = ''
                this.add_komplekt = false

                this.constructor = true
                this.order_fields = false

                this.order_list = []
            }
            );
        },
        components: {
        }
    }
</script>