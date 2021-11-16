<template>
    <div>
        <div class="addresses-page" style="display:none;">
            <div class="container">
                <h2 class="home-block-title">Наши адреса</h2>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="map-wrapper">
                            <yandex-map 
                                :coords="ymap_city_coords"
                                :zoom="10"
                            >
                                <template v-for="address in ymap_addresses">
                                    <ymap-marker 
                                        :coords="address.coordinates.split(',')" 
                                        :marker-id="address.id" 
                                        :hint-content="address.name" 
                                    />
                                </template>
                            </yandex-map>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul v-for="address in ymap_addresses">
                            <template v-for="city in address.cities">
                                <li v-if="city.id === $parent.current_city.id">
                                    {{ address.name }} <br>
                                    {{ address.tel }}
                                </li>
                            </template>
                        </ul>
                    </div>
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
            ymap_addresses: [],
            ymap_city_coords: [],
        };
    },
    created() {
        axios
            .get('/api/addresses')
            .then((response => {
                this.ymap_addresses = response.data
                this.ymap_cityChange()
            }));

            ym(86309721, 'hit', `/addresses`, {
                title: 'Адреса',
                referer: `http://номерус.рф/addresses`
            });
        },
    methods: {
        ymap_cityChange() {
            if(this.$parent.current_city.namecode === 'ufa') {
                this.ymap_city_coords = [54.730299568811866,56.03773349999993]
            }
            if(this.$parent.current_city.namecode === 'ekb') {
                this.ymap_city_coords = [56.844860263326964,60.604154855468686]
            }
            if(this.$parent.current_city.namecode === 'strltmk') {
                this.ymap_city_coords = [53.63219996016489,55.929692909667935]
            }
        },
    },
    mounted() {
        this.$watch(
        "$parent.current_city.id",
        (new_value, old_value) => {
            this.ymap_cityChange()
        }
        );
    },
    components: {
        yandexMap,
        ymapMarker
    },
};
</script>