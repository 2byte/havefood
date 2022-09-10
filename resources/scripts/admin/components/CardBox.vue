<script setup>
import { mdiCog } from '@mdi/js'
import { computed, ref } from 'vue'
import BaseIcon from '@/admin/components/BaseIcon.vue'
import Loader from '@/admin/components/Loader.vue'

const props = defineProps({
  title: {
    type: String,
    default: null
  },
  icon: {
    type: String,
    default: null
  },
  headerIcon: {
    type: String,
    default: null
  },
  rounded: {
    type: String,
    default: 'md:rounded'
  },
  hasTable: Boolean,
  empty: Boolean,
  emptyMessage: {
    type: String, 
    default: 'Ничего нет'
  },
  form: Boolean,
  hoverable: Boolean,
  modal: Boolean,
  loader: Boolean,
  actionButtons: {
    type: Array,
    default: () => []
  }
})

const emit = defineEmits(['header-icon-click', 'submit'])

const is = computed(() => props.form ? 'form' : 'div')

const componentClass = computed(() => {
  const base = [
    props.rounded,
    props.modal ? 'dark:bg-gray-900' : 'dark:bg-gray-900/70'
  ]

  if (props.hoverable) {
    base.push('hover:shadow-lg transition-shadow duration-500')
  }

  return base
})

//const computedHeaderIcon = computed(() => props.headerIcon ?? mdiCog)
const computedHeaderIcon = computed(() => props.headerIcon ?? false)

let headerIconFocus = false
const headerIconLink = ref(null)

const headerIconClick = () => {
  emit('header-icon-click')
  
  if (headerIconFocus) {
    headerIconLink.value.blur()
  }
  
  headerIconFocus = !headerIconFocus
}

const submit = e => {
  emit('submit', e)
}

// Action button the focusable
const stateActionButtons = new Map()

const clickActionButton = (el, btn) => {
  const isFocusElem = () => {
    return stateActionButtons.has(el) && stateActionButtons.get(el)
  }
  const focusElem = () => { stateActionButtons.set(el, true) }
  
  const unfocusElem = () => {
    el.blur()
    stateActionButtons.set(el, false)
  }

  const unfocusOtherwise = () => {
    stateActionButtons.forEach((val, elem) => {
      if (elem != el) {
        stateActionButtons.set(elem, false)
      }
    })
    props.actionButtons.forEach((arrItemBtn) => {
      if (arrItemBtn.id != btn.id) {
        btnSetIsActive(arrItemBtn, false)
      }
    })
  }
  
  const btnSetIsActive = (btnLink, val = true) => {
    if (btnLink.hasOwnProperty('isActive')) {
      btnLink.isActive.value = val;
    }
  }
  
  if (!isFocusElem()) {
    btn.click()
    focusElem()
    btnSetIsActive(btn, true)
    unfocusOtherwise()
  } else {
    btnSetIsActive(btn, false)
    unfocusElem()
  }
}
</script>

<template>
  <component
    :is="is"
    :class="componentClass"
    class="relative bg-white border border-gray-100 dark:border-gray-800"
    @submit="submit"
  >
    <header
      v-if="title"
      class="flex items-stretch border-b border-gray-100 dark:border-gray-800"
    >
      <p
        class="flex items-center py-3 grow font-bold"
        :class="[ icon ? 'px-4' : 'px-6' ]"
      >
        <BaseIcon
          v-if="icon"
          :path="icon"
          class="mr-3"
        />
        {{ title }}
      </p>
      
      <a
        v-for="(actBtn, index) in actionButtons"
        href="#"
        class="flex items-center py-3 px-4 justify-center ring-blue-700 focus:ring"
        aria-label="more options"
        @click.prevent="clickActionButton($event.currentTarget, actBtn)"
        :key="index"
      >
        <BaseIcon :path="actBtn.icon" />
      </a>
      <a
        v-if="computedHeaderIcon"
        href="#"
        class="flex items-center py-3 px-4 justify-center ring-blue-700 focus:ring"
        aria-label="more options"
        @click.prevent="headerIconClick"
        ref="headerIconLink"
      >
        <BaseIcon :path="computedHeaderIcon" />
      </a>
    </header>
    <div
      v-if="empty"
      class="text-center py-24 text-gray-500 dark:text-gray-400"
    >
      <p>{{ emptyMessage }}</p>
    </div>
    <div
      v-else
      :class="{'p-6':!hasTable}"
    >
      <slot />
    </div>
    <div v-if="loader" class="absolute bg-slate-400/70 inset-0 flex justify-center items-center">
      <Loader size="72" w="auto" h="auto" type="circle2"/>
    </div>
  </component>
</template>
