<template>
    <div class="container">
        <h1>Заказ номера</h1>

        <div class="row">
            <div class="col-12 col-md-8">
                <select v-model="selected_transport" @change="selectTransport()" class="form-select">
                    <option v-for="transport in transports" :key="'transport_' + transport.id" :value="transport">{{ transport.name }}</option>
                </select>
                {{ selected_transport }}

                <select v-model="selected_type" @change="selectType()" class="form-select">
                    <option v-for="type in types" :key="'type_' + type.id" :value="type">{{ type.name }}</option>
                </select>
                {{ selected_type }}
                
                <div class="mb-3">
                    <label class="form-label">Номер</label>
                    <template v-if="selected_type.namecode === 'type1_with_flag'">
                        <input v-model="number" v-maska="{ mask: 'Z###ZZ', tokens: { 'Z': { pattern: /[а-яА-Я]/ }}}" type="text" class="form-control">
                    </template>
                    <template v-if="selected_type.namecode === 'type1_without_flag'">
                        <input v-model="number" v-maska="{ mask: 'ZZ###ZZ', tokens: { 'Z': { pattern: /[а-яА-Я]/ }}}" type="text" class="form-control">
                    </template>
                </div>
            </div>
            <div class="col-12 col-md-4">
                Ваш номер:<br/>
                {{ number }}
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
            },
            selectType() {
                this.number = ''
            }
        },
        components: {
        }
    }
</script>