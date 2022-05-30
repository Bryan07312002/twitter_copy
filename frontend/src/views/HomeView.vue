<template>
    <DefaultLayout>
        <Post 
            photoPath="https://64.media.tumblr.com/3c948972b7be8a79f1436393a3a26281/tumblr_ogw26dCy7A1smd799o1_1280.jpg"
            name="kami Ozato Nigari"
            text="Hello twitter"
            likes="132"
            retweets="13"
            comments="15"
        />
    </DefaultLayout>
</template>

<script setup>
    import DefaultLayout from '../layouts/DefaultLayout.vue';
    import { ApiService } from '../utils/ApiService';
    import Post from '../components/Post.vue'
    ApiService.get('user')
</script>