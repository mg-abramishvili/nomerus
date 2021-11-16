<template>
    <div>
        <div class="home-carousel">
            <div class="container">
                <div class="home-carousel-inner">
                    <h1 v-if="$parent.current_city && $parent.current_city.name && $parent.current_city.name.length > 0">Изготовление <br/>госномеров 
                        <strong v-if="$parent.current_city.name.substr(-1) === 'а'">в {{ $parent.current_city.name.slice(0, -1) + 'е' }}</strong>
                        <strong v-else-if="$parent.current_city.name.substr(-1) === 'ы'">в {{ $parent.current_city.name.slice(0, -1) + 'ах' }}</strong>
                        <strong v-else-if="$parent.current_city.name.substr(-1) === 'и'">в {{ $parent.current_city.name.slice(0, -1) + 'ях' }}</strong>
                        <strong v-else-if="$parent.current_city.name.substr(-1) === 'й'">в {{ $parent.current_city.name.slice(0, -2) + 'ом' }}</strong>
                        <strong v-else>в {{ $parent.current_city.name + 'е' }}</strong>
                    </h1>
                    <p>Быстро и качественно <br>в соответствии с ГОСТ</p>
                    <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: 'legkovoy', type: 'type1_with_flag'} }" class="btn btn-standard">Заказать номер</router-link>
                </div>
                <div class="home-carousel-img"></div>
            </div>
        </div>

        <div class="home-services">
            <div class="container">
                <h2 class="home-block-title">Номера для вашего авто</h2>
                <div class="row justify-content-center">

                    <div v-for="service in services" :key="'key_' + service.id" class="col-12 col-md-6">
                        <div class="home-services-item">
                            <div class="row">
                                <div class="col-5">
                                    <div class="home-services-item-image" v-bind:style="{ 'background-image': 'url(' + service.image + ')' }">
                                        <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: service.type, type: service.types[0].namecode} }" class="btn btn-standard">Заказать</router-link>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="home-services-item-info">
                                        <h3>{{ service.name }}</h3>
                                        <!--<h5><i>Тип 1</i> ГОСТ Р 50577-2018</h5>-->
                                        <p>{{ service.text }}</p>
                                        <div class="home-services-item-info-plate" v-bind:style="{ 'background-image': 'url(' + service.plate + ')' }"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="home-order-form">
            <div class="container">
                <h2 class="home-block-title">Заказать номер</h2>
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <select v-model="banner_form_client_type" class="form-select form-select-lg">
                            <option value="fz">Физ. лицо</option>
                            <option value="ur">Юр. лицо</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <select v-model="banner_form_transport" class="form-select form-select-lg">
                            <option value="legkovoy">Автомобиль</option>
                            <option value="moto">Мотоцикл</option>
                            <option value="pricep">Прицеп</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <router-link :to="{ name: 'OrderCreate', params: {kto: banner_form_client_type, transport: banner_form_transport, type: 'type1_with_flag'} }" class="btn btn-standard">Продолжить</router-link>
                    </div>
                </div>
            </div>
        </div>


        <div class="home-why">
            <div class="container">
                <h2 class="home-block-title">Почему стоит заказать номер у нас?</h2>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/preim.jpg)">
                            <p>Мы состоим в реестре <br>изготовителей ГРЗ </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/preim.jpg)">
                            <p>Есть все необходимые <br>сертификаты</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/preim.jpg)">
                            <p>Даем гарантию <br>3 года на номер</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/preim.jpg)">
                            <p>Изготовим номер <br>за 5 минут</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-cert">
            <div class="container">
                <h2 class="home-block-title">Сертификаты</h2>

                <div class="homeCertMiniHooperWrapper">
                    <button @click.prevent="homeCertMiniPrev" class="hooper_nav_button hooper_nav_button_prev"></button>
                    <button @click.prevent="homeCertMiniNext" class="hooper_nav_button hooper_nav_button_next"></button>

                    <hooper ref="homeCertMiniHooper" :settings="homeCertMiniHooper" class="homeCertMiniHooper">
                        <slide v-for="(certItem, index) in certificates" :key="'cert_m_' + certItem.id">
                            <div @click="openModalCerts(index)" class="cert-item">
                                <img :src="certItem.image">
                            </div>
                        </slide>
                    </hooper>
                </div>

                <div v-show="nomerus_modal_certs" class="nomerus-modal nomerus-modal-certs">
                    <button @click="nomerus_modal_certs = false" class="nomerus-modal-close">&times;</button>
                    
                    <button @click.prevent="homeCertPrev" class="hooper_nav_button hooper_nav_button_prev"></button>
                    <button @click.prevent="homeCertNext" class="hooper_nav_button hooper_nav_button_next"></button>

                    <hooper ref="homeCertHooper" :settings="homeCertHooper" class="homeCertHooper">
                        <slide v-for="certItem in certificates" :key="'cert_m_' + certItem.id">
                            <div class="cert-item">
                                <img :src="certItem.image">
                            </div>
                        </slide>
                    </hooper>
                </div>
            </div>
        </div>

        <div class="home-about">
            <div class="container">
                <h2 v-if="$parent.current_city && $parent.current_city.name" class="home-block-title">Изготовление автомобильных номеров 
                    <template v-if="$parent.current_city.name.substr(-1) === 'а'">в {{ $parent.current_city.name.slice(0, -1) + 'е' }}</template>
                    <template v-else-if="$parent.current_city.name.substr(-1) === 'ы'">в {{ $parent.current_city.name.slice(0, -1) + 'ах' }}</template>
                    <template v-else-if="$parent.current_city.name.substr(-1) === 'и'">в {{ $parent.current_city.name.slice(0, -1) + 'ях' }}</template>
                    <template v-else-if="$parent.current_city.name.substr(-1) === 'й'">в {{ $parent.current_city.name.slice(0, -2) + 'ом' }}</template>
                    <template v-else>в {{ $parent.current_city.name + 'е' }}</template>
                </h2>
                <div v-if="text && text.company_text" v-html="text.company_text.split('***').join('<br><br>')"></div>
            </div>
        </div>

        <div class="home-restoration">
            <div class="container">
                <h2 class="home-block-title">Реставрация госномеров</h2>
                <img src="/img/home-restoration.jpg" alt="Реставрация госномеров">
                <p>Мы также предалгаем услугу по реставрации госномеров.</p>
                <div class="text-center">
                    <button @click="$parent.openCallbackModal()" class="btn btn-standard">Заказать реставрацию</button>
                </div>
            </div>
        </div>

        <div class="home-partners">
            <div class="container">
                <h2 class="home-block-title">Нам доверяют</h2>
                <div class="homePartnersHooperWrapper">
                    <button @click.prevent="homePartnersPrev" class="hooper_nav_button hooper_nav_button_prev"></button>
                    <button @click.prevent="homePartnersNext" class="hooper_nav_button hooper_nav_button_next"></button>

                    <hooper ref="homePartnersHooper" :settings="homePartnersHooper" class="homePartnersHooper">
                        <slide v-for="partner in partners" :key="'partner_' + partner.id">
                            <div class="home-partners-item" v-bind:style="{ 'background-image': 'url(' + partner.image + ')' }"></div>
                        </slide>
                    </hooper>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import { Hooper, Slide } from 'hooper';
