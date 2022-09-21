<script setup>
import { reactive, computed, watch, ref, toRef, defineAsyncComponent } from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import GoodsOptionItem from "@/admin/Goods/GoodsOptionItem.vue";
import GoodsOptionForm from "@/admin/Goods/GoodsOptionForm.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import Api from "@/admin/libs/Api.js";
import { storeToRefs } from "pinia";
import { useGoodsOptionListStore } from "@/admin/stores/goodsOptionListStore.js";
import { mdiPlus } from '@mdi/js'

const goodsOptionStore = useGoodsOptionListStore();
const { loadOptions, isLoadingBySource } = goodsOptionStore;
const { listByGoodsId, listByOptionId, listByPersonal, listByAll, parentOptionStore } =
  storeToRefs(goodsOptionStore);

const props = defineProps({
  /**
   * Opened goods data
   * */
  openedGoods: {
    type: Object,
    default: null
  },
  goodsId: {
    default: null,
  },
  optionId: {
    default: null,
  },
  dataOptions: {
    type: Array,
  },
  parentOption: {
    type: Object
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
  emptyMessage: {
    type: String,
    default: "Нет опций",
  },
  buttonCreate: {
    type: Boolean,
    default: false,
  },
  isRecursive: {
    type: Boolean,
    default: false
  }
});

const sourceValueDefault = reactive({
  goodsId: ref(props.goodsId),
  optionId: ref(props.optionId),
  dataOptions: ref(props.dataOptions),
  personal: computed(() => props.list == 'personal' ? 'personal' : null),
  all: computed(() => props.list == 'all' ? 'all' : null),
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
  loader: null,
  parentOption: null
});

const sourceLoaders = {
  goodsId(reload = true) {
    loadOptions({ source: "goodsId", value: state.sourceValue, forceLoad: reload});
    state.statusLoading = isLoadingBySource("goodsId");
    state.dataOptions = listByGoodsId;
  },
  optionId(reload = true) {
    loadOptions({ source: "optionId", value: state.sourceValue, forceLoad: reload });
    state.statusLoading = isLoadingBySource("optionId");
    state.dataOptions = listByOptionId;
  },
  personal(reload = false) {
    loadOptions({ source: "personal", forceLoad: reload});
    state.statusLoading = isLoadingBySource("personal");
    state.dataOptions = listByPersonal;
  },
  all(reload = false) {
    loadOptions({ source: "all", forceLoad: reload });
    state.statusLoading = isLoadingBySource("all");
    state.dataOptions = listByAll;
  },
  dataOptions() {
    state.statusLoading = false;

    state.dataOptions = props.dataOptions;
  },
};

state.loader = computed(() => {
  return sourceLoaders[state.sourceRunnedLoader];
});

state.loader();

if (typeof state.loader != "function") {
  console.log(state.loader, state.sourceRunLoader);
  throw new Error("Error run loader state.loader", state.loader);
}

// ---------------- test property --------------//
const isTest = props.test;

const testComponent = ref(null);
const testStore = ref({});

if (isTest && !props.isRecursive) {
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

const showOptionForm = ref(false);

const listOptionName = computed(() => {
  const loaderNames = {
    goodsId: `товара ${goodsOptionStore.goodsData?.name}`,
    optionId: `группы ${props.parentOption?.name}`,
    dataOptions: `группы ${props.parentOption?.name}`,
    personal: `личные`,
    all: `все`,
  }
  
  return loaderNames[state.sourceRunnedLoader]
})
// ---------------- created option in group--------------//

const onCreatedOptionInGroup = () => {
  state.loader(true)
}

const labelCreateOption = computed(() => {
  let label = 'Создать опцию';
  
  if (props.parentOption) {
    label += ` в группе ${props.parentOption.name}`
  } else if (props.goodsId) {
    label += ` к товару ${goodsOptionStore.goodsData?.name}`
  }
  
  return label
})

// ---------------- sorting option for goods and suboptions--------------//

const countOptionComputed = computed(() => {
  return state.dataOptions.length
})

const makeSortParams = (option, lastPosition = false) => {
  const sort = {up: false, down: false}
  
  if (option.sortpos == 0 && !lastPosition) {
    sort.down = true
  } else if (option.sortpos > 0 && !lastPosition) {
    sort.up = true
    sort.down = true
  } else if (option.sortpos > 0 && lastPosition) {
    sort.up = true
  }
  
  option.sortParams = sort
}

const applySortParams = (sourceRunnedLoader, options) => {
  const sourceLoaderTarget = ['goodsId', 'dataOptions']
  
  if (sourceLoaderTarget.includes(sourceRunnedLoader) && options.length) {
    state.dataOptions.forEach((option, i) => makeSortParams(option, option.sortpos == countOptionComputed.value - 1))
  }
}

applySortParams(state.sourceRunnedLoader,  state.dataOptions);

const runApplySortParams = () => {
  applySortParams(state.sourceRunnedLoader,  state.dataOptions);
}

watch(() => state.dataOptions, (options) => {
  applySortParams(state.sourceRunnedLoader, options)
})
</script>

<template>
  <component :is="testComponent" keyForm="gov_goods_option_list" />
  
  <CardBox
    :empty="!state.dataOptions.length"
    :loader="state.statusLoading"
    :title="title"
    :empty-message="emptyMessage"
  >
    <h3 class="text-lg mb-6 text-gray-600 font-semibold">Список опций <span class="text-gray-400">{{ listOptionName }}</span></h3>
    <GoodsOptionItem
      v-for="option in state.dataOptions"
      :key="option.id"
      :option="option"
      :openedGoods="openedGoods"
      class="-mx-6 last:border-b-0"
      @sorted="state.loader(true), runApplySortParams()"
    />
  </CardBox>

  <!--
    v-if="showOptionForm && !parentOptionStore?.loading"
  -->
  <GoodsOptionForm
    v-if="showOptionForm"
    :option-id="optionId"
    :goods-id="goodsId"
    :parent-option-data="parentOptionStore?.option"
    buttonCloseForm
    @closeForm="showOptionForm = false"
    @created="onCreatedOptionInGroup"
  />

  <BaseButton
    color="success"
    :label="labelCreateOption"
    :icon="mdiPlus"
    v-if="buttonCreate && !showOptionForm"
    @click.prevent="showOptionForm = !showOptionForm"
    class="w-min mt-2"
  />
</template>
