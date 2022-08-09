<script setup>
import { computed, watch, ref } from "vue";
import { storeToRefs } from "pinia";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import GoodsOptionCreator from "@/admin/Goods/GoodsOptionCreator.vue";
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

const isCreateOption = ref(false)
</script>

<template>
  <CardBox :loader="loading">
    <nav>
      <ul class="list-none">
        <li class="inline">Опции к товару</li>
        <li class="inline">Мои опции</li>
        <li class="inline">Все опции</li>
      </ul>
    </nav>

    <div class="flex flex-1 justify-beetwen w-full overflow-auto snap-x mb-2">
      <div class="snap-center w-full flex-none">ff</div>
      <div class="snap-center w-full flex-none">option2</div>
    </div>

    <GoodsOptionCreator v-if="isCreateOption" :goods-id="goodsId" class="mb-2" />
    <BaseButton
      color="success"
      label="Создать опцию"
      :icon="mdiPlus"
      @click="isCreateOption = true"
    />
  </CardBox>
</template>
