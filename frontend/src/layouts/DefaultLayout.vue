<template>
    <div class="layout-container">
        <aside class="aside-nav">
            <NavBar class="navClass"/>
        </aside>
        
    </div>
</template>

<style scoped>
    .layout-container{
        max-height: 100vh;
        max-width: 1280px;
        display:grid;
        grid-template-columns: .2fr 1fr;
    }
    .aside-nav{
        display: flex;
        position: relative;
    }
    ::-webkit-scrollbar{
        width: 5px;
    }
    ::-webkit-scrollbar-track{
        background-color: rgb(0, 0, 0,.1);
    }
    ::-webkit-scrollbar-thumb{
        background-color: rgb(0, 0, 0,.2);
        border-radius:10px ;
    }
</style>

<script>
import { defineComponent } from 'vue'
import NavBar from '../components/NavBar.vue'

export default defineComponent({
    components:{
        NavBar
    }
})
</script>
