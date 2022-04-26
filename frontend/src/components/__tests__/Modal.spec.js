import { describe, it, expect } from 'vitest'
import { mount, shallowMount } from '@vue/test-utils'

import Modal from '../Modal.vue'

describe('Modal',()=>{
    it('renders',()=>{
        const wrapper = shallowMount(Modal)
        expect(wrapper.exists()).toBe(true)
    })
})