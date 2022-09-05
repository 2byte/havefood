<script setup>
import { ref, reactive } from "vue";
import FormTestSetting from "@/admin/components/FormTestSetting.vue";
import Api from "@/admin/libs/Api.js";
import { useTestComponentStore } from "@/admin/stores/testComponentStore.js";

const props = defineProps({
  keyForm: String,
});

const store = useTestComponentStore();

store.formSettings.push({
  name: "goods_id",
  label: "ID товара",
  value: ref(0),
});

const formSettings = store.formSettings

console.log(store.formSettings, "from goodsOptionListTest");

</script>

<template>
  <FormTestSetting v-model:formSettings="formSettings" :keyForm="keyForm" />
</template>
