<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Файл</th>
                    <th class="text-end"><router-link :to="{name: 'AdminGalleryCreate'}" class="btn btn-sm btn-primary">Добавить</router-link></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="galleryItem in gallery" :key="'galleryItem_' + galleryItem.id">
                    <td style="width: 50px;">
                        <img :src="galleryItem.image" style="width: auto; height: 60px; display: block; margin: 0 auto;">
                    </td>
                    <td class="text-end">
                        <!--<button class="btn btn-sm btn-outline-danger">Удалить</button>-->
                    </td>
                </tr>
            </tbody>
        </table>
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
            axios
            .get('/api/admin/gallery')
            .then(response => (
                this.gallery = response.data
            ))
        },
        methods: {
        },
        components: {
        }
    }
</script>
