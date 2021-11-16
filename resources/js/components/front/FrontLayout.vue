<template>
    <div class="front">
        <header>
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="header-logo">
                            <router-link :to="{ name: 'Home' }">
                                <img src="/img/logo.svg" alt="Номерус">
                                <span>Изготовление госномеров</span>
                            </router-link>
                        </div>
                        <div class="header-location">
                            <button @click="openCityModal()">{{ current_city.name }}</button>
                            <router-link :to="{name: 'Addresses'}">Адреса</router-link>
                        </div>
                        <div class="header-social">
                            <a v-if="current_city.instagram" :href="current_city.instagram" target="_blank">
                                <img src="/img/insta.svg">
                            </a>
                            <a v-if="current_city.whatsapp" :href="'https://wa.me/' + current_city.whatsapp">
                                <img src="/img/whatsapp.svg">
                            </a>
                            <a v-if="current_city.telegram" :href="'https://t.me/' + current_city.telegram">
                                <img src="/img/telegram.svg">
                            </a>
                        </div>
                        <div class="header-callback">
                            <button @click="openCallbackModal()" class="btn btn-standard">Обратный звонок</button>
                        </div>
                        <div class="header-tel">
                            <div class="header-tel-inner">
                                <a v-if="current_city.tel" :href="'tel:' + current_city.tel.split(' ').join('').split('-').join('')">{{ current_city.tel }}</a>
                            </div>
                        </div>
                        <div class="header-menu">
                            <button @click="toggleMenu()" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="header-bottom">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <div class="container">          
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                                <li class="nav-item">
                                    <a @click="goToPage('About')" class="nav-link">О компании</a>
                                </li>
                                <li class="nav-item">
                                    <a @click="goToPage('Reviews')" class="nav-link">Отзывы</a>
                                </li>
                                <li class="nav-item">
                                    <a @click="goToPage('Gallery')" class="nav-link">Фотогалерея</a>
                                </li>
                                <li class="nav-item">
                                    <a @click="goToPage('Addresses')" class="nav-link">Контакты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div>
            <router-view :key="$route.path"></router-view>
        </div>

        <div class="home-contacts">
            <div class="container">
                <h2 v-if="$route.name === 'Addresses'" class="home-block-title">Адреса</h2>
                <h2 v-else class="home-block-title">Контакты</h2>
                <template v-for="city in cities">
                    <template  v-if="city.id === current_city.id">
                        <ul v-for="address in city.addresses">
                            <li>{{ address.name }}
                            </li>
                            <li>
                                {{ address.tel }}
                            </li>
                        </ul>
                    </template>
                </template>
                <div class="map">
                    <yandex-map 
                        :coords="ymap_city_coords"
                        :zoom="10"
                        :behaviors="ymap_behaviors"
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
        </div>

        <footer>
            <div class="container">
                <div class="row align-items-center">
                    <div class="footer-logo">
                        <router-link :to="{ name: 'Home' }">
                            <img src="/img/logo.svg" alt="Номерус">
                            <span>Изготовление госномеров</span>
                        </router-link>
                    </div>
                    <div class="footer-policy">
                        <router-link :to="{name: 'Policy'}">Политика конфиденциальности</router-link>
                    </div>
                    <div class="footer-social">
                        <a href="https://www.instagram.com/nomerus_ufa/" target="_blank">
                            <img src="/img/insta.svg">
                        </a>
                        <a v-if="current_city.whatsapp" :href="'https://wa.me/' + current_city.whatsapp">
                                <img src="/img/whatsapp.svg">
                            </a>
                        <a v-if="current_city.telegram" :href="'https://t.me/' + current_city.telegram">
                            <img src="/img/telegram.svg">
                        </a>
                    </div>
                    <div class="footer-callback">
                        <button @click="openCallbackModal()" class="btn btn-standard">Обратный звонок</button>
                    </div>
                    <div class="footer-tel">
                        <div class="footer-tel-inner">
                            <a v-if="current_city.tel" :href="'tel:' + current_city.tel.split(' ').join('').split('-').join('')">{{ current_city.tel }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div v-if="city_modal" class="modal city_modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Где вы находитесь?</h5>
                        <button @click="closeCityModal()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <template v-for="city in cities">
                                <li v-if="city.addresses && city.addresses.length > 0">
                                    <a @click="selectCity(city.id, city.name, city.namecode, city.instagram)">{{ city.name }}</a>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="city_correct_modal" class="modal city_modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Где вы находитесь?</h5>
                        <button @click="selectCity(current_city.id, current_city.name, current_city.namecode, current_city.instagram), closeCityCorrectModal()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        Ваш город {{ current_city.name }}? <br/><br/>
                        <button @click="selectCity(current_city.id, current_city.name, current_city.namecode, current_city.instagram), closeCityCorrectModal()" class="btn btn-outline-danger">Да</button>
                        <button @click="closeCityCorrectModal(), openCityModal()" class="btn btn-outline-danger">Нет</button>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="callback_modal" class="modal callback_modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Обратный звонок</h5>
                        <button @click="closeCallbackModal()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-if="lead_success" class="alert alert-success" role="alert">
                            Заявка отправлена! Мы с вами свяжемся!
                        </div>
                        <div class="mb-4">
                            <input v-model="lead_name" type="text" class="form-control form-control-lg text-center" placeholder="Имя">
                        </div>
                        <div class="mb-4">
                            <input v-model="lead_tel" type="text" class="form-control form-control-lg text-center" placeholder="Телефон">
                        </div>
                        <p>Нажимая кнопку "Отправить заявку" вы соглашаетесь с <i @click="policyToggle()">политикой конфиденциальности</i>.</p>
                        <div v-if="show_policy" class="policy">
                            <div v-if="text && text.company_text" v-html="text.privacy_policy.split('***').join('<br><br>')"></div>
                        </div>
                        <div class="text-center">
                            <button v-if="saveLead_button" @click="saveLead()" class="btn btn-standard">Отправить заявку</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="modal_bg" class="modal-backdrop fade show"></div>

    </div>
</template>

<script>
    import { maska } from 'maska'
    import { yandexMap, ymapMarker } from 'vue-yandex-maps'

    export default {
        directives: { maska },
        data() {
            return {
                cities: [],
                text: {},

                current_city: 1,

                city_modal: false,
                callback_modal: false,
                city_correct_modal: false,
                modal_bg: false,

                ymap_addresses: [],
                ymap_city_coords: [],
                ymap_behaviors: [
                    //'scrollZoom',
                    'drag'
                ],

                lead_name: '',
                lead_tel: '',
                lead_city: '',
                lead_success: false,
                saveLead_button: true,

                show_policy: false,

                user_ip: '',
            }
        },
        created() {
            axios
            .get('/api/cities')
            .then((response => {
                this.cities = response.data
            }));
            axios
            .get('/api/city-detect/0')
            .then((response => {
                this.current_city = response.data.city
                this.lead_city = response.data.city.name
                this.city_session = response.data.session
                //console.log(response.data.session)
                if(this.city_session == '0') {
                    this.openCityCorrectModal()
                }
                
                axios
                    .get('/api/addresses')
                    .then((response => {
                        this.ymap_addresses = response.data
                        this.ymap_cityChange()
                    }));
            }));
            axios
            .get('/api/text')
            .then(response => (
                this.text = response.data
            ));

            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(86309721, 'init', {
                defer: true,
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
            })
        },
        methods: {
            goToPage(route_name) {
                this.toggleMenu()
                this.$router.push({name: route_name})
            },
            openCallbackModal() {
                this.modal_bg = true
                this.callback_modal = true
                this.lead_name = ''
                this.lead_tel = ''
                this.lead_success = false
            },
            closeCallbackModal() {
                this.modal_bg = false
                this.callback_modal = false
            },
            openCityModal() {
                this.modal_bg = true
                this.city_modal = true
            },
            openCityCorrectModal() {
                this.modal_bg = true
                this.city_correct_modal = true
            },
            closeCityModal() {
                this.modal_bg = false
                this.city_modal = false
            },
            closeCityCorrectModal() {
                this.modal_bg = false
                this.city_correct_modal = false
            },
            selectCity(id) {
                axios
                .get(`/api/city-select/${id}`)
                .then((response => {
                    axios
                    .get('/api/city-detect/0')
                    .then((response => {
                        this.current_city = response.data.city
                        this.lead_city = response.data.city.name
                        this.city_session = response.data.session
                        if(this.city_session == '0') {
                            this.openCityCorrectModal()
                        }
                    }));
                }));

                this.closeCityModal()
            },
            ymap_cityChange() {
                if(this.current_city.namecode === 'ufa') {
                    this.ymap_city_coords = [54.730299568811866,56.03773349999993]
                }
                if(this.current_city.namecode === 'ekb') {
                    this.ymap_city_coords = [56.844860263326964,60.604154855468686]
                }
                if(this.current_city.namecode === 'strltmk') {
                    this.ymap_city_coords = [53.63219996016489,55.929692909667935]
                }
                if(this.current_city.namecode === 'tuimazy') {
                    this.ymap_city_coords = [54.59935686492598,53.71163149999992]
                }
                if(this.current_city.namecode === 'durtuli') {
                    this.ymap_city_coords = [55.48578672904617,54.87422798770665]
                }
                if(this.current_city.namecode === 'oktyabr') {
                    this.ymap_city_coords = [54.490948126893585,53.46458687011712]
                }
                if(this.current_city.namecode === 'belorezk') {
                    this.ymap_city_coords = [53.96597374611644,58.3987485]
                }
            },
            toggleMenu() {
                if(document.getElementById('navbarCollapse').classList.contains('collapse')) {
                    document.getElementById('navbarCollapse').classList.remove('collapse')
                    document.getElementById('navbarCollapse').classList.add('collapsed')
                } else {
                    document.getElementById('navbarCollapse').classList.remove('collapsed')
                    document.getElementById('navbarCollapse').classList.add('collapse')
                }
            },
            saveLead() {
                if(this.lead_name && this.lead_tel && this.lead_city) {
                this.saveLead_button = false
                axios
                    .post(`/api/lead`, {
                            name: this.lead_name,
                            tel: this.lead_tel,
                            city: this.lead_city
                        })
                    .then(response => (
                        this.lead_name = '',
                        this.lead_tel = '',
                        this.lead_success = true,
                        this.saveLead_button = true
                    ))
                    .catch((error) => {
                        if(error.response) {
                            for(var key in error.response.data.errors){
                                console.log(key)
                            }
                        }
                    });
                } else {
                    alert('Заполните поля')
                }
            },
            policyToggle() {
                if(this.show_policy == true) {
                    this.show_policy = false
                } else {
                    this.show_policy = true
                }
            }
        },
        mounted() {
            this.$watch(
            "current_city.id",
            (new_value, old_value) => {
                this.ymap_cityChange()
            }
            );
        },
        components: {
            yandexMap,
            ymapMarker
        }
    }
</script>