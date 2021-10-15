<template>
    <div style="background-color: #fff;">
        <div class="container order-page" id="order-page">
            <h1 class="order-block-title">Заказ номера</h1>
            <div class="row">

                <div class="col-12 col-md-7">
                    <div v-if="constructor" class="order-constructor">
                        <div class="row">
                            <div class="col-12 col-md-6">
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
                            <div class="col-12 col-md-2">
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
                                    <select v-model="selected_type" @change="selectType()" class="form-select mb-3">
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
                                    <div v-if="selected_type && selected_type.id && selected_type.komplekt && selected_type.komplekt.length > 0" class="form-check form-switch mt-2">
                                        <input v-model="add_komplekt" @change="addKomplekt()" class="form-check-input" type="checkbox" value="1" id="komplSwitch">
                                        <label class="form-check-label" for="komplSwitch">комплект (2 номера) <!--<small v-if="selected_komplekt_type">↳ {{ selected_type.name }}<br>↳ {{ selected_komplekt_type.name }}</small>--></label>
                                        <!--<input v-model="add_komplekt" @change="addKomplekt()" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Заказать комплект (+ 1шт.)
                                        </label>-->
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

                        <div v-if="client_type == 'ur'" class="col-12 col-md-12">
                            <label id="company_label" class="form-label">Наименование организации</label>
                            <input v-model="company" id="company_input" type="text" class="form-control mb-3">
                        </div>

                        <div class="col-12 col-md-6">
                            <label id="tel_label" class="form-label">Телефон</label>
                            <input v-model="tel" id="tel_input" type="text" class="form-control mb-4">
                        </div>
                        <div v-if="client_type == 'ur'" class="col-12 col-md-6">
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
                selected_komplekt_type_name: '',

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
                company: '',
            }
        },
        created() {
            axios
                .get('/api/transports')
                .then((response => {
                    this.transports = response.data

                    if(this.$route.params.transport === 'legkovoy') {
                        this.selected_transport =  this.transports[0]
                    }
                    if(this.$route.params.transport === 'moto') {
                        this.selected_transport =  this.transports[1]
                    }
                    if(this.$route.params.transport === 'pricep') {
                        this.selected_transport =  this.transports[2]
                    }

                    axios
                    .get(`/api/${this.$parent.current_city.id}/transport/${this.selected_transport.id}/types`)
                    .then((response => {
                        this.types = response.data
                        this.types.forEach((type) => {
                            if(type.namecode == this.$route.params.type) {
                                this.selected_type = type
                                this.selectType()
                            }
                        })
                    }));

                }));
        },
        methods: {
            selectTransport() {
                axios
                .get(`/api/${this.$parent.current_city.id}/transport/${this.selected_transport.id}/types`)
                .then((response => {
                    this.types = response.data
                    this.selected_type = response.data[0]
                    this.selectType()
                }));
                this.number = ''
                this.number_region = ''
            },
            selectType() {
                if(this.selected_type && this.selected_type.id) {
                    if(this.selected_type.komplekt && this.selected_type.komplekt.length > 0) {
                        if(this.selected_type.default_komplekt == true) {
                            this.add_komplekt = true
                            this.selected_komplekt_type = this.selected_type.komplekt[0]
                            this.selected_komplekt_type_name = this.selected_type.komplekt[0].name
                        } else {
                            this.add_komplekt = false
                            this.selected_komplekt_type = ''
                            this.selected_komplekt_type_name = ''
                        }
                    } else {
                        this.add_komplekt = false
                        this.selected_komplekt_type = ''
                        this.selected_komplekt_type_name = ''
                    }
                    this.bold = false,
                    this.noholes = false,
                    this.priceCalculate()
                }
            },
            addKomplekt() {
                if(this.add_komplekt == true) {
                    this.selected_komplekt_type = this.selected_type.komplekt[0]
                    this.selected_komplekt_type_name = this.selected_type.komplekt[0].name
                    this.priceCalculate()
                } else {
                    this.selected_komplekt_type = ''
                    this.selected_komplekt_type_name = ''
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
                            komplekt_type: this.selected_komplekt_type_name,
                            number: this.number + this.number_region,
                            bold: this.bold,
                            noholes: this.noholes,
                            price: this.price,
                        })
                    .then(response => (
                        console.log(response),
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
                    document.querySelectorAll('.form-label').forEach.call(document.querySelectorAll('.form-label'), function (el) {
                        el.classList.remove('text-danger')
                    });
                    document.querySelectorAll('.form-control').forEach.call(document.querySelectorAll('.form-control'), function (el) {
                        el.classList.remove('border-danger')
                    });

                    if(
                        this.name && this.name.length > 0 &&
                        this.tel && this.tel.length > 0
                    ) {
                        axios
                        .post(`/api/order`, {
                                client_type: this.client_type,
                                tel: this.tel,
                                name: this.name,
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
                    }
                }
                if(this.client_type == 'ur') {
                    document.querySelectorAll('.form-label').forEach.call(document.querySelectorAll('.form-label'), function (el) {
                        el.classList.remove('text-danger')
                    });
                    document.querySelectorAll('.form-control').forEach.call(document.querySelectorAll('.form-control'), function (el) {
                        el.classList.remove('border-danger')
                    });

                    if(
                        this.company && this.company.length > 0 &&
                        this.tel && this.tel.length > 0 &&
                        this.email && this.email.length > 0
                    ) {
                        axios
                        .post(`/api/order`, {
                                client_type: this.client_type,
                                tel: this.tel,
                                email: this.email,
                                company: this.company,
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
                    }
                }
            },
            addAnotherNumber() {
                this.selected_transport = ''
                this.selected_type = ''
                this.number = ''
                this.number_region = ''
                this.add_komplekt = true

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
                this.add_komplekt = true

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