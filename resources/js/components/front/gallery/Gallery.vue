<template>
    <div>
        <div class="gallery-page">
            <div class="container">
                <h2 class="home-block-title">Фотогалерея Номерус</h2>

                <div class="row">
                    <div class="col-12 col-md-3 mb-4" v-for="(galleryItem, index) in gallery" :key="'galleryItem_m_' + galleryItem.id">
                        <div @click="openModalGal(index)" class="gal-m-item" v-bind:style="{ 'background-image': 'url(' + galleryItem.image + ')' }"></div>
                    </div>
                </div>

                <div v-show="nomerus_modal_gallery" class="nomerus-modal nomerus-modal-gallery">
                    <button @click="nomerus_modal_gallery = false" class="nomerus-modal-close">&times;</button>
                    
                    <button @click.prevent="galPrev" class="hooper_nav_button hooper_nav_button_prev"></button>
                    <button @click.prevent="galNext" class="hooper_nav_button hooper_nav_button_next"></button>

                    <hooper ref="galleryHooper" :settings="galleryHooper" class="galleryHooper">
                        <slide v-for="galleryItem in gallery" :key="'galleryItem_' + galleryItem.id">
                            <div class="gal-item">
                                <img :src="galleryItem.image">
                            </div>
                        </slide>
                    </hooper>
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
            gallery: [],
            nomerus_modal_gallery: false,

            galleryHooper: {
                itemsToShow: 1,
                wheelControl: false,
            },
        };
    },
    created() {
        axios
            .get('/api/gallery')
            .then(response => (
                this.gallery = response.data
            ));
        },
    methods: {
        openModalGal(index) {
            this.nomerus_modal_gallery = true
            this.$refs.galleryHooper.slideTo(index)
            this.$refs.galleryHooper.restart()
        },
        closeModalGal() {
            this.nomerus_modal_gallery = false
        },
        galPrev() {
            this.$refs.galleryHooper.slidePrev();
        },
        galNext() {
            this.$refs.galleryHooper.slideNext();
        },
    },
    components: {
        Hooper,
        Slide
    },
};
</script>