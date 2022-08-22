<script setup>
//import GoodsItem from '@/admin/Goods/GoodsItem.vue'
//import GoodsCreator from "@/admin/Goods/GoodsCreator.vue";
//import GoodsOptionRelationships from "@/admin/Goods/GoodsOptionRelationships.vue";
//import GoodsOptionList from "@/admin/Goods/GoodsOptionList.vue";
import FormFilePicker from "@/admin/components/FormFilePicker.vue";

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
  <div class="px-2 py-2 bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <!--
    <GoodsItem :goods="goods" class="flex-1"/>
    -->
    
    <!--
    <GoodsCreator class="flex-1" :goods-id="goodsId" :goods-load="goodsLoad" />
    -->
    
    <!--
    <GoodsOptionRelationships class="flex-1" :goods-id="goodsId"/>
    -->
    
    <!--
    <GoodsOptionList :goods-id="goodsId" class="flex-1"/>
    -->
    
    <FormFilePicker label="Загрузить изображение"/>
  </div>
</template>