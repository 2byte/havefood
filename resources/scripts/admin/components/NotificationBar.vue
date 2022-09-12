<script setup>
import { ref, computed, useSlots, onMounted } from 'vue'
import { mdiClose } from '@mdi/js'
import { colorsBg, colorsBorders, colorsOutline } from '@/admin/colors.js'
import BaseLevel from '@/admin/components/BaseLevel.vue'
import BaseIcon from '@/admin/components/BaseIcon.vue'
import BaseButton from '@/admin/components/BaseButton.vue'

const props = defineProps({
  icon: {
    type: String,
    default: null
  },
  outline: Boolean,
  color: {
    type: String,
    required: true
  },
  timeout: false
})

const emit = defineEmits(['dismiss'])

const componentClass = computed(() => props.outline
  ? colorsOutline[props.color]
  : [colorsBg[props.color], colorsBorders[props.color]])

const isDismissed = ref(false)

const dismiss = () => {
  isDismissed.value = true
}

const slots = useSlots()

const hasRightSlot = computed(() => slots.right)

onMounted(() => {
  if (props.timeout) {
    setTimeout(() => { 
      dismiss() 
      emit('dismiss')
    }, props.timeout)
  }
})
</script>

<template>
  <div
    v-if="!isDismissed"
    :class="componentClass"
    class="px-3 py-6 md:py-3 mx-6 md:mx-0 mb-6 last:mb-0 border rounded transition-colors duration-500"
  >
    <BaseLevel>
      <div class="flex flex-col md:flex-row items-center">
        <BaseIcon
          v-if="icon"
          :path="icon"
          w="w-10 md:w-5"
          h="h-10 md:h-5"
          size="24"
          class="md:mr-2"
        />
        <span class="text-center md:text-left"><slot /></span>
      </div>
      <slot
        v-if="hasRightSlot"
        name="right"
      />
      <BaseButton
        v-else
        :icon="mdiClose"
        :outline="outline"
        small
        @click="dismiss"
      />
    </BaseLevel>
  </div>
</template>
