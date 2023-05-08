<template>
    <nav class="d-flex justify-content-between mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <router-link :to="{name: 'home'}">Início</router-link>
            </li>
            <li class="breadcrumb-item">
                <router-link :to="{name: 'users'}">Usuários</router-link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Editar
            </li>
        </ol>
    </nav>

    <Form v-bind:method="method" v-bind:endpoint="endpoint"></Form>
</template>

<script>
    import Form from "@/vue/pages/users/form.vue";

    export default {
        components: {Form},
        data () {
            return {
                method: 'patch',
                endpoint: `/api/users/update/${this.$route.params.id}`
            }
        }
    }

</script>
