<template>
    <div class="admin_panel bg-light" style="min-height: 100vh;">

        <div v-if="authenticated == false" class="admin_login">
            <div class="container">
                <div class="col-12 col-md-6 offset-3 mt-4">
                    <p class="mb-1"><strong>Номерус.РФ :: панель управления</strong></p>
                    <hr class="mt-0 mb-4">
                    <input v-model="auth.email" type="email" class="form-control mb-2" placeholder="Логин">
                    <input v-model="auth.password" type="password" class="form-control mb-2" placeholder="Пароль">
                    <button @click="login()" class="btn btn-danger">Войти</button>
                </div>
            </div>
        </div>

        <header v-if="authenticated" class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">Номерус</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="subheader w-100">
                {{ subheader }}
            </div>
        </header>

        <div v-if="authenticated" class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminOrders'}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminOrders'}">Заказы</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminLeads'}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminLeads'}">Заявки</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminPrices', params: {city: 'ufa'}}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminPrices'}">Цены</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminGallery'}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminGallery'}">Фотогалерея</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminAddresses'}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminAddresses'}">Адреса</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminServices'}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminServices'}">Виды услуг</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminPartners'}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminPartners'}">Партнеры</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminCertificates'}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminCertificates'}">Сертификаты</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'AdminTextEdit'}" class="nav-link" :class="{ 'text-danger' : $route.name == 'AdminTextEdit'}">Тексты на сайте</router-link>
                            </li>
                        </ul>

                        <!--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>sublabel</span>
                        <a class="link-secondary" href="#">
                        <span data-feather="plus-circle"></span>
                        </a>
                        </h6>-->
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <router-link :to="{name: 'Home'}" class="nav-link">Выйти</router-link>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <router-view :key="$route.path"></router-view>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                subheader: 'панель управления',
                auth: {
                    email: '',
                    password: ''
                },
                authenticated: false,
                user: {},
            }
        },
        created() {
            this.checkMe()
        },
        methods: {
            login() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/login', this.auth).then(response => {
                        if(response.data === 'bad_login') {
							alert('Неверный E-mail или пароль')
						} else {
							this.checkMe()
						}
                    });
                });
            },
            checkMe() {
				axios.post('/api/me').then(response => {
					this.user = response.data
					if(this.user.name && this.user.name.length) {
						this.authenticated = true
					} else {
						this.authenticated = false
					}
				})
			},
        },
        components: {
        }
    }
</script>