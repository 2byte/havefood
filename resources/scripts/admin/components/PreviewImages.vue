<script setup>
import { watch } from 'vue'
import BaseIcon  from '@/admin/components/BaseIcon.vue'
import { mdiClose } from '@mdi/js'

const props = defineProps({
  images: {
    type: [Array, Object],
    default: [],
  },
});

const remove = () => {
  if (confirm('Удалить изображение?')) {
    
  }
}
</script>

<template>
  <div class="grid grid-cols-2 justify-center gap-4 mb-4">
    <div v-for="(image, index) in images" :key="index" class="relative">
      <div class="absolute inset-0 text-4xl font-bold text-black/80 flex justify-center items-center" v-if="!image.complete">
        {{ image.uploadPercent }}%
      </div>
      <button v-if="image.complete" class="absolute top-0 right-0 text-sm" @click="remove">
        <BaseIcon :path="mdiClose"/>
      </button>
      <img
      :src="image.imageObj"
      :data-upload-percent="image.uploadPercent"
      alt=""
      class="h-60 ring-4 ring-gray-300 shadow-md"
      />
    </div>
  </div>
</template>