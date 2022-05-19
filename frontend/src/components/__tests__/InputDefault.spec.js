import { describe, it, expect } from 'vitest'
import { shallowMount } from '@vue/test-utils'

import InputDefault from '../InputDefault.vue'

describe("Basic input",()=>{

    it("Render", ()=>{
        const wrapper = shallowMount(InputDefault)
        expect(wrapper.exists()).toBe(true)
    })
    it('Emit UpdateValue Event',async ()=>{
        const wrapper = shallowMount(InputDefault)
        const input = wrapper.getComponent('input')
        await input.setValue('Hello')
        await wrapper.vm.$nextTick()
        const emittedValue = wrapper.emitted()
        expect(emittedValue['update:modelValue'][0][0]).toBe('Hello')
    })
})