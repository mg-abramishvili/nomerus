<template>
    <div>
        <div class="about-page">
            <div class="container">
                <h2 class="home-block-title">О компании Номерус</h2>

                <div v-if="text && text.company_text" v-html="text.company_text.split('***').join('<br><br>')"></div>
            </div>
        </div>
        <div class="home-cert">
            <div class="container">
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
            text: {},
            certificates: [],
            partners: [],
            nomerus_modal_certs: false,
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
                transition: 0,
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