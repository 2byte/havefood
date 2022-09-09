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
      update: "update",
    },
    value: ref("create"),
  },
  {
    name: "typeOption",
    label: "Тип опции",
    type: "radio",
    options: {
      option: "Опция",
      group: "Группа",
    },
    value: ref("option"),
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
      if (form.mode.value == "update") {
        Api("goods/option/get/first", "post", { id: form.optionId.value })
          .success((data) => {
            data.option_id = data.id
            
            Object.assign(store.stateComponent.form, data);
            
            store.stateComponent.switchMode(form.mode.value, form.typeOption.value);
          })
          .run();
      } else {
        store.stateComponent.switchMode(form.mode.value, form.typeOption.value);
      }
    },
  },
];

store.setForm(formItems);

const formSettings = store.formSettings;
</script>

<template>
  <FormTestSetting v-model:formSettings="formSettings" :keyForm="keyForm" />
</template>
