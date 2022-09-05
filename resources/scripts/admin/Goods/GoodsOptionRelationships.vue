<script setup>
import { computed, watch, ref } from "vue";
import { storeToRefs } from "pinia";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import GoodsOptionForm from "@/admin/Goods/GoodsOptionForm.vue";
import { useGoodsOptionStore } from "@/admin/stores/goodsOptionStore.js";
import { mdiPlus } from "@mdi/js";

const props = defineProps({
  goodsId: Number,
});

// load an options
const {
  list,
  tree,
  loading,
  error: errorStore,
} = storeToRefs(useGoodsOptionStore());
const { load } = useGoodsOptionStore();

load(props.goodsId);

const isCreateOption = ref(false);

const slides = {
  
}
</script>

<template>
  <CardBox :loader="loading">
    <nav class="mb-4 shadow-sm overflow-x-auto">
      <ul class="list-none w-max devide-x">
        <li
          class="inline-block bg-zinc-100 text-zinc-500 px-4 py-2 border border-solid border-zinc-200 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600"
        >
          Опции к товару
        </li>
        <li class="inline-block bg-zinc-100 text-zinc-500 px-4 py-2 border border-solid border-zinc-200 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600"
        >
          Мои опции
        </li>
        <li class="inline-block bg-zinc-100 text-zinc-500 px-4 py-2 border border-solid border-zinc-200 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600"
        >
          Все опции
        </li>
      </ul>
    </nav>

    <GoodsOptionForm v-if="isCreateOption" :goods-id="goodsId" class="mb-2" />

    <BaseButton
      color="success"
      label="Создать опцию"
      :icon="mdiPlus"
      @click="isCreateOption = true"
    />
  </CardBox>
</template>
