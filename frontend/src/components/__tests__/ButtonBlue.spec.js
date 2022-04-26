import { describe, it, expect } from 'vitest'
import { mount, shallowMount } from '@vue/test-utils'

import ButtonBlue from '../ButtonBlue.vue'

describe('Blue Button', ()=>{
    it('Renders',()=>{
        const wrapper = shallowMount(ButtonBlue)

        expect(wrapper.exists()).toBe(true)
    })
    
    it('Shows right label',async ()=>{
        const wrapper = shallowMount(ButtonBlue)
        await wrapper.setProps({label:'ola'})
        expect(wrapper.text()).toBe('ola')
    })
})