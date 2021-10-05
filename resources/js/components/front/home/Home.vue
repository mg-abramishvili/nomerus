<template>
    <div>
        <div class="home-carousel">
            <div class="container">
                <div class="home-carousel-inner">
                    <h1>Изготовление <br/>госномеров <strong>в Уфе</strong></h1>
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
                                        <button class="btn btn-standard">Заказать</button>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="home-services-item-info">
                                        <h3>Обычный номер</h3>
                                        <h5><i>Тип 1</i> ГОСТ Р 50577-2018</h5>
                                        <p>Государственный регистрационный знак для легковых, грузовых автомобилей и автобусов.</p>
                                        <img src="/img/type1.png" alt="Тип 1">
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
                                        <img src="/img/type1_without_flag.png" alt="Тип 1 без флага">
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
                                        <img src="/img/type2.png" alt="Тип 2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
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