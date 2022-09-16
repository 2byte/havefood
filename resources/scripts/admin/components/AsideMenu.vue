<script setup>
import { watch, reactive } from 'vue'
import { useStyleStore } from '@/admin/stores/style.js'
import { useLayoutStore } from '@/admin/stores/layout.js'
import { useCategoriesStore } from '@/admin/stores/categories.js'
import { storeToRefs } from 'pinia'
import { mdiMenu, mdiFolder } from '@mdi/js'
import AsideMenuList from '@/admin/components/AsideMenuList.vue'
import NavBarItem from '@/admin/components/NavBarItem.vue'
import BaseIcon from '@/admin/components/BaseIcon.vue'

const props = defineProps({
  menu: {
    type: Array,
    //default: () => []
    default: reactive([])
  }
})

const menuItems = reactive(props.menu)
const styleStore = useStyleStore()

const layoutStore = useLayoutStore()

const menuClick = () => {
  //
}

const { fetchAllCategories } = useCategoriesStore()
const { listCategories } = storeToRefs(useCategoriesStore())

fetchAllCategories()

watch(listCategories, (categories) => {
  const menuRef = menuItems[3][2];
  
  if (menuRef.length) return;
  
  menuRef.menu.push(...categories.map((category) => {
      return {
          label: `${category.name} (${category.count_goods})`,
          icon: mdiFolder,
          //route: 'admin.list-goods',
          route: ['admin.list-goods', [category.id]],
      }
  }));
})
</script>

<template>
  <aside
    id="aside"
    class="w-60 fixed top-0 z-40 h-screen transition-position lg:left-0 overflow-y-auto
    dark:border-r dark:border-gray-800 dark:bg-gray-900 xl:dark:bg-gray-900/70"
    :class="[ styleStore.asideStyle, layoutStore.isAsideMobileExpanded ? 'left-0' : '-left-60', layoutStore.isAsideLgActive ? 'block' : 'lg:hidden xl:block' ]"
  >
    <div
      class="flex flex-row w-full flex-1 h-14 items-center dark:bg-transparent"
      :class="[ styleStore.asideBrandStyle ]"
    >
      <NavBarItem
        type="hidden lg:flex xl:hidden"
        :active-color="styleStore.asideMenuCloseLgStyle"
        active
        @click="layoutStore.asideLgToggle(false)"
      >
        <BaseIcon
          :path="mdiMenu"
          class="cursor-pointer"
          size="24"
        />
      </NavBarItem>
      <div class="flex-1 px-3">
        <span>Меню</span> <b class="font-black">Админ</b>
      </div>
    </div>
    <div>
      <template v-for="(menuGroup, index) in menuItems">
        <p
          v-if="typeof menuGroup === 'string'"
          :key="`a-${index}`"
          class="p-3 text-xs uppercase"
          :class="styleStore.asideMenuLabelStyle"
        >
          {{ menuGroup }}
        </p>
        <AsideMenuList
          v-else
          :key="`b-${index}`"
          :menu="menuGroup"
          @menu-click="menuClick"
        />
      </template>
    </div>
  </aside>
</template>
