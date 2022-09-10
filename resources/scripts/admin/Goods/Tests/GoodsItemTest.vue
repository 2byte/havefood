<script setup>
import { ref, toRef, reactive } from "vue";
import FormTestSetting from "@/admin/components/FormTestSetting.vue";
import Api from "@/admin/libs/Api.js";
import { useTestComponentStore } from "@/admin/stores/testComponentStore.js";
import { useGoodsStore } from "@/admin/stores/goodsStore.js";

const props = defineProps({
  keyForm: String,
});

const store = useTestComponentStore();

const formItems = [
  {
    label: "ID товара",
    name: "goodsId",
    value: ref('0'),
  },
  {
    name: "submit",
    type: "button",
    label: "Запуск",
    role: "run",
    color: "success",
    click: (form) => {
      const goodsStore = useGoodsStore()
      
      goodsStore.loadGoods({id: form.goodsId.value})
      
      store.stateComponent.goods = toRef(goodsStore, 'currentGoods')
    },
  },
];

store.setForm(formItems);

const formSettings = store.formSettings;
</script>

<template>
  <FormTestSetting v-model:formSettings="formSettings" :keyForm="keyForm" />
</template>
