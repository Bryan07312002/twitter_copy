<template>
    <nav class="flex-col">
        <router-link to="/" class="btn-bird hide-when-small">
            <BirdIcon class="svg-menu-size"/>
        </router-link>

        <router-link to="/" class="btn-nav">
            <div class="flex-row .align-center">
                <HomeIcon class="svg-menu-size-small" />
                <p class="hide-when-shrink padding-left">Home</p>
            </div>
        </router-link>
    </nav>
</template>

<script setup>
import BirdIcon from './icons/BirdIcon.vue';
import HomeIcon from './icons/HomeIcon.vue';
</script>

<style scoped>
    nav{
        border-right:solid 1px var(--extra-light-gray);
        width: 100%;
    }

    @media only screen and (max-width: 1280px){
        nav{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .hide-when-shrink{
            display: none !important;
        }
        .btn-nav{
            aspect-ratio: 1;
            padding-left: 10px !important;
            padding-right: 10px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            margin-left:0px !important;
        }
    }
    @media only screen and (max-width: 800px){
        nav{
            border-right:0;
            border-top: solid 1px lightgray;
            height: 15%;
            flex-direction: row;
            justify-content: center;
        }

        .hide-when-small{
            display: none !important;
        }
    }
    .btn-bird{
        border-radius: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        aspect-ratio: 1;
        width: 60px;
        transition: .3s;
        margin: 5px;
    }
    .padding-left{
        padding-left: 10px;
    }
    .btn-bird:hover{
        background-color: azure;
    }
    .btn-nav{
        padding-left: 15px;
        padding-right: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        width: fit-content;
        margin-left:10px ;
        border-radius:100px;
        color: var(--black);
        text-decoration: none;
        transition: .3s;
    }
    .btn-nav:hover{
        background-color: var(--extra-light-gray);
    }
    .svg-menu-size{
        width: 35px;
    }
    .svg-menu-size-small{
        width: 27px;
    }
</style>