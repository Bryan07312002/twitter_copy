import { describe, it, expect } from 'vitest'
import { mount, shallowMount } from '@vue/test-utils'

import PostCard from '../PostCard.vue'

describe('Post Card', ()=>{
    it('Renders',()=>{
        const wrapper = shallowMount(PostCard)
        expect(wrapper.exists()).toBe(true)
    })

    it('Shows Post Content',async ()=>{
        const wrapper = shallowMount(PostCard)
        const props = {
            post:'post',
            userName:'userName',
            userAccount:'userAccount',
            profile_photo_path:'profile_photo_path',
            date:'date',
            numberLikes:'numberLikes',
            numberRetweets:'numberRetweets',
            photo_paths:[
                'photo1',
                'photo2',
                'photo3',
                'photo4',
            ]
        }
        await wrapper.setProps(props)

        expect(wrapper.get('div').html()).toContain(props.post)
    })

    
})