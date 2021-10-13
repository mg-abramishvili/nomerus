<template>
    <div class="container">
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
                        {{ lead.created_at }}
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
        components: {
        }
    }
</script>
