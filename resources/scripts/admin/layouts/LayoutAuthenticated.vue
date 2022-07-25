<script setup>
import { computed } from 'vue'
import { useLayoutStore } from '@/admin/stores/layout.js'
import { useStyleStore } from '@/admin/stores/style.js'
import menu from '@/admin/menu.js'
import NavBar from '@/admin/components/NavBar.vue'
import AsideMenu from '@/admin/components/AsideMenu.vue'
import FooterBar from '@/admin/components/FooterBar.vue'
import OverlayLayer from '@/admin/components/OverlayLayer.vue'

const styleStore = useStyleStore()

const layoutStore = useLayoutStore()

const isAsideLgActive = computed(() => layoutStore.isAsideLgActive)

const overlayClick = () => {
  layoutStore.asideLgToggle(false)
}
</script>

<template>
  <div :class="{ 'dark': styleStore.darkMode, 'overflow-hidden lg:overflow-visible': layoutStore.isAsideMobileExpanded }">
    <div
      :class="[styleStore.appStyle, { 'ml-60 lg:ml-0': layoutStore.isAsideMobileExpanded }]"
      class="pt-14 xl:pl-60 w-screen transition-position lg:w-auto"
    >
      <NavBar />
      <AsideMenu :menu="menu" />
      <slot />
      <FooterBar />
      <OverlayLayer
        v-show="isAsideLgActive"
        z-index="z-30"
        @overlay-click="overlayClick"
      />
    </div>
  </div>
</template>
