<template>
    <div v-if="errors" class="alert alert-danger" role="alert">
        <div v-for="error in errors">
            {{ error[0] }}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'InvalidFields',
        props: {'errors': null}
    }
</script>
