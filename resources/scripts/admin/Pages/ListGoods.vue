<script setup>
import { computed, ref } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'
import SectionMain from '@/admin/components/SectionMain.vue'
import SectionTitleBar from '@/admin/components/SectionTitleBar.vue'
import LayoutAuthenticated from '@/admin/layouts/LayoutAuthenticated.vue'

const titleStack = ref(['Админ панель', 'Товары'])
</script>
<script>
    export default {
        layout: LayoutAuthenticated
    }
</script>

<template>
    <Head title="Список товаров" />
    <SectionTitleBar :title-stack="titleStack" />
    
    <SectionMain>
        gjj
    </SectionMain>
</template>