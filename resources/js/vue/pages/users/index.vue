<template>
    <nav class="d-flex justify-content-between mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <router-link :to="{name: 'home'}">Início</router-link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Usuários
            </li>
        </ol>
        <div class="actions">
            <router-link class="btn btn-primary" :to="{name: 'users.create'}">Criar</router-link>
        </div>
    </nav>
    <div class="bg-white rounded shadow-sm p-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Criado em</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user) in users">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ações
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <router-link class="dropdown-item" :to="{name: 'users.edit', params: {id: user.id}}">
                                        Editar
                                    </router-link>
                                </li>
                                <li>
                                    <button class="dropdown-item" @click="deleteUser(user.id)">
                                        Excluir
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <Pagination v-bind:pages="this.pagination.pages" @changePage="changePage"></Pagination>
</template>

<script>
    import Pagination from "@/vue/pages/components/pagination.vue";

    export default {
        name: "users",
        components: {Pagination},
        data() {
            return {
                users: [],
                pagination: {
                    pages: 0,
                    page: 0,
                }
            }
        },
        methods: {
            changePage(page) {
                this.pagination.page = page
                this.getUsers()
            },
            async getUsers() {
                await this.axios.get(`/api/users?page=${this.pagination.page}`).then(response => {
                    this.users = response.data.users
                    this.pagination = response.data.pagination
                }).catch(() => {
                    this.users = []
                })
            },
            async deleteUser(id) {
                await this.axios.delete(`/api/users/${id}`).then(() => {
                    this.getUsers()
                })
            }
        },
        mounted() {
            this.getUsers()
        }
    }
</script>
