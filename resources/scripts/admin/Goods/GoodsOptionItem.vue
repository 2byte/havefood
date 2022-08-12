<script setup>
import { computed, watch, ref } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import GoodsOptionList from "@/admin/Goods/GoodsOptionList.vue";
import GoodsOptionForm from "@/admin/Goods/GoodsOptionForm.vue";
import { mdiCog } from "@mdi/js";
import "/resources/css/animate.css/animate.min.css";

const props = defineProps({
  option: Object,
});

const prepData = {
  price:
    props.option.price_type == "single"
      ? `+ ${props.option.price} ₽ к стоимости товара`
      : `${props.option.price} ₽ стартовая цена товара `,
  groupVariant:
    props.option.group_variant == "checkbox"
      ? "Множественный выбор"
      : "Вариативный",
};

let title = `#${props.option.id} ${props.option.name}`;

if (props.option.group) {
  title += " (Группа опций)";
}

const titleClasses = "text-gray-400 font-medium";
const cellValClasses = "text-slate-600 font-extrathin leading-2";

const showEditForm = ref(false);
const showInfo = ref(true);

const clickSetting = () => {
  showEditForm.value = !showEditForm.value;
  showInfo.value = false;
};
</script>

<template>
  <CardBox
    :title="title"
    :headerIcon="mdiCog"
    @header-icon-click="clickSetting"
    class="relative"
  >
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
      @after-leave="showInfo = true"
    >
      <GoodsOptionForm
        v-if="showEditForm"
        class="-mx-6 -mb-6"
        :title="false"
        :optionData="option"
        mode="update"
      />
    </transition>
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
    >
      <div class="flex flex-col" v-if="showInfo">
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
    </transition>

    <GoodsOptionList v-if="option.childs?.length" :dataOption="option.childs" />
  </CardBox>
</template>
