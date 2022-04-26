import { describe, it, expect } from 'vitest'
import { mount, shallowMount } from '@vue/test-utils'

import StartView from '../StartView.vue'

describe('Start View', () => {
  it('renders properly', () => {
    const wrapper = shallowMount(StartView)
    expect(wrapper.html()).toMatchSnapshot
  });

  it('has footer',() => {
    const wrapper = shallowMount(StartView)
    const footer = wrapper.get('.footer-container')
    expect(footer.exists()).toBe(true)
  });

  it('has main content container',() => {
    const wrapper = shallowMount(StartView)
    const main_content_container = wrapper.get('.main_content-container')
    expect(main_content_container.exists()).toBe(true)
  });
})