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
                            <button @click="openCityModal()">{{ current_city_name }}</button>
                            <span>ул. Лесотехникума, 15</span>
                        </div>
                        <div class="header-social">
                            <a href="https://www.instagram.com/nomerus_ufa/" target="_blank">
                                <img src="/img/insta.svg">
                            </a>
                            <a href="#">
                                <img src="/img/whatsapp.svg">
                            </a>
                            <!--<a href="#">
                                <img src="/img/telegram.svg">
                            </a>-->
                        </div>
                        <div class="header-callback">
                            <button @click="openCallbackModal()" class="btn btn-standard">Обратный звонок</button>
                        </div>
                        <div class="header-tel">
                            <div class="header-tel-inner">
                                <a href="#">+7 927 236-66-29</a>
                                <a href="#">+7 960 800-32-10</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="header-bottom">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <div class="container">          
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                                <li class="nav-item">
                                    <a class="nav-link">О компании</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Лицензии</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Способы оплаты</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Отзывы</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Фотогалерея</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Контакты</a>
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
                <h2 class="home-block-title">Контакты</h2>
                <ul>
                    <li>Уфа, ул. Лесотехникума, 15
                    </li>
                    <li>
                        +7 927 236-66-29
                    </li>
                    <li>
                        +7 960 800-32-10
                    </li>
                </ul>
                <div class="map">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A7be0ec96a4c612454138b57387fa53bcfc144805e5cd495f745d9839dd71ecc8&amp;source=constructor" width="100%" height="100%" frameborder="0" style="pointer-events: none;"></iframe>
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
                        <a href="#">Политика конфиденциальности</a>
                    </div>
                    <div class="footer-social">
                        <a href="https://www.instagram.com/nomerus_ufa/" target="_blank">
                            <img src="/img/insta.svg">
                        </a>
                        <a href="#">
                            <img src="/img/whatsapp.svg">
                        </a>
                        <!--<a href="#">
                            <img src="/img/telegram.svg">
                        </a>-->
                    </div>
                    <div class="footer-callback">
                        <button @click="openCallbackModal()" class="btn btn-standard">Обратный звонок</button>
                    </div>
                    <div class="footer-tel">
                        <div class="footer-tel-inner">
                            <a href="#">+7 927 236-66-29</a>
                            <a href="#">+7 960 800-32-10</a>
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
                            <li v-for="city in cities" :key="'city_' + city.id">
                                <a @click="selectCity(city.id, city.name, city.namecode)">{{ city.name }}</a>
                            </li>
                        </ul>
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
                        <div class="mb-4">
                            <input type="text" class="form-control form-control-lg text-center" placeholder="Имя">
                        </div>
                        <div class="mb-4">
                            <input type="text" class="form-control form-control-lg text-center" placeholder="Телефон">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-standard">Отправить заявку</button>
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

    export default {
        directives: { maska },
        data() {
            return {
                cities: [],

                current_city_id: 1,
                current_city_name: 'Уфа',
                current_city_namecode: 'ufa',

                city_modal: false,
                callback_modal: false,
                modal_bg: false,
            }
        },
        created() {
            axios
            .get('/api/cities')
            .then((response => {
                this.cities = response.data
            }));
        },
        methods: {
            openCallbackModal() {
                this.modal_bg = true
                this.callback_modal = true
            },
            closeCallbackModal() {
                this.modal_bg = false
                this.callback_modal = false
            },
            openCityModal() {
                this.modal_bg = true
                this.city_modal = true
            },
            closeCityModal() {
                this.modal_bg = false
                this.city_modal = false
            },
            selectCity(id, name, namecode) {
                this.current_city_id = id
                this.current_city_name = name
                this.current_city_namecode = namecode

                this.closeCityModal()
            }
        },
        components: {
        }
    }
</script>