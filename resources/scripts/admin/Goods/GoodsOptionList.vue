<script setup>
import { reactive, computed, watch, ref, defineAsyncComponent, markRaw, toRef } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import GoodsOptionItem from "@/admin/Goods/GoodsOptionItem.vue";
import Api from "@/admin/libs/Api.js";
import { storeToRefs } from 'pinia'
import { useGoodsOptionListStore } from "@/admin/stores/goodsOptionListStore.js";

const goodsOptionStore = useGoodsOptionListStore();
const { loadOptions, isLoadingBySource } = goodsOptionStore;
const { listByGoodsId } = storeToRefs(goodsOptionStore)

const props = defineProps({
  goodsId: {
    default: null,
  },
  optionId: {
    default: null,
  },
  dataOptions: {
    type: Array,
  },
  /**
   * personal
   * all
   * */
  list: {
    type: String,
    default: 'personal'
  },
  title: String,
  test: {
    type: Boolean,
    default: false,
  },
});

const sourceProps = reactive({
  goodsId: ref(props.goodsId),
  optionId: ref(props.optionId),
  dataOptions: ref(props.dataOptions),
  list: ref(props.list)
})

const detectSourceDefault = () => {
  for (const key of Object.keys(sourceProps)) {
    const source = sourceProps[key]
    
    if (source) {
      return key
    }
  }
}

const state = reactive({
  /**
   * goodsId
   * optionId
   * dataOptions
   * listPersonal
   * listAll
   **/
  sourceRunLoader: detectSourceDefault(),
  sourceValue: sourceProps[detectSourceDefault()],
  dataOptions: [],
  loading: true,
  loader: null
})

const sourceLoaders = {
  goodsId() {
    loadOptions({source: 'goodsId', value: state.sourceValue})
    state.loading = isLoadingBySource('goodsId')
    state.dataOptions = listByGoodsId
    console.log('Runned source loader', 'goodsId')
  },
  list() {},
  dataOptions() {
    state.loading = false
    
    return sourceProps.dataOptions
  }
}

watch(() => state.sourceRunLoader, (newRunLoader) => {
  state.loader = sourceLoaders[newRunLoader]
  state.loader()
})

state.loader = sourceLoaders[state.sourceRunLoader]

if (typeof state.loader != 'function') {
  console.log(state.loader, state.sourceRunLoader)
  throw new Error('Error run loader state.loader', state.loader)
}

// ---------------- test property --------------//
const isTest = props.test;

const testComponent = ref(null);
const testStore = ref({});

if (isTest) {
  testComponent.value = defineAsyncComponent(async () => {
    const testComp = await import(
      "@/admin/Goods/Tests/GoodsOptionListTest.vue"
    );

    const { useTestComponentStore } = await import("@/admin/stores/testComponentStore.js");

    testStore.value = useTestComponentStore();
    testStore.value.setStateComponent(state)

    return testComp;
  });
}

// ---------------- end test property --------------//

// ---------------- main --------------//

const title = ref("");

/*watch(goodsData, (data) => {
  title.value = ` ${data.name}`;
});*/
</script>

<template>
  <component :is="testComponent" keyForm="gov_goods_option_list" />

  <CardBox :empty="!state.dataOptions.length" :loader="state.loading" :title="title">
    <h3 class="text-lg mb-6 text-gray-600 font-semibold">Список опций</h3>
    <GoodsOptionItem
      v-for="option in state.dataOptions"
      :key="option.id"
      :option="option"
      class="-mx-6"
    />
  </CardBox>
</template>
