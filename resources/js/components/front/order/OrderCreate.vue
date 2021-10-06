<template>
    <div style="background-color: #fff;">
    <div class="container order-page">
        <h1 class="order-block-title">Заказ номера</h1>

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
                    <label class="form-label mb-1">Гос. номер</label>
                    <template v-if="selected_transport.namecode === 'legkovoy'">
                        <input v-model="number" v-maska="{ mask: 'Z###ZZ', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" placeholder="а000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                    </template>
                    <template v-if="selected_transport.namecode === 'moto'">
                        <input v-model="number" v-maska="{ mask: '####ZZ', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" placeholder="0000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                    </template>
                </div>
                <div v-else class="mb-3">
                    <label class="form-label mb-1">Гос. номер</label>
                    <input disabled placeholder="а000аа" type="text" class="form-control form-control-lg" style="text-transform: uppercase;">
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div v-if="selected_transport && selected_transport.id" class="mb-3">
                    <label class="form-label mb-1">Регион</label>
                    <input v-model="number_region" v-maska="{ mask: '###', tokens: { '###': { pattern: /[0-9]/ }}}" class="form-control form-control-lg">
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
                </div>
                <div class="col-12 col-md-6">
                    <div class="order-plate-preview">
                        <div v-if="selected_type.namecode === 'type1_with_flag' || selected_type.namecode === 'type1_without_flag'" class="type1_with_flag">               
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
                        </div>
                        <div v-if="selected_type.namecode === 'type1a'" class="type1a">               
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
                                    <img src="/img/rus.svg"/>
                                </div>
                            </div>
                        </div>
                        <div v-if="selected_type.namecode === 'type4'" class="type4">               
                            <div v-if="number && number.length > 0" class="numbers">
                                <span>{{ number.slice(0, 4) }}</span>
                            </div>
                            <div v-if="number && number.length > 0" class="letters">
                                <span>{{ number.slice(4, 6) }}</span>
                            </div>
                            <div v-if="number && number.length > 0 && number_region && number_region.length > 0" class="reg">
                                <div class="reg-inner">
                                    <i>RUS</i>
                                    <img src="/img/rus.svg"/>
                                </div>
                                <span>
                                    {{ number_region }}
                                </span>
                            </div>
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
                        </div>
                        <div v-if="selected_komplekt_type.namecode === 'type1a'" class="type1a">               
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
                                    <img src="/img/rus.svg"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="selected_transport && selected_transport.id" class="row">
            <div class="col-12 col-md-6">
                <label class="form-labe">Имя</label>
                <input type="text" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-labe">Паспорт или водительские права</label>
                <input type="text" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-labe">Телефон</label>
                <input type="text" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-labe">E-mail</label>
                <input type="text" class="form-control mb-3">
            </div>
        </div>

        <h4 v-if="number && number.length > 0 && number_region && number_region.length > 0" class="mt-4 text-center">{{ price }} руб.</h4>
        
        <div v-if="number && number.length > 0 && number_region && number_region.length > 0" class="text-center mb-4">
            <button class="btn btn-lg btn-standard">Заказать</button>
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
                selected_komplekt_type: {},

                add_komplekt: '',

                number: '',
                number_region: '',

                price: '',
            }
        },
        created() {
            axios
                .get('/api/transports')
                .then(response => (
                    this.transports = response.data
                ));
        },
        methods: {
            selectTransport() {
                axios
                .get(`/api/transport/${this.selected_transport.id}/types`)
                .then(response => (
                    this.types = response.data,
                    this.selected_type = this.types[0],
                    this.price = this.types[0].price
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
                    this.price = this.selected_type.price
                }
            },
            selectKomplektType() {
                this.priceCalculate()
            },
            priceCalculate() {
                if(this.add_komplekt == true) {
                    if(this.selected_type.id === this.selected_komplekt_type.id) {
                        this.price = parseInt(this.selected_type.komplekt_same_type_price) + parseInt(this.selected_komplekt_type.komplekt_same_type_price)
                    } else {
                        this.price = parseInt(this.selected_type.komplekt_price) + parseInt(this.selected_komplekt_type.komplekt_price)
                    }
                } else {
                    this.price = parseInt(this.selected_type.price)
                }
            }
        },
        components: {
        }
    }
</script>