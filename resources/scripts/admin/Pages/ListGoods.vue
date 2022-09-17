<script setup>
import { computed, ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import SectionMain from "@/admin/components/SectionMain.vue";
import SectionTitleBar from "@/admin/components/SectionTitleBar.vue";
import CardBox from "@/admin/components/CardBox.vue";
import BaseIcon from "@/admin/components/BaseIcon.vue";
import LayoutAuthenticated from "@/admin/layouts/LayoutAuthenticated.vue";
import Paginate from "@/admin/components/Paginate.vue";
import GoodsItem from "@/admin/Goods/GoodsItem.vue";
import NotificationBar from "@/admin/components/NotificationBar.vue";
import { mdiCashMultiple, mdiShoppingOutline } from "@mdi/js";

const titleStack = ref(["Админ панель", "Товары"]);

defineProps({
  category: Object,
  goods: Object,
});
</script>
<script>
export default {
  layout: LayoutAuthenticated,
};
</script>

<template>
  <Head title="Список товаров" />
  <SectionTitleBar :title-stack="titleStack" />

  <div v-if="category" class="flex justify-center text-stone-600">
    <div>Категория</div>
    <div class="font-semibold ml-4">
      {{ category.name }}
    </div>
  </div>

  <SectionMain>
    <GoodsItem v-for="goodsItem in goods.data" :goods="goodsItem" :key="goodsItem.id" />
    
    <NotificationBar v-if="!goods.data.length" color="info">
      В данной категории пока нет товара
    </NotificationBar>
    
    <Paginate :links="goods.links" />
  </SectionMain>
</template>
