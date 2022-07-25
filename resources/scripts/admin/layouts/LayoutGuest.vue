<script setup>
import { useStyleStore } from '@/admin/stores/style.js'

const styleStore = useStyleStore()
</script>

<template>
  <div :class="{ 'dark': styleStore.darkMode }">
    <div :class="styleStore.appStyle">
      <slot />
    </div>
  </div>
</template>
