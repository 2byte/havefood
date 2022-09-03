<script setup>
  import GoodsForm from '@/admin/Goods/GoodsForm.vue'
  
  const props = defineProps({
    goodsId: {
      type: Number,
      default: null
    }
  })
</script>

<template>
  <div
    class="px-2 py-2 bg-gray-100 min-h-screen flex flex-col items-stretch justify-center"
  >
    <GoodsForm
      label="Загрузить изображение"
      test
    />
  </div>
</template>