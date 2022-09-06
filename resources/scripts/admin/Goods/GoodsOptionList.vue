<script setup>
import { reactive, computed, watch, ref, defineAsyncComponent } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import GoodsOptionItem from "@/admin/Goods/GoodsOptionItem.vue";
import Api from "@/admin/libs/Api.js";
import { useGoodsOptionListStore } from "@/admin/stores/goodsOptionListStore.js";

const goodsOptionStore = useGoodsOptionListStore();
const { loadOptions, isLoadingBySource } = goodsOptionStore;

/*import {
  goodsData,
  list,
  tree,
  loading,
  errorStore,
  load,
} from "@/admin/Goods/Repositories/goodsOptionStoreRepository.js";
*/

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
  Object.keys(sourceProps).forEach((sourceKey) => {
    const source = sourceProps[sourceKey]
    
    if (source) {
      return source
    }
  })
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
  dataOptions: ref([])
})

const sourceLoaders = {
  goodsId() {
    loadOptions({source: 'goodsId', value: sourceProps.goodsId})
    loader.value = isLoadingBySource('goodsId')
    console.log('Runned source loader', 'goodsId')
  },
  personal() {},
  all() {},
  dataOptions() {
    return sourceProps.dataOptions
  }
}

watch(state, (val) => {
  sourceLoaders[val.sourceRunLoader]()
})

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


const defaultLoaderComputed = computed(() => {
  return state.sourceRunLoader == 'dataOptions' ? false: true
})

const loader = ref(defaultLoaderComputed);

const title = ref("");

/*watch(goodsData, (data) => {
  title.value = ` ${data.name}`;
});*/
</script>

<template>
  <component :is="testComponent" keyForm="gov_goods_option_list" />

  <CardBox :empty="!state.dataOptions.length" :loader="loader" :title="title">
    <h3 class="text-lg mb-6 text-gray-600 font-semibold">Список опций</h3>
    <GoodsOptionItem
      v-for="option in state.dataOptions"
      :key="option.id"
      :option="option"
      class="-mx-6"
    />
  </CardBox>
</template>
