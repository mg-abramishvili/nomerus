<template>
    <div class="admin_panel bg-light" style="min-height: 100vh;">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
                <div class="container">
                    <router-link :to="{name: 'Products'}" class="navbar-brand">Номерус :: панель управления</router-link>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="d-flex">
                            <ul class="navbar-nav mb-2 me-2 mb-md-0">
                                <li class="nav-item">
                                    <router-link :to="{name: 'Orders'}" class="nav-link">Заказы</router-link>
                                </li>
                            </ul>
                            <router-link :to="{name: 'Home'}" class="btn btn-secondary">Выйти</router-link>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <router-view :key="$route.path"></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        created() {
        },
        methods: {
        },
        components: {
        }
    }
</script>