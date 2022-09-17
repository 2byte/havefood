<script setup>
import { computed, ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import SectionMain from "@/admin/components/SectionMain.vue";
import SectionTitleBar from "@/admin/components/SectionTitleBar.vue";
import CardBox from "@/admin/components/CardBox.vue";
import BaseIcon from "@/admin/components/BaseIcon.vue";
import LayoutAuthenticated from "@/admin/layouts/LayoutAuthenticated.vue";
import GoodsOptionRelationships from "@/admin/Goods/GoodsOptionRelationships.vue";
//import { mdiCashMultiple, mdiShoppingOutline } from "@mdi/js";

const titleStack = ref(["Админ панель", "Управления опциями товаров"]);

defineProps({});
</script>

<script>
export default {
  layout: LayoutAuthenticated,
};
</script>

<template>
  <Head title="Управление опциями товаров" />
  <SectionTitleBar :title-stack="titleStack" />

  <SectionMain>
    <GoodsOptionRelationships />
  </SectionMain>
</template>
