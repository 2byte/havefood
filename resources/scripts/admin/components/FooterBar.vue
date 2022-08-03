<script setup>
import { computed } from 'vue'
import BaseLevel from '@/admin/components/BaseLevel.vue'
import JustboilLogo from '@/admin/components/JustboilLogo.vue'

const year = computed(() => new Date().getFullYear())
</script>

<template>
  <footer
    class="bg-white py-2 px-6 dark:bg-gray-900/70"
  >
    <BaseLevel>
      <div class="text-center md:text-left">
        <b>&copy; {{ year }}, <a
          :href="route('home.index')"
          target="_blank"
        >HaveFood.Ru</a>.</b>
      </div>
      <div class="md:py-2">
        <!--<a href="https://justboil.me">
          <JustboilLogo class="w-auto h-8 md:h-6" />
        </a>-->
      </div>
    </BaseLevel>
  </footer>
</template>
