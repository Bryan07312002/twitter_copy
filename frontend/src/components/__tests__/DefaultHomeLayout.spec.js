import { describe, it, expect } from 'vitest'
import { mount } from '@vue/test-utils'
import DefaultHomeLayout from '../Layouts/DefaultHomeLayout.vue'

describe('Default Home Layout',()=>{
    it('renders preoperly',()=> {
        const wrapper = mount(DefaultHomeLayout)
        expect(wrapper).toBeCalled
    })
    it('has left menu',()=>{
        const wrapper = mount(DefaultHomeLayout)
        const leftMenu = document.querySelector('.menu_left')
        expect(leftMenu).toBeDefined
    })
})