<template>
    <InvalidFields v-bind:errors="errors"></InvalidFields>

    <div class="bg-white rounded shadow-sm p-3">
        <form class="row" id="user-form" @submit="sendRequest($event)">
            <div class="form-group col-md-4 col-sm-12 mb-3">
                <label for="name" class="form-label">
                    Nome
                </label>
                <input v-model="User.name" type="text" class="form-control" id="name">
            </div>
            <div class="form-group col-md-4 col-sm-12 mb-3">
                <label for="email" class="form-label">
                    E-mail
                </label>
                <input v-model="User.email" type="email" class="form-control" id="email">
            </div>
            <div class="form-group col-md-4 col-sm-12 mb-3">
                <label for="password" class="form-label">
                    Senha
                </label>
                <input v-model="User.password" type="password" class="form-control" id="password">
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import InvalidFields from "@/vue/pages/components/form/invalid-fields.vue";

    export default {
        name: 'Form',
        components: {InvalidFields},
        props: ['method', 'endpoint'],
        data() {
            return {
                User: {
                    name: null,
                    email: null,
                    password: null,
                },
                errors: null
            }
        },
        mounted() {
            if (this.$route.params.id) {
                this.getUser();

            }
        },
        methods: {
            getUser() {
                return this.axios.get(`api/users/${this.$route.params.id}`).then(response => {
                    this.User = JSON.parse(response.data);
                })
            },
            async sendRequest(e) {
                e.preventDefault()
                this.errors = null;

                await this.axios({
                    method: this.method,
                    url: this.endpoint,
                    data: this.User
                }).then(response => {
                    this.$router.push('/usuarios/listagem');
                }).catch(error => {
                    if (error.hasOwnProperty('response') && error.response.status === 422 && error.response.data.errors !== undefined) {
                        console.log(error.response.data.errors)
                        this.errors = error.response.data.errors;
                    }
                })

            }
        }
    }
</script>
