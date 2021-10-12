<template>
    <div>
        <div class="home-carousel">
            <div class="container">
                <div class="home-carousel-inner">
                    <h1 v-if="$parent.current_city.name && $parent.current_city.name.length > 0">Изготовление <br/>госномеров 
                        <strong v-if="$parent.current_city.name.substr(-1) === 'а'">в {{ $parent.current_city.name.slice(0, -1) + 'е' }}</strong>
                        <strong v-else>в {{ $parent.current_city.name + 'е' }}</strong>
                    </h1>
                    <p>Быстро и качественно <br>в соответствии с ГОСТ</p>
                    <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: 'legkovoy'} }" class="btn btn-standard">Заказать номер</router-link>
                </div>
                <div class="home-carousel-img"></div>
            </div>
        </div>

        <div class="home-services">
            <div class="container">
                <h2 class="home-block-title">Номера для вашего авто</h2>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="home-services-item">
                            <div class="row">
                                <div class="col-5">
                                    <div class="home-services-item-image" style="background-image:url(/img/home-services-1.jpg);">
                                        <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: 'legkovoy'} }" class="btn btn-standard">Заказать</router-link>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="home-services-item-info">
                                        <h3>Обычный номер</h3>
                                        <h5><i>Тип 1</i> ГОСТ Р 50577-2018</h5>
                                        <p>Государственный регистрационный знак для легковых, грузовых автомобилей и автобусов.</p>
                                        <div class="home-services-item-info-plate" style="background-image:url(/img/type1.png)"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="home-services-item">
                            <div class="row">
                                <div class="col-5">
                                    <div class="home-services-item-image" style="background-image:url(/img/home-services-2.jpg);">
                                        <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: 'legkovoy'} }" class="btn btn-standard">Заказать</router-link>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="home-services-item-info">
                                        <h3>Номер без флага</h3>
                                        <h5><i>Тип 1</i> ГОСТ Р 50577-2018</h5>
                                        <p>Государственный регистрационный знак для легковых, грузовых автомобилей и автобусов.</p>
                                        <div class="home-services-item-info-plate" style="background-image:url(/img/type1_without_flag.png)"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="home-services-item">
                            <div class="row">
                                <div class="col-5">
                                    <div class="home-services-item-image" style="background-image:url(/img/home-services-3.jpg);">
                                        <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: 'legkovoy'} }" class="btn btn-standard">Заказать</router-link>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="home-services-item-info">
                                        <h3>Квадратный номер</h3>
                                        <h5><i>Тип 1А</i> ГОСТ Р 50577-2018</h5>
                                        <p>Государственный регистрационный знак для легковых, грузовых автомобилей и автобусов.</p>
                                        <div class="home-services-item-info-plate" style="background-image:url(/img/type1a.png)"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="home-services-item">
                            <div class="row">
                                <div class="col-5">
                                    <div class="home-services-item-image" style="background-image:url(/img/home-services-4.jpg);">
                                        <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: 'moto'} }" class="btn btn-standard">Заказать</router-link>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="home-services-item-info">
                                        <h3>Номер для мотоцикла</h3>
                                        <h5><i>Тип 4</i> ГОСТ Р 50577-2018</h5>
                                        <p>Государственный регистрационный знак для мотоциклов, моторолеров и мопедов.</p>
                                        <div class="home-services-item-info-plate" style="background-image:url(/img/type4.png)"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="home-services-item">
                            <div class="row">
                                <div class="col-5">
                                    <div class="home-services-item-image" style="background-image:url(/img/home-services-5.jpg);">
                                        <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: 'legkovoy'} }" class="btn btn-standard">Заказать</router-link>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="home-services-item-info">
                                        <h3>Номер для прицепа</h3>
                                        <h5><i>Тип 2</i> ГОСТ Р 50577-2018</h5>
                                        <p>Государственный регистрационный знак для автомобильных прицепов и полуприцепов.</p>
                                        <div class="home-services-item-info-plate" style="background-image:url(/img/type2.png)"></div>
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
                        <select class="form-select form-select-lg">
                            <option value="">Физ. лицо</option>
                            <option value="">Юр. лицо</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <select class="form-select form-select-lg">
                            <option value="">Легковой</option>
                            <option value="">Мото</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <router-link :to="{ name: 'OrderCreate', params: {kto: 'fz', transport: 'legkovoy'} }" class="btn btn-standard">Продолжить</router-link>
                    </div>
                </div>
            </div>
        </div>


        <div class="home-why">
            <div class="container">
                <h2 class="home-block-title">Почему стоит заказать номер у нас?</h2>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/home-why-item-2.jpg)">
                            <p>Мы состоим в реестре <br>изготовителей ГРЗ </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/home-why-item-3.jpg)">
                            <p>Есть все необходимые <br>сертификаты</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/home-why-item-1.jpg)">
                            <p>Даем гарантию <br>3 года на номер</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/home-why-item-1.jpg)">
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
                <h2 class="home-block-title">Изготовление автомобильных номеров в Уфе</h2>
                <p>Мы новая и динамично развивающаяся компания имеющая шестилетний опыт работы с одной из крупнейших компаний России по производству государственных регистрационных знаков для автомобилей, прицепов и мотоциклов ООО «Бластер Плюс».</p>
                <p>Мы предлагаем нашим клиентам реставрацию, изготовлене дубликатов госномеров по приемлемой цене и отличного качества. Окраска госномеров производится специальным лаком Австрийской фирмы Rembrandtin, предназначенной для окраски заготовок со световозвращающей пленкой фирмы «Niрроn»(Япония).</p>
                <p>Полный цикл производства осуществляется на высокотехнологичном оборудовании Немецкой фирмы UTSCH. Уникальность производства, квалифицированные сотрудники, многоуровневый контроль обеспечивают высочайшее качество выпускаемой продукции.</p>
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
                <div class="row align-items-center">
                    <div class="col-6 col-md-3">
                        <img src="/img/bashkirenergo.svg" />
                    </div>
                    <div class="col-6 col-md-3">
                        <img src="/img/moi_dokumenty.svg" />
                    </div>
                    <div class="col-6 col-md-3">
                        <img src="/img/rn-transport.svg" />
                    </div>
                    <div class="col-6 col-md-3">
                        <img src="/img/evroplan.svg" />
                    </div>
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
            certificates: [],
            nomerus_modal_certs: false,

            homeCertMiniHooper: {
                itemsToShow: 4,
                trimWhiteSpace: true,
                wheelControl: false,

            },
            homeCertHooper: {
                itemsToShow: 1,
                wheelControl: false,
                transition: 0,
            },
        };
    },
    created() {
        axios
            .get('/api/certificates')
            .then(response => (
                this.certificates = response.data
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
    },
    components: {
        Hooper,
        Slide
    },
};
</script>