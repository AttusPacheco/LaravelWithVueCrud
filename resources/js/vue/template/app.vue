<template>
    <main>
        <Navbar/>

        <div class="bg-light my-5">
            <div class="container">
                <router-view/>
            </div>
        </div>

        <Footer/>
    </main>
</template>

<script>
    import Footer from "@/vue/template/footer.vue";
    import Navbar from "@/vue/template/navbar.vue";

    export default {
        components: {Footer, Navbar},
    }
</script>
