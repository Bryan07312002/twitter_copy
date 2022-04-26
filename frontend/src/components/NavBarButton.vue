<template>
    <button>
        <slot/>
    </button>
</template>

<style scoped>
    button{
        display: flex;
        width: fit-content;
        height: 50px;
        border: 0;
        align-items: center;
        font-size: 1.2rem;
        padding: 10px;
        padding-left:20px ;
        padding-right:20px ;
        border-radius: 25px;
        background: transparent;
    }
    button:hover{
        transition: .3s;
        background-color: var(--almost-white);
    }
</style>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    setup() {
        
    },
    props:{
        label:String
    }
})
</script>
