<script setup>
import { computed, watch, ref } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import GoodsOptionItem from "@/admin/Goods/GoodsOptionItem.vue";
import Api from "@/admin/libs/Api.js";
import {
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

if (props.goodsId) {
  //Api('goods/option/get')
  load(props.goodsId)
}

</script>

<template>
  <CardBox :empty="!list.length" :loader="loading">
    <GoodsOptionItem v-for="option in list" :key="option.id" :option="option" class="-mx-6" />
  </CardBox>
</template>
