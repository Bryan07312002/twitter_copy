import { describe, it, expect } from 'vitest'
import { mount, shallowMount } from '@vue/test-utils'

import ButtonLightGray from '../ButtonLightGray.vue'

describe('Light Gray Button', ()=>{
    it('Renders',()=>{
        const wrapper = shallowMount(ButtonLightGray)

        expect(wrapper.exists()).toBe(true)
    })

    it('Shows right label',async ()=>{
        const wrapper = shallowMount(ButtonLightGray)
        await wrapper.setProps({label:'ola'})
        expect(wrapper.text()).toBe('ola')
    })
})