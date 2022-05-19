import { describe, it, expect } from 'vitest'
import { shallowMount } from '@vue/test-utils'

import ButtonDefault from '../ButtonDefault.vue'

describe("Basic Button",()=>{

    it("Render", ()=>{
        const wrapper = shallowMount(ButtonDefault)
        expect(wrapper.exists()).toBe(true)
    })
    it('Shows default slot',async ()=>{
        const wrapper = shallowMount(ButtonDefault,{
            slots:{
                default:"<h1>Hello Button</h1>"
            }
        })
        
        expect(wrapper.text()).contain('Hello Button')
    })
})