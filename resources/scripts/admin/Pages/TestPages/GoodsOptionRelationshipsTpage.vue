<script setup>
  import GoodsOptionRelatiobships from '@/admin/Goods/GoodsOptionRelationships.vue'
  
  const props = defineProps({
    goodsId: {
      default: null
    }
  })
</script>

<template>
  <div
    class="px-2 py-2 bg-gray-100 min-h-screen flex flex-col items-stretch justify-center"
  >
    <GoodsOptionRelatiobships :goods-id="goodsId"/>
  </div>
</template>