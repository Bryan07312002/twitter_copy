<template>
    <Button
        class="btn-blue"
        @click="SendPost()"
    >
        Post
    </Button>
</template>

<script setup>
    import Button from './ButtonDefault.vue';
    import { ApiService } from "@/utils/ApiService";

    const props = defineProps({
        content:{
            type:String,
            default:''
        }
    })

    function SendPost(){
        try{
            ApiService.post('post', {
                content : props.content,
                has_img:false
            })
        }catch(e){

        }
    }
</script>
