<script setup>
import {
  reactive,
  computed,
  watch,
  ref,
  defineAsyncComponent,
} from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import GoodsOptionItem from "@/admin/Goods/GoodsOptionItem.vue";
import Api from "@/admin/libs/Api.js";
import { storeToRefs } from "pinia";
import { useGoodsOptionListStore } from "@/admin/stores/goodsOptionListStore.js";

const goodsOptionStore = useGoodsOptionListStore();
const { loadOptions, isLoadingBySource } = goodsOptionStore;
const { listByGoodsId, listByOptionId, listByPersonal, listByAll } = storeToRefs(goodsOptionStore);

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
    default: "personal",
  },
  title: String,
  test: {
    type: Boolean,
    default: false,
  },
});

const sourceValueDefault = reactive({
  goodsId: ref(props.goodsId),
  optionId: ref(props.optionId),
  dataOptions: ref(props.dataOptions),
  personal: ref(props.list),
  all: ref(props.list),
});

const detectSourceDefault = () => {
  for (const key of Object.keys(sourceValueDefault)) {
    const source = sourceValueDefault[key];

    if (source) {
      return key;
    }
  }
};

const state = reactive({
  /**
   * goodsId
   * optionId
   * dataOptions
   * listPersonal
   * listAll
   **/
  sourceRunnedLoader: detectSourceDefault(),
  sourceValue: sourceValueDefault[detectSourceDefault()],
  dataOptions: [],
  statusLoading: isLoadingBySource(detectSourceDefault()),
  loader: null
});

const sourceLoaders = {
    goodsId() {
      loadOptions({ source: "goodsId", value: state.sourceValue });
      state.statusLoading = isLoadingBySource('goodsId')
      state.dataOptions = listByGoodsId;
    },
    optionId() {
      loadOptions({ source: "optionId", value: state.sourceValue });
      state.statusLoading = isLoadingBySource('optionId')
      state.dataOptions = listByOptionId;
    },
    personal() {
      loadOptions({source: 'personal'})
      state.statusLoading = isLoadingBySource('personal')
      state.dataOptions = listByPersonal;
    },
    all() {
      loadOptions({source: 'all'})
      state.statusLoading = isLoadingBySource('all')
      state.dataOptions = listByAll;
    },
    dataOptions() {
      state.statusLoading = false

      return sourceProps.dataOptions;
    },
};

state.loader = computed(() => {
  return sourceLoaders[state.sourceRunnedLoader]
})

state.loader();

if (typeof state.loader != "function") {
  console.log(state.loader, state.sourceRunLoader);
  throw new Error("Error run loader state.loader", state.loader);
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

    const { useTestComponentStore } = await import(
      "@/admin/stores/testComponentStore.js"
    );

    testStore.value = useTestComponentStore();
    testStore.value.setStateComponent(state);

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

  <CardBox
    :empty="!state.dataOptions.length"
    :loader="state.statusLoading"
    :title="title"
  >
    <h3 class="text-lg mb-6 text-gray-600 font-semibold">Список опций</h3>
    <GoodsOptionItem
      v-for="option in state.dataOptions"
      :key="option.id"
      :option="option"
      class="-mx-6"
    />
  </CardBox>
</template>
