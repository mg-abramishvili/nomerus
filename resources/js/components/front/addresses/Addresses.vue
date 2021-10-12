<template>
    <div>
        <div class="addresses-page">
            <div class="container">
                <h2 class="home-block-title">Наши адреса</h2>

                <div class="map-wrapper">
                    <yandex-map 
                        :coords="city_coords"
                        :zoom="10" 
                        @click="onClick"
                    >
                        <template v-for="address in addresses">
                            <ymap-marker 
                                :coords="address.coordinates.split(',')" 
                                :marker-id="address.id" 
                                :hint-content="address.name" 
                            />
                        </template>
                    </yandex-map>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { yandexMap, ymapMarker } from 'vue-yandex-maps'

export default {
    data: function () {
        return {
            addresses: [],
            city_coords: [],
        };
    },
    created() {
        axios
            .get('/api/addresses')
            .then((response => {
                this.addresses = response.data
                this.cityChange()
            }));
        },
    methods: {
        cityChange() {
            if(this.$parent.current_city_namecode === 'ufa') {
                this.city_coords = [54.730299568811866,56.03773349999993]
            }
            if(this.$parent.current_city_namecode === 'ekb') {
                this.city_coords = [56.844860263326964,60.604154855468686]
            }
        },
        onClick(e) {
            this.coords = e.get('coords');
        },
    },
    mounted() {
        this.$watch(
        "$parent.current_city_id",
        (new_value, old_value) => {
            this.cityChange()
        }
        );
    },
    components: {
        yandexMap,
        ymapMarker
    },
};
</script>