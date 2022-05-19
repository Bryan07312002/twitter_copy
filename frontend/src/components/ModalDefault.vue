<template>
    <teleport v-if="isOpen" to="body">
        <div class="background">
            <div class="Modal-window">
                <button v-if="canClose" class="Modal-close-button">
                    X
                </button>
                <div class="Modal-container">
                    <slot />
                </div>
            </div>
        </div>
    </teleport>
</template>

<script setup>
    const props = defineProps({
        isOpen:{
            type:Boolean,
            default(){
                return false
            }
        },
        canClose:{
            type:Boolean,
            default(){
                return true
            }
        },
    })

    const emit = defineEmits(['CloseModal'])

    function emitCloseModal(){
        emit('CloseModal',false)
    }
</script>
<script>
  export default {
    name: 'Login Layout',
    inheritAttrs: false,
  }
</script>

<style scoped>
    .background{
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 999999;
        background: rgb(0, 0, 0,.45);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .Modal-window{
        padding: 20px;
        background: #fff;
        border: solid 1px lightgray;
        border-radius: 10px;
    }
    .Modal-close-button{
        border: 0;
        background: transparent;
        font-size: 2rem;
        cursor: pointer;
    }
</style>
