<template>
    <div class="container">
        <h1>Заказ номера</h1>

        <div class="row">
            <div class="col-12 col-md-8">
                <div class="mb-3">
                    <label class="form-label mb-1">Транспорт</label>
                    <select v-model="selected_transport" @change="selectTransport()" class="form-select">
                        <option v-for="transport in transports" :key="'transport_' + transport.id" :value="transport">{{ transport.name }}</option>
                    </select>
                </div>
                
                <div v-if="selected_transport && selected_transport.id" class="mb-3">
                    <label class="form-label mb-1">Тип номера</label>
                    <select v-model="selected_type" @change="selectType()" class="form-select">
                        <option v-for="type in types" :key="'type_' + type.id" :value="type">{{ type.name }}</option>
                    </select>
                </div>

                <div v-if="selected_type && selected_type.id" class="mb-3">
                    <template v-if="selected_type.namecode === 'type1_with_flag' || selected_type.namecode === 'type1_without_flag'">
                        <label class="form-label mb-1">Гос. номер</label>
                        <input v-model="number" v-maska="{ mask: 'Z###ZZ', tokens: { 'Z': { pattern: /[у,к,е,н,х,в,а,р,о,с,м,т,У,К,Е,Н,Х,В,А,Р,О,С,М,Т]/ }}}" placeholder="а000аа" type="text" class="form-control" style="text-transform: uppercase;">
                    </template>
                </div>

                <div v-if="selected_type && selected_type.id" class="mb-3">
                    <label class="form-label mb-1">Регион</label>
                    <select v-model="number_region" class="form-select">
                        <option value="02">02</option>
                        <option value="102">102</option>
                    </select>
                </div>

                <h4 v-if="number && number.length > 0 && number_region && number_region.length > 0">{{ price }}</h4>
            </div>
            <div class="col-12 col-md-4">
                <h5>Ваш номер:<br/></h5>
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
                    this.types = response.data
                ));
                this.number = ''
                this.number_region = ''
            },
            selectType() {
                this.price = this.selected_type.price
            }
        },
        components: {
        }
    }
</script>