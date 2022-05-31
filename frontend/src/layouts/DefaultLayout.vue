<template>
    <div class="container organization">
        <Menu />
        <main class="main-container">
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
    .main-container{
        width: 70%;
    }
    main{
        height: 100%;
        border-right: solid 1px var(--light-gray);
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
        .main-container{
            width: 100%;
        }
    }
</style>

<script setup>
import Menu from '../components/Menu.vue';
</script>