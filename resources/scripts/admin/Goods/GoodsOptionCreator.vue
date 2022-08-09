<script setup>
import { computed, watch, ref, reactive } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";

const props = defineProps({
  goodsId: Number,
  type: {
    type: String,
    default: "factory",
  },
});

const form = reactive({
  group: 0,
  groupType: "checkbox",
  name: null,
  description: null,
  price_type: "single",
  price: 0,
});

const groupOptions = { 0: "Отдельная", 1: "Группа опций" };
const groupTypeOptions = {
  checkbox: "Множественный выбор",
  radio: "Вариативный выбор",
};
const priceTypeOptions = {
  goods: "Цена товара",
  single: "Дополнительная сумма к стоимости товара",
};

const submit = () => {};

const moduleModeFactory = computed(() => props.type == "factory");
</script>

<template>
  <template v-if="moduleModeFactory">
    <CardBox title="Создание опции" form @submit.prevent="submit">
      <FormField label="Тип опции">
        <FormCheckRadioPicker
          v-model="form.group"
          name="group"
          type="radio"
          :options="groupOptions"
        />
      </FormField>
      <FormField label="Тип опций в группе" v-if="form.group">
        <FormCheckRadioPicker
          v-model="form.group_type"
          name="group_type"
          type="radio"
          :options="groupTypeOptions"
        />
      </FormField>
      <FormField label="Имя опции">
        <FormControl placeholder="Имя опции" v-model="form.name" />
      </FormField>
      <FormField label="Описание опции">
        <FormControl
          type="textarea"
          placeholder="Описание опции"
          v-model="form.description"
        />
      </FormField>
      <FormField label="Установка цены на товар">
        <FormCheckRadioPicker
          v-model="form.price_type"
          name="price_type"
          type="radio"
          :options="priceTypeOptions"
        />
      </FormField>
      <FormField label="Сумма">
        <FormControl v-model="price" placeholder="100.00" />
      </FormField>
    </CardBox>
  </template>
</template>
