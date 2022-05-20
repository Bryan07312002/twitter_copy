<template>
    <DefaultLayout>
        <h1>Hello World</h1>
    </DefaultLayout>
</template>

<script setup>
    import DefaultLayout from '../layouts/DefaultLayout.vue';
    import { ApiService } from '../utils/ApiService';
    ApiService.get('user')
</script>