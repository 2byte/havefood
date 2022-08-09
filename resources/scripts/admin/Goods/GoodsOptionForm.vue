<script setup>
import { computed, watch, ref, reactive } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import { loadingGoodsTypes, goodsTypeOptions } from '@/admin/Goods/Repositories/goodsTypeRepository.js'

const props = defineProps({
  type: {
    default: 'option'
  },
  mode: {
    default: 'create'
  }
});

const form = reactive({
  optionId: 0,
  group: 0,
  group_type: "checkbox",
  name: null,
  description: null,
  price_type: "single",
  price: 0,
  note: null,
  goods_type: 0
});

const priceTypeOptions = {
  goods: "Цена товара",
  single: "Дополнительная сумма к стоимости товара",
};

const isOptionGroup = computed(() => {
  return props.type == 'group'
})

const submit = () =>  {}

const labelButton = computed(() => {
  return props.mode == 'create' ? 'Создать' : 'Сохранить'
})

const placeholderName = computed(() => {
  return props.type == 'option' ? 'Имя опции' : 'Имя группы'
})

const placeholderDescription = computed(() => {
  return props.type == 'option' ? 'Описание опции' : ' Описание группы'
})

</script>

<template>
  <CardBox form @submit.prevent="submit">
    <FormField :label="placeholderName">
      <FormControl :placeholder="placeholderName" v-model="form.name" />
    </FormField>
    <FormField label="Внутринняя заметка">
      <FormControl placeholder="Заметка для админов" v-model="form.note" />
    </FormField>
    <FormField :label="placeholderDescription">
      <FormControl
        type="textarea"
        :placeholder="placeholderDescription"
        v-model="form.description"
        class="resize"
      />
    </FormField>
    <FormField label="Установка цены на товар">
      <FormCheckRadioPicker
        v-model="form.price_type"
        name="form.price_type"
        type="radio"
        :options="priceTypeOptions"
      />
    </FormField>
    <FormField label="Сумма" v-if="!isOptionGroup">
      <FormControl v-model="form.price" placeholder="100.00" />
    </FormField>
    <FormField label="Тип товара">
      <FormControl
        v-model="form.goods_type"
        :options="goodsTypeOptions"
        :loader="loadingGoodsTypes"
      />
    </FormField>
    <BaseButton
      color="success"
      :label="labelButton"
    />
  </CardBox>
</template>
