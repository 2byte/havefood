/**
* @jest-environment jsdom
*/

import { mount } from '@vue/test-utils'
import FormFilePicker from 'resources/scripts/admin/components/FormFilePicker.vue'

test('Form File picker', () => {
  const wrapper = mount(FormFilePicker, {
    props: {
      label: 'Upload image'
    }
  })

  // Assert the rendered text of the component
  expect(wrapper.text()).toContain('Upload image')
  
})