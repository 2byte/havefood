<script setup>
const props = defineProps({
  images: {
    type: [Array, Object],
    default: [],
  },
});
</script>

<template>
  <div class="grid grid-cols-2 justify-center gap-4 mb-4">
    <img
      v-for="(image, index) in images"
      :src="image"
      alt=""
      :key="index"
      class="h-60 ring-4 ring-gray-300 shadow-md"
    />
  </div>
</template>
