<script setup>
import { mdiGithub } from '@mdi/js'
import BaseLevel from '@/admin/components/BaseLevel.vue'
import BaseButton from '@/admin/components/BaseButton.vue'

defineProps({
  titleStack: {
    type: Array,
    default: () => []
  }
})
</script>

<template>
  <section class="p-6">
    <BaseLevel>
      <ul>
        <li
          v-for="(title, index) in titleStack"
          :key="index"
          class="section-title-bar-stack-item inline-block pr-3 text-2xl text-gray-500 dark:text-gray-400 last:pr-0 last:font-black last:text-black"
        >
          {{ title }}
        </li>
      </ul>
    </BaseLevel>
  </section>
</template>
