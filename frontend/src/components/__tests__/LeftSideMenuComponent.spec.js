
import { describe, it, expect } from 'vitest'
import { mount } from '@vue/test-utils'
import LeftSideMenuComponent from '../Menu/LeftSideMenuComponent.vue'

describe('LeftMenuComponent',()=>{
    it('renders',()=>{
        const wrapper = mount(LeftSideMenuComponent)
        expect(wrapper).toBeCalled
    })
    it('has logo button component',()=>{
        const wrapper = mount(LeftSideMenuComponent)
        const logoButton = wrapper.get('.logo-button') 
        expect(logoButton).toBeTruthy
    })
    it('has menu-container',()=>{
        const wrapper = mount(LeftSideMenuComponent)
        const logoButton = wrapper.get('.menu-container') 
        expect(logoButton).toBeTruthy
    })
})