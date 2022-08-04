<script setup>
    //import GoodsItem from '@/admin/Goods/GoodsItem.vue'
    import GoodsCreator from '@/admin/Goods/GoodsCreator.vue'
    
    defineProps({
        'goods': Object,
        'goodsCategories': Object
    })
</script>

<template>
    <div class="px-2 py-2 bg-gray-100 h-screen flex flex-column items-center">
        <!--
        <GoodsItem :goods="goods" class="flex-1"/>
        -->
        <GoodsCreator class="flex-1" :goods-categories="goodsCategories"/>
    </div>
</template>