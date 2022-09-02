<script setup>
import { watch, onMounted, computed, reactive, ref } from "vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import { mdiBugPlay } from "@mdi/js";

const props = defineProps({
  formSettings: {
    type: [Object],
    default: () => {},
  },
});

const emit = defineEmits(["click"]);

const isFormControl = (type) => {
  return !type || type == "input" || type == "textarea" || type == "select";
};

const isFormChecker = (type) => {
  return type == "checkbox" || type == "radio" || type == "switch";
};

const iconByRoles = {
  run: mdiBugPlay,
};

// Saving state a form
watch(props.formSettings, (newVal) => {
  console.log("up", newVal);

  localStorage["gov_form_setting"] = JSON.stringify(newVal);
});

onMounted(() => {
  if (localStorage["gov_form_setting"]) {
    const prevStateSettings = JSON.parse(localStorage["gov_form_setting"]);

    prevStateSettings.forEach((item, i) => {
      props.formSettings[i].value = item.value;
    });
  }
});
</script>

<template>
  <div
    class="block my-4 p-4 py-6 border-solid border border-slate-300 bg-slate-200 shadow-sm"
  >
    <header
      class="text-2xl text-gray-600 font-extrathin p-4 mb-4 border-b border-solid border-slate-300"
    >
      Запуск компонента
    </header>

    <template v-for="(item, index) in formSettings" :key="item.name">
      <FormField :label="item.label" v-if="item.type != 'button'">
        <FormControl
          :type="item.type"
          v-if="isFormControl(item.type)"
          :options="item.options"
          v-model:modelValue="formSettings[index].value"
        />
        <FormCheckRadioPicker
          v-if="isFormChecker(item.type)"
          :type="item.type"
          :options="item.options"
          :name="item.name"
          v-model:modelValue="formSettings[index].value"
        />
      </FormField>
      <BaseButton
        v-if="item.type == 'button'"
        :label="item.label"
        :color="item?.color"
        :icon="item?.role ? iconByRoles[item.role] : item.icon"
        @click="item?.click()"
      />
    </template>
  </div>
</template>
