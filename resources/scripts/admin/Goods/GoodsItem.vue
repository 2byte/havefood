<script setup>
import { ref, reactive, defineAsyncComponent } from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import BaseIcon from "@/admin/components/BaseIcon.vue";
import { mdiCashMultiple, mdiShoppingOutline } from "@mdi/js";

const props = defineProps({
  goods: {
    type: Object,
    //required: true
  },
  test: {
    type: Boolean,
    default: false
  },
});

const state = reactive({
  goods: ref(props.goods)
});

// ---------------- test property --------------//
const isTest = props.test;

const testComponent = ref(null);
const testStore = ref({});

if (isTest && !props.isRecursive) {
  testComponent.value = defineAsyncComponent(async () => {
    const testComp = await import(
      "@/admin/Goods/Tests/GoodsItemTest.vue"
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
</script>

<template>
  
  <component :is="testComponent" keyForm="gov_goods_item" />
  
  <CardBox
    :title="state.goods.name"
    class="mb-2 shadow-sm"
    :icon="mdiShoppingOutline"
    v-if="state.goods"
  >
    <div class="font-sm text-gray-500">{{ state.goods.description }}</div>
    <div class="text-stone-500">
      <BaseIcon :path="mdiCashMultiple" /> Цена: {{ state.goods.price }}
    </div>
  </CardBox>
</template>
