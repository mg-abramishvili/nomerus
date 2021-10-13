<template>
    <div>
        <div class="about-page">
            <div class="container">
                <h2 class="home-block-title">Политика конфиденциальности</h2>

                <div v-if="text && text.company_text" v-html="text.privacy_policy.split('***').join('<br><br>')"></div>
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
            text: {},
        };
    },
    created() {
        axios
            .get('/api/text')
            .then(response => (
                this.text = response.data
            ));
        },
    methods: {
    },
    components: {
    },
};
</script>