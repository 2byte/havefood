<script setup>
import { computed, ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import SectionMain from "@/admin/components/SectionMain.vue";
import SectionTitleBar from "@/admin/components/SectionTitleBar.vue";
import CardBox from "@/admin/components/CardBox.vue";
import BaseIcon from "@/admin/components/BaseIcon.vue";
import LayoutAuthenticated from "@/admin/layouts/LayoutAuthenticated.vue";
import Paginate from "@/admin/components/Paginate.vue";
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
    <CardBox
      v-for="good in goods.data"
      :title="good.name"
      :key="good.id"
      class="mb-2 shadow-sm"
      :icon="mdiShoppingOutline"
    >
      <div class="font-sm text-gray-500">
        {{ good.description }}
      </div>
      <div class="text-stone-500">
        <BaseIcon :path="mdiCashMultiple" /> Цена: {{ good.price }}
      </div>
    </CardBox>

    <Paginate :links="goods.links" />
  </SectionMain>
</template>
