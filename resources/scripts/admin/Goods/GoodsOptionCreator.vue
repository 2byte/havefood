<script setup>
import { computed, watch, ref, reactive } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import GoodsOptionForm from "@/admin/Goods/GoodsOptionForm.vue";

const props = defineProps({
  goodsId: Number,
  type: {
    type: String,
    default: "createOption",
  },
});

const form = reactive({
  optionId: 0,
  group: 0,
  group_type: "checkbox",
  name: null,
  description: null,
  price_type: "single",
  price: 0,
  note: null
});

const groupOptions = { 0: "Одиночная", 1: "Группа опций" };
const groupTypeOptions = {
  checkbox: "Множественный выбор",
  radio: "Вариативный выбор",
};
const priceTypeOptions = {
  goods: "Цена товара",
  single: "Дополнительная сумма к стоимости товара",
};

const mode = reactive({
  createGroup: props.type == "createGroup",
  updateGroup: props.type == "updateGroup",
  createOption: props.type == "createOption",
  updateOption: props.type == "updateOption",
});

const switchMode = (newMode) => {
  for (const name of Object.keys(mode)) {
    mode[name] = false;
  }
  mode[newMode] = true;
}

const currentMode = computed(() => {
  let detectedMode = null;
  
  Object.keys(mode).forEach((key) => {
    if (mode[key] === true) {
      detectedMode = key;
      return
    }
  })
  
  return detectedMode
})

const titleCardBoxGroup = computed(() => {
  const titles = {
    createGroup: 'Создание группы',
    createOption: 'Создание опции',
    updateOption: 'Редактирование опции',
    updateGroup: 'Редактирование группы',
  }
  return titles[currentMode.value];
});

// Option a group
const submit = () => {};

const formGroupComputed = computed({
  get: () => Number(form.group),
  set: (val) => {
    form.group = Number(val)
    
    if (form.group == 1) {
      switchMode('createGroup')
    } else {
      switchMode('createOption')
    }
  }
})

const isOptionGroup = computed(() => {
  return formGroupComputed.value == 1
})

const formType = computed(() => {
  return formGroupComputed.value == 1 ? 'group' : 'option'
})
</script>

<template>
  <CardBox :title="titleCardBoxGroup" form @submit.prevent="submit">
    <FormField label="Тип опции">
      <FormCheckRadioPicker
        v-model="formGroupComputed"
        name="group"
        type="radio"
        :options="groupOptions"
      />
    </FormField>
    <FormField label="Тип опций в группе" v-if="isOptionGroup">
      <FormCheckRadioPicker
        v-model="form.group_type"
        name="group_type"
        type="radio"
        :options="groupTypeOptions"
      />
    </FormField>
  </CardBox>
  <GoodsOptionForm :type="formType" class="mb-2"/>
</template>
