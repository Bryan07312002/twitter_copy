<template>
    <div>{{post}}</div>
    <div>{{userName}}</div>
    <div>{{userAccount}}</div>
    <div>{{profile_photo_path}}</div>
    <div>{{date}}</div>
    <div>{{numberLikes}}</div>
    <div>{{numberRetweets}}</div>
    <div>{{photo_paths}}</div>
</template>

<script>
  import { defineComponent } from 'vue'

  export default defineComponent({
    props:{
        post:String,
        userName:String,
        userAccount:String,
        profile_photo_path:String,
        date:String,
        numberLikes:String,
        numberRetweets:String,
        photo_paths:Array
    }
  })
</script>