import { describe, it, expect } from 'vitest'
import { shallowMount,mount } from '@vue/test-utils'

import ModalDefault from '../ModalDefault.vue'

describe('Default Modal', ()=>{

    it('Renders',()=>{
        const wrapper = mount(ModalDefault)
        expect(wrapper.exists()).toBe(true)
    })
    it.skip('Show Default Slots',async ()=>{
        const wrapper = shallowMount(ModalDefault,{
            slots:{
                default:"<h1>Hello Button</h1>"
            },
            
        })

        await wrapper.setProps({
            isOpen:true
        })

        expect(wrapper.text()).contain('Hello World')
    })
})