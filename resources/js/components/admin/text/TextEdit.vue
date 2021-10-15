<template>
    <div class="w-100">
        <label class="form-label mb-1">Текст о компании</label>
        <textarea v-model="company_text" class="form-control mb-4" style="height: 100px;"></textarea>

        <label class="form-label mb-1">Политика конфиденциальности</label>
        <textarea v-model="privacy_policy" class="form-control mb-4" style="height: 100px;"></textarea>

        <button @click="updateText()" class="btn btn-danger">Сохранить</button>

        <hr>
        Для переноса текста на новую строку пишите *** (три звездочки).
    </div>
</template>

<script>

export default {
    data() {
        return {
            text: {},

            company_text: '',
            privacy_policy: '',
        }
    },
    created() {
        axios
            .get(`/api/text`)
            .then(response => (
                this.text = response.data,
                this.$parent.subheader = 'Тексты на сайте',
                this.company_text = response.data.company_text,
                this.privacy_policy = response.data.privacy_policy
            ))
    },
    methods: {
        updateText() {
            if(this.company_text && this.privacy_policy) {
                axios
                .post(`/api/admin/text`, { company_text: this.company_text, privacy_policy: this.privacy_policy })
                .then(response => (
                    this.$router.push({name: 'AdminLeads'})
                ))
                .catch((error) => {
                    if(error.response) {
                        for(var key in error.response.data.errors){
                            console.log(key)
                            alert(key)
                        }
                    }
                });
            } else {
                alert('Заполните поля')
            }
        },
    },
    components: {
    }
}
</script>