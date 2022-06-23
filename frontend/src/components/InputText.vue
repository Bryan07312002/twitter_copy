<template>
    <textarea 
        type="text"
        :placeholder="placeholder"
        :value="value"
        @input="updateValue($event.target.value)"
    />
</template>

<style scoped>
    .text{
        height: var(--default-height);
        border:solid 1px lightgray;
        border-radius: 5px;
    }
</style>

<script setup>
    const props = defineProps({
        placeholder:{
            type:String,
            default:''
        },
        value:{
            type:String,
            default:''
        }
    })
    const emit = defineEmits(['updateValue'])

    function updateValue(value){
        emit('updateValue',value)
    }
</script>