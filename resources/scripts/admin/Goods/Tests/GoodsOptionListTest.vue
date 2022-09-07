<script setup>
import { ref, reactive } from "vue";
import FormTestSetting from "@/admin/components/FormTestSetting.vue";
import Api from "@/admin/libs/Api.js";
import { useTestComponentStore } from "@/admin/stores/testComponentStore.js";

const props = defineProps({
  keyForm: String,
});

const store = useTestComponentStore();

const formItems = [
  {
    name: "source",
    label: "Источник",
    type: "radio",
    options: {
      goodsId: "Товар",
      personal: "Все личные опции",
      all: "Все опции",
    },
    /*subform: [
      {
        ifvalue: 'goodsId',
        label: 'ID товара',
        name: 'goodsId',
        value: ref('')
      }
    ],*/
    value: ref("goodsId"),
  },
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
    value: ref(0),
    color: "success",
    click: (form) => {
      store.stateComponent.sourceRunLoader = form.source.value;
      store.stateComponent.sourceValue = form.goodsId.value;
      store.stateComponent.loader();
    },
  },
];

store.setForm(formItems);

const formSettings = store.formSettings;
</script>

<template>
  <FormTestSetting v-model:formSettings="formSettings" :keyForm="keyForm" />
</template>
