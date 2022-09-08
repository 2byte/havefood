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
    name: "mode",
    label: "Режим",
    type: "radio",
    options: {
      create: "create",
      personal: "update",
    },
    value: ref("create"),
  },
  {
    label: "ID опции",
    name: "optionId",
    value: ref(0),
  },
  {
    name: "submit",
    type: "button",
    label: "Запуск",
    role: "run",
    value: ref(0),
    color: "success",
    click: (form) => {
      store.stateComponent.sourceRunnedLoader = form.source.value;
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