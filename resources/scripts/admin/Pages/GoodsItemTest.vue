<script setup>
    import GoodsItem from '@/admin/Goods/GoodsItem.vue'
    
    defineProps({
        'goods': Object
    })
</script>

<template>
    <div class="px-2 py-2 bg-gray-100 h-screen flex flex-column items-center">
        <GoodsItem :goods="goods" class="flex-1"/>
    </div>
</template>