<template>
    <div class="bg-white rounded shadow-sm mt-3 p-3">
        <ul class="pagination m-0">
            <li v-for="p in this.pages" class="page-item">
                <a class="page-link"
                   v-bind:href="(this.$router.resolve({name: this.$router.currentRoute.name, query: Object.assign(this.$route.query, {
                            'page': p
                         })}).href)" @click="changePage(p)">
                    {{ p }}
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Pagination",
        props: {
            pages: null
        },
        methods: {
            changePage(p) {
                this.$emit('changePage', p)
            }
        }
    }
</script>
