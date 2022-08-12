<script setup>
import { computed, watch, ref } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import GoodsOptionItem from "@/admin/Goods/GoodsOptionItem.vue";
import Api from "@/admin/libs/Api.js";
import {
  goodsData,
  list,
  tree,
  loading,
  errorStore,
  load
} from '@/admin/Goods/Repositories/goodsOptionStoreRepository.js'

const props = defineProps({
  goodsId: {
    default: null
  },
  optionId: {
    default: null
  },
  dataOptions: {
    type: Array
  },
  title: String
});

const loader = ref(false)
const title = ref('')

const sourceOptions = computed(() => {
  if (props.goodsId) {
    return tree;
  } else if (props.dataOptions) {
    return props.dataOptions
  }
})

if (props.goodsId) {
  load(props.goodsId)
}

watch(goodsData, (data) => {
  title.value = ` ${data.name}`;
})

</script>

<template>
  <CardBox :empty="!list.length" :loader="loading" :title="title">
    <h3 class="text-lg mb-6 text-gray-600 font-semibold">Список опций</h3>
    <GoodsOptionItem v-for="option in tree" :key="option.id" :option="option" class="-mx-6" />
  </CardBox>
</template>
