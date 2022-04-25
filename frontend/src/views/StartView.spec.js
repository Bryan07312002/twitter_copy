import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import StartView from './StartView.vue'

describe('Start View', () => {
  it('renders properly', () => {
    const wrapper = mount(StartView)
    expect(wrapper.text()).toHaveBeenCalledOnce
  });

  it('has footer',() => {
    const wrapper = mount(StartView)
    const footer = document.querySelector('.footer-container')
    expect(footer).toHaveBeenCalled
  });

  it('has main content container',() => {
    const wrapper = mount(StartView)
    const main_content_container = document.querySelector('.main_content-container')
    expect(main_content_container).toHaveBeenCalled
  });


})