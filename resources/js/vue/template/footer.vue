<template>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 px-4 border-top ">
        <p class="col-md-4 mb-0 text-muted">2023 Attus Pacheco ༼ つ ◕_◕ ༽つ</p>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item">
                <router-link class="nav-link px-2 text-muted" :to="{name: 'home'}">
                    Início
                </router-link>
            </li>
        </ul>
    </footer>
</template>

<script>
    export default {
        name: 'Footer'
    }
</script>
