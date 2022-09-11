<script setup>
import { computed, ref, reactive, defineAsyncComponent } from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import BaseIcon from "@/admin/components/BaseIcon.vue";
import GoodsView from "@/admin/Goods/GoodsView.vue";
import GoodsForm from "@/admin/Goods/GoodsForm.vue";
import {
  mdiCashMultiple,
  mdiShoppingOutline,
  mdiPlaylistEdit,
  mdiViewCarouselOutline,
} from "@mdi/js";
import ActionButtons from '@/admin/components/CardBoxRepository/ActionButtons.js'
import "/resources/css/animate.css/animate.min.css";

const props = defineProps({
  goods: {
    type: Object,
    //required: true
  },
  test: {
    type: Boolean,
    default: false,
  },
});

const state = reactive({
  goods: ref(props.goods),
});

// ---------------- test property --------------//
const isTest = props.test;

const testComponent = ref(null);
const testStore = ref({});

if (isTest && !props.isRecursive) {
  testComponent.value = defineAsyncComponent(async () => {
    const testComp = await import("@/admin/Goods/Tests/GoodsItemTest.vue");

    const { useTestComponentStore } = await import(
      "@/admin/stores/testComponentStore.js"
    );

    testStore.value = useTestComponentStore();
    testStore.value.setStateComponent(state);

    return testComp;
  });
}

// ---------------- end test property --------------//

const actionButtonItems = [
  {
    id: "actionView",
    title: "Просмотр",
    icon: mdiViewCarouselOutline,
    isActive: ref(false),
    click() {
      console.log("enable view");
    },
  },
  {
    id: "actionEdit",
    title: "Редактировать",
    icon: mdiPlaylistEdit,
    isActive: ref(false),
    click() {
      console.log("enable edit");
    },
  },
];

const actionButtonManager = new ActionButtons(actionButtonItems)

</script>

<template>
  <component :is="testComponent" keyForm="gov_goods_item" />

  <CardBox
    :title="state.goods.name"
    class="mb-2 shadow-sm"
    :icon="mdiShoppingOutline"
    v-if="state.goods"
    :actionButtonManager="actionButtonManager"
  >
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
    >
      <div v-if="actionButtonManager.refUnfocusAll">
        <div class="font-sm text-gray-500">{{ state.goods.description }}</div>
        <div class="text-stone-500">
          <BaseIcon :path="mdiCashMultiple" /> Цена: {{ state.goods.price }}
        </div>
      </div>
    </transition>
    
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
    >
      <div v-if="actionButtonManager.isActive('actionView')">
        View
      </div>
    </transition>
    
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
    >
      <div v-if="actionButtonManager.isActive('actionEdit')">
        <GoodsForm :goods-data="state.goods" class="-mx-6"/>
      </div>
    </transition>
  </CardBox>
</template>
