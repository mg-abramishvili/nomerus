<template>
    <div class="w-100">
        <router-link :to="{name: 'AdminGalleryCreate'}" class="btn btn-sm btn-primary mb-4">Добавить</router-link>
        <div class="row">
            <div v-for="galleryItem in gallery" :key="'galleryItem_' + galleryItem.id" class="col-12 col-md-4">
                <div style="background-color: #fff; padding: 15px; margin-bottom: 20px; border: 1px solid #ddd;">
                    <img :src="galleryItem.image" style="width: auto; height: 120px; display: block; margin: 0 auto;">
                    <div class="text-center">
                        <button @click="removeGal(galleryItem.id)" class="btn btn-sm btn-outline-danger mt-1">удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                gallery: [],
            }
        },
        created() {
            this.$parent.subheader = 'Фотогалерея'
            axios
            .get('/api/admin/gallery')
            .then(response => (
                this.gallery = response.data
            ))
        },
        methods: {
            removeGal(id) {
                axios
                .get(`/api/admin/gallery-del/${id}`)
                .then(response => (
                    axios
                    .get('/api/admin/gallery')
                    .then(response => (
                        this.gallery = response.data
                    ))
                ))
            }
        },
        components: {
        }
    }
</script>
