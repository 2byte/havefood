<script setup>
import { computed, watch, ref } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";

const props = defineProps({
  option: Object,
});

const prepData = {
  price:
    props.option.price_type == "single"
      ? `+ ${props.option.price} ₽ к стоимости товара`
      : "${props.price} ₽ стартовая цена товара ",
  groupVariant: props.option.group_variant == 'checkbox' ? 'Множественный выбор' : 'Вариативный'
};

let title = `#${props.option.id} ${props.option.name}`;

if (props.option.group) {
  title += " (Группа опций)";
}

const titleClasses = "text-gray-400 font-medium";
const cellValClasses = "text-slate-600 font-extrathin leading-2";
</script>

<template>
  <CardBox :title="title">
    <div class="flex flex-col">
      <template v-if="option.group">
        <div :class="titleClasses">Тип группы</div>
        <div :class="cellValClasses">{{ prepData.groupVariant }}</div>
      </template>
      <div :class="titleClasses">Описание</div>
      <div :class="cellValClasses">{{ option.description }}</div>
      <div :class="titleClasses">Цена</div>
      <div :class="cellValClasses">{{ prepData.price }}</div>
      <div :class="titleClasses">Заметка</div>
      <div :class="cellValClasses">{{ option.note }}</div>
    </div>
  </CardBox>
</template>
