<template>
    <button>
        <span>
            {{label}}
        </span>
    </button>
</template>

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

<style scoped>
    button{
        background-color: var(--blue-two);
        color:white;
        border: 0;
    }
</style>