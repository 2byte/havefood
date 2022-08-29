<script setup>
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";

const props = defineProps({
  formSettings: {
    type: [Object],
    default: () => {},
  },
});

defineEmits(['click'])

const isFormControl = (type) => {
  return !type || type == "input" || type == "textarea" || type == "select";
};

const isFormChecker = (type) => {
  return type == "checkbox" || type == "radio" || type == "switch";
};
</script>

<template>
  <div
    class="block my-4 p-4 py-6 border-solid border border-slate-300 bg-slate-200 shadow-sm"
  >
    <header
      class="text-2xl text-gray-600 font-extrathin p-4 mb-4 border-b border-solid border-slate-300"
    >
      Данные для компонента
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
        :icon="item.icon"
        @click="item?.click()"
      />
    </template>
  </div>
</template>
