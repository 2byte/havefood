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
      goods: "Товар",
      personal: "Все личные опции",
      all: "Все опции",
    },
    value: ref('goods'),
  },
  {
    name: "submit",
    type: "button",
    label: "Запуск",
    role: 'run',
    value: ref(0),
    color: 'success',
    click: () => {
      
    }
  },
];

store.setForm(formItems);

const formSettings = store.formSettings;
</script>

<template>
  <FormTestSetting v-model:formSettings="formSettings" :keyForm="keyForm" />
</template>
