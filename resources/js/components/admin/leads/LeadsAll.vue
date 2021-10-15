<template>
    <div class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Город</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="lead in leads" :key="'lead_' + lead.id">
                    <td>
                        {{ lead.created_at | moment }}
                    </td>
                    <td>
                        {{ lead.name }}
                    </td>
                    <td>
                        {{ lead.tel }}
                    </td>
                    <td>
                        {{ lead.city }}
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
                leads: [],
                moment: moment,
            }
        },
        created() {
            this.$parent.subheader = 'Заявки'
            axios
            .get('/api/admin/leads')
            .then(response => (
                this.leads = response.data
            ))
        },
        methods: {
        },
        filters: {
            moment: function (date) {
                return moment(date).format('DD.MM.YYYY');
            }
        },
        components: {
        }
    }
</script>
