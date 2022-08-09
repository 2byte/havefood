<script setup>
//import GoodsItem from '@/admin/Goods/GoodsItem.vue'
//import GoodsCreator from "@/admin/Goods/GoodsCreator.vue";
import GoodsOptionRelationships from "@/admin/Goods/GoodsOptionRelationships.vue";

const props = defineProps({
  goods: Object,
  goodsCategories: Object,
  goodsId: {
    type: Number,
    default: null,
  },
  goodsLoad: {
    type: Boolean,
    default: false,
  },
});
</script>

<template>
  <div class="px-2 py-2 bg-gray-100 min-h-screen flex flex-column items-center">
    <!--
    <GoodsItem :goods="goods" class="flex-1"/>
    -->
    
    <!--
    <GoodsCreator class="flex-1" :goods-id="goodsId" :goods-load="goodsLoad" />
    -->
    
    
    <GoodsOptionRelationships class="flex-1" :goods-id="goodsId"/>
    
  </div>
</template>
