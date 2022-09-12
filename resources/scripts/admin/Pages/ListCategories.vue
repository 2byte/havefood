<script setup>
import { computed, ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import SectionMain from "@/admin/components/SectionMain.vue";
import SectionTitleBar from "@/admin/components/SectionTitleBar.vue";
import CardBox from "@/admin/components/CardBox.vue";
import LayoutAuthenticated from "@/admin/layouts/LayoutAuthenticated.vue";
import GoodsCategoryList from '@/admin/Goods/GoodsCategoryList.vue'

const titleStack = ref(["Админ панель", "Категории товаров"]);

defineProps({});
</script>

<script>
export default {
  layout: LayoutAuthenticated,
};
</script>

<template>
  <Head title="Категории товаров" />
  <SectionTitleBar :title-stack="titleStack" />

  <SectionMain>
    <GoodsCategoryList />
  </SectionMain>
</template>