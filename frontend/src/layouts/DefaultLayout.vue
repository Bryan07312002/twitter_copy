<template>
    <div class="container organization">
        <Menu />
        <main >
            <slot />
        </main>
    </div>
</template>

<style>
    .organization{
        display: grid;
        grid-template-columns: 15% 1fr;
        height: 100vh;
    }
    main{
        height: 100%;
    }
    @media only screen and (max-width: 1280px){
        .organization{
            grid-template-columns: 80px 1fr;
        }
    }
    @media only screen and (max-width: 800px){
        .organization{
           display: flex;
           flex-direction: column-reverse;
        }
    }
</style>

<script setup>
import Menu from '../components/Menu.vue';
</script>