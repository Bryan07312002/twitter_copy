<template>
    <div class="post-container">
        <div class="post_profile-container">
            <img 
                class="post_profile_img"
                :src="photoPath"
            >
            <span class="post_profile_name-container">
                <p class="post_profile_name">{{name}}</p>
            </span>
        </div>
        <div class="post_text-container">
            <span class="post_text">{{text}}</span>
        </div>
        <div class="post_footer-container">
            <div class="post_footer_div-container">
                <CommentIcon class="post_footer_icon"/>
                <span class="post_footer_number">{{comments}}</span>
            </div>
            <div class="post_footer_div-container">
                <RetweetIcon class="post_footer_icon"/>
                <p class="post_footer_number">{{retweets}}</p>
            </div>
            <div class="post_footer_div-container">
                <likeIcon class="post_footer_icon"/>
                <p class="post_footer_number">{{likes}}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .post-container{
        width: 100%;
        border-top:solid 1px var(--light-gray);
        border-bottom:solid 1px var(--light-gray);
    }
    .post_profile-container{
        width: 100%;
        height: 50px;
        display:flex;
        flex-direction:row;
    }
    .post_profile_img{
        height:100%;
    }
    .post_text-container{
        width: 100%;
        min-height:100px;
    }
    .post_footer-container{
        display:flex;
        flex-direction: row;
        justify-content: space-around;
    }
    .post_footer_div-container{
        display:flex;
        background:lightblue;
        width:100%;
    }
    .post_footer_icon{
        height:20px;
    }
    .post_footer_number{
        font-size:1rem;
        margin-left:10px;
    }
</style>

<script setup>
    import CommentIcon from './icons/CommentIcon.vue';
    import RetweetIcon from './icons/RetweetIcon.vue';
    import LikeIcon from './icons/LikeIcon.vue';
    const props = defineProps({
        photoPath:{
            type:String,
            default:''
        },
        name:{
            type:String,
            default:''
        },
        text:{
            type:String,
            default:''
        },
        likes:{
            type:Number,
            default:0
        },
        retweets:{
            type:Number,
            default:0
        },
        date:{
            type:Date,
            default:Date.now()
        },
        comments:{
            type:Number,
            default:0
        }
    })
</script>
