<template>
        <div class="post-container">
            <div class="post_grid-container">
                <div class="post_profile_img-container">
                    <img
                        class="post_profile_img" 
                        :src="photoPath"
                    >
                </div>
            <div class="post_text-container">
                <div class="post_profile_name-container">
                    <p class="post_profile_name">
                        {{name}}
                    </p>
                    {{date()}}
                </div>
                <div class="post_text">
                    <p>
                        {{text}}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="post_footer-container">
            <div class="post_footer_div-container">
                <CommentIcon class="post_footer_icon"/>
                {{comments}}
            </div>
            <div class="post_footer_div-container">
                <RetweetIcon class="post_footer_icon"/>
                {{retweets}}
            </div>
            <div class="post_footer_div-container">
                <LikeIcon class="post_footer_icon"/>
                {{likes}}
            </div>
        </div>
    </div>
</template>

<style scoped>
    .post-container{
        max-width: 100vh;
        width: 100%;
        height: fit-content;
        border-bottom: solid 1px var(--light-gray);
        overflow: hidden;
    }
    .post_grid-container{
        display: grid;
        grid-template-columns: 10% 90%;
        height: fit-content;
        overflow: hidden;
    }
    @media only screen and (max-width: 600px){
        .post_grid-container{
            grid-template-columns: 15% 95%;  
        }
    }
    @media only screen and (max-width: 400px){
        .post_grid-container{
            grid-template-columns: 20% 80%;  
        }
    }
    .post_profile_img-container{
        display:flex;
        align-items: start;
        justify-content: center;
        height: 100%;
        padding: 10px;
        
    }
    .post_profile_img{
        width: 100%;
        border-radius: 10000px;
    }
    .post_text-container{
        height: 100%;
        padding: 10px;
        padding-right: 50px;
    }
    .post_profile_name{
        font-weight: 500;
    }
    .post_footer-container{
        height: 30px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }
    .post_footer_div-container{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .post_footer_icon{
        height: 20px;
        margin: 5px;
        cursor: pointer;
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
            type:String,
            default:Date.now()
        },
        comments:{
            type:Number,
            default:0
        }
    })

    function date (){
        const date = new Date(props.date);
        const date_format = date.toLocaleDateString();
        const time_passed_ms = Date.now() - date.getTime();
        const time_passed_sec = time_passed_ms/1000
        const time_passed_min = time_passed_sec /60
        const time_passed_h = time_passed_min/60
        const time_passed_days = time_passed_h/24

        if(time_passed_min <= 59) return time_passed_min
        if(time_passed_h <= 23) return time_passed_h
        if(time_passed_days <= 6) return time_passed_days

        return date_format
    }
</script>

