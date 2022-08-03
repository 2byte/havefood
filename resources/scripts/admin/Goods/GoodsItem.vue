<script setup>
    import CardBox from '@/admin/components/CardBox.vue'
    import BaseIcon from '@/admin/components/BaseIcon.vue'
    import {
        mdiCashMultiple,
        mdiShoppingOutline
    } from '@mdi/js'
    
    const props = defineProps({
        'goods': Object
    })
</script>

<template>
    <CardBox :title="goods.name" class="mb-2 shadow-sm" :icon="mdiShoppingOutline">
        <div class="font-sm text-gray-500">{{ goods.description }}</div>
        <div class="text-stone-500"> <BaseIcon :path="mdiCashMultiple" /> Цена: {{ goods.price }}</div>
    </CardBox>
</template>