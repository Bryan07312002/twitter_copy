<template>
    <DefaultLayout>
        <Post 
            v-for="tweet in tweets"
            v-bind:key="tweet"
            :photoPath="''"
            :name="tweet.user.name"
            :text="tweet.content"
            :likes="tweet.like_number"
            :retweets="tweet.retweet_number"
            :comments="tweet.comment_number"
        />
        {{tweets[0]}}
    </DefaultLayout>
</template>

<script setup>
    import {ref,onMounted} from 'vue'
    import DefaultLayout from '../layouts/DefaultLayout.vue';
    import { ApiService } from '../utils/ApiService';
    import Post from '../components/Post.vue'
    
    const tweets = ref()
    async function getFeed(){
        tweets.value = await ApiService.get('feed')
        tweets.value  = tweets.value.data
    }
    getFeed()
    onMounted(() => {
        
    })
    
</script>