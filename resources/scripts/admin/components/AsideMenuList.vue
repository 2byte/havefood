<script setup>
import AsideMenuItem from '@/admin/components/AsideMenuItem.vue'

defineProps({
  isSubmenuList: {
    type: Boolean,
    default: false
  },
  menu: {
    type: Array,
    default: () => []
  }
})

const emit = defineEmits(['menu-click'])

const menuClick = (event, item) => {
  emit('menu-click', event, item)
}
</script>

<template>
  <ul>
    <AsideMenuItem
      v-for="(item, index) in menu"
      :key="index"
      :item="item"
      :is-submenu-list="isSubmenuList"
      @menu-click="menuClick"
    />
  </ul>
</template>
