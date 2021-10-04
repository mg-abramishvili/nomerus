<template>
    <div>
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
                <div class="container">
                    <router-link :to="{ name: 'Home' }" class="navbar-brand">Номерус</router-link>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <router-link :to="{ name: 'Home' }" class="nav-link">Главная</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{ name: 'OrderCreate' }" class="nav-link">Заказать номер</router-link>
                            </li>
                        </ul>
                        <div class="d-flex">
                            
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div>
            <router-view :key="$route.path"></router-view>
        </div>
    </div>
</template>