import 'hooper/dist/hooper.css';

export default {
    data: function () {
        return {
            services: [],
            certificates: [],
            text: {},
            partners: [],
            nomerus_modal_certs: false,

            banner_form_client_type: 'fz',
            banner_form_transport: 'legkovoy',

            homeCertMiniHooper: {
                itemsToShow: 4,
                trimWhiteSpace: true,
                wheelControl: false,
                breakpoints: {
                    300: {
                        itemsToShow: 1
                    },
                    900: {
                        itemsToShow: 2
                    },
                    1200: {
                        itemsToShow: 4
                    },
                }
            },
            homeCertHooper: {
                itemsToShow: 1,
                wheelControl: false,
                shortDrag: true,
            },
            homePartnersHooper: {
                itemsToShow: 4,
                trimWhiteSpace: true,
                wheelControl: false,
                breakpoints: {
                    300: {
                        itemsToShow: 1
                    },
                    900: {
                        itemsToShow: 2
                    },
                    1200: {
                        itemsToShow: 4
                    },
                }
            },
        };
    },
    created() {
        axios
            .get('/api/services')
            .then(response => (
                this.services = response.data
            ));
        axios
            .get('/api/text')
            .then(response => (
                this.text = response.data
            ));
        axios
            .get('/api/certificates')
            .then(response => (
                this.certificates = response.data
            ));
        axios
            .get('/api/partners')
            .then(response => (
                this.partners = response.data
            ));

            ym(86309721, 'hit', '/', {
                title: 'Главная страница',
                referer: 'http://номерус.рф'
            });
        },
    methods: {
        homeCertMiniPrev() {
            this.$refs.homeCertMiniHooper.slidePrev();
        },
        homeCertMiniNext() {
            this.$refs.homeCertMiniHooper.slideNext();
        },
        openModalCerts(index) {
            this.nomerus_modal_certs = true
            this.$refs.homeCertHooper.slideTo(index)
            this.$refs.homeCertHooper.restart()
        },
        closeModalCerts() {
            this.nomerus_modal_certs = false
        },
        homeCertPrev() {
            this.$refs.homeCertHooper.slidePrev();
        },
        homeCertNext() {
            this.$refs.homeCertHooper.slideNext();
        },
        homePartnersPrev() {
            this.$refs.homePartnersHooper.slidePrev();
        },
        homePartnersNext() {
            this.$refs.homePartnersHooper.slideNext();
        },
    },
    components: {
        Hooper,
        Slide
    },
};
</script>