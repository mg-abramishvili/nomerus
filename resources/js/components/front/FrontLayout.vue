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
                            <button>Уфа</button>
                            <span>ул. Лесотехникума 15</span>
                        </div>
                        <div class="header-social">
                            <a href="#">
                                <img src="/img/whatsapp.svg">
                            </a>
                            <a href="#">
                                <img src="/img/telegram.svg">
                            </a>
                        </div>
                        <div class="header-callback">
                            <button class="btn btn-standard">Обратный звонок</button>
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
    </div>
</template>