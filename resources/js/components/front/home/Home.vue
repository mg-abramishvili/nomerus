<template>
    <div>
        <div class="home-carousel">
            <div class="container">
                <div class="home-carousel-inner">
                    <h1>Изготовление <br/>госномеров <strong>в Уфе</strong></h1>
                    <p>Быстро и качественно <br>в соответствии с ГОСТ</p>
                    <router-link :to="{ name: 'OrderCreate' }" class="btn btn-standard">Заказать номер</router-link>
                </div>
                <div class="home-carousel-img"></div>
            </div>
        </div>

        <div class="home-services">
            <div class="container">
                <h2 class="home-block-title">Номера для вашего авто</h2>
                <div class="row">
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
                                        <button class="btn btn-standard">Заказать</button>
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
                                    <div class="home-services-item-image" style="background-image:url(/img/home-services-3.jpg);">
                                        <button class="btn btn-standard">Заказать</button>
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
                        <router-link :to="{ name: 'OrderCreate' }" class="btn btn-standard">Продолжить</router-link>
                    </div>
                </div>
            </div>
        </div>


        <div class="home-why">
            <div class="container">
                <h2 class="home-block-title">Почему стоит заказать номер у нас?</h2>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/home-why-item-1.jpg)">
                            <p>Даем гарантию <br>3 года на номер</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/home-why-item-2.jpg)">
                            <p>Мы есть <br>в регистре ГАИ</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="home-why-item" style="background-image:url(/img/home-why-item-3.jpg)">
                            <p>Есть сертификаты <br>и лицензии</p>
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
                <div class="row">
                    <div class="col-6 col-md-2">
                        <div class="cert-item">
                            <img src="/img/cert/0001.jpg">
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="cert-item">
                            <img src="/img/cert/0002.jpg">
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="cert-item">
                            <img src="/img/cert/0003.jpg">
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="cert-item">
                            <img src="/img/cert/0004.jpg">
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="cert-item">
                            <img src="/img/cert/0005.jpg">
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="cert-item">
                            <img src="/img/cert/0006.jpg">
                        </div>
                    </div>
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

    </div>
</template>

<script>
export default {
    data: function () {
        return {
            
        };
    },
    created() {
            /*axios
                .get('/api/products')
                .then(response => (
                    this.products = response.data
                ));*/
        },
    methods: {
    },
    components: {
    },
};
</script>