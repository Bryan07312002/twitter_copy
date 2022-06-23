<template>
    <div class="">
        <Modal
            :isOpen="is_open"
            :canClose="true"
            @CloseModal="emits('CloseModal')"
        >
            <div class="post_modal-container">
                <Text 
                    @update-value="content = $event"
                    class="text"
                />
                <ButtonPost
                    @click="emits('CloseModal')"
                    :content="content"
                />
            </div>
        </Modal>
    </div>
</template>

<style scoped>
    .post_modal-container{
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .btn-blue {
        min-width: 100px;
        margin-top: 10px;
    }
    .text{
        width: 60vh;
        min-height: 200px;
        text-align: left;
        justify-content: end;
        resize: none;
    }
</style>

<script setup>
    import { ref } from 'vue'
    import Modal from '@/components/ModalDefault.vue';
    import Text from './InputText.vue';
    import ButtonPost from './ButtonPost.vue';

    const content = ref('')

    const props = defineProps({
        is_open: {
            type: Boolean,
            default: false,
        },
    })
    const emits = defineEmits(['CloseModal'])
</script>