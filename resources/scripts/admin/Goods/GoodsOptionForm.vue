<script setup>
import { computed, ref, reactive } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import DisplayErrors from "@/admin/components/DisplayErrors.vue";
import NotificationBar from "@/admin/components/NotificationBar.vue";
import {
  loadingGoodsTypes,
  goodsTypeOptions,
} from "@/admin/Goods/Repositories/goodsTypeRepository.js";
import Api from "@/admin/libs/Api.js";

const props = defineProps({
  goodsId: {
    default: 0,
  },
  optionId: {
    default: 0,
  },
  optionData: Object,
  type: {
    default: "option",
  },
  mode: {
    default: "create",
  },
});

const emit = defineEmits(["created"]);

const typeOption = ref(props.type);
const componentMode = ref(props.mode);
const refGoodsId = ref(props.goodsId);
const refOptionId = ref(props.optionId);

const switchMode = (newMode, newType) => {
  componentMode.value = newMode;
  if (newType) {
    typeOption.value = newType;
  }
};

const form = reactive({
  goods_id: refGoodsId,
  option_id: refOptionId,
  mode: componentMode,
  group: 0,
  group_variant: "checkbox",
  name: null,
  description: null,
  price_type: "single",
  price: 0,
  note: null,
  goods_type: "common",
});

// Apples data from property optionData
if (props.optionData) {
  refOptionId.value = props.optionData.id;

  const paramsForUpdate = [
    "name",
    "description",
    "price_type",
    "price",
    "note",
    "goods_type",
    "group_variant",
    'note',
    'hidden'
  ];

  paramsForUpdate.forEach((attribute) => {
    form[attribute] = props.optionData[attribute];
  });
}

const groupOptions = { 0: "Одиночная", 1: "Группа опций" };
const groupVariantOptions = {
  checkbox: "Множественный выбор",
  radio: "Вариативный выбор",
};

const priceTypeOptions = {
  goods: "Цена товара",
  single: "Дополнительная сумма к стоимости товара",
};

const isOptionGroup = computed(() => {
  return form.group == 1;
});

const labelButton = computed(() => {
  return componentMode.value == "create" ? "Создать" : "Сохранить";
});

// ---------------- placeholder --------------//
const typeToNames = {
  option: "опции",
  group: "группы",
};

const placeholders = reactive({
  name: computed(() => `Имя ${typeToNames[typeOption.value]}`),
  description: computed(() => `Описание ${typeToNames[typeOption.value]}`),
});

// ---------------- end placeholder ---------------//

// ---------------- submit --------------//
const errorsFromApi = ref(null);
const loaderSubmit = ref(false);
const notificationSave = ref(null);

const submit = () => {
  loaderSubmit.value = true;

  Api("goods/option/store", "post", form)
    .setLoader(loaderSubmit)
    .setErrors(errorsFromApi)
    .success((data) => {
      notificationSave.value = data?.option_id
        ? "Опция успешно создана"
        : "Опция успешно сохранена";

      if (data?.option_id) {
        refOptionId.value = data.option_id;
      }

      switchMode("update");
      emit("created");
    }).run();
};
// ---------------- end submit --------------//

const titleCardBox = computed(() => {
  const pieces = {
    create: "Создание",
    update: "Редактирование",
    option: "опции",
    group: "группы",
  };

  return `${pieces[componentMode.value]} ${pieces[typeOption.value]}`;
});

const formGroupModelComputed = computed({
  get: () => Number(form.group),
  set: (val) => {
    form.group = Number(val);

    if (form.group == 1) {
      switchMode(componentMode.value, "group");
    } else {
      switchMode(componentMode.value, "option");
    }
  },
});
</script>

<template>
  <CardBox :title="titleCardBox" form @submit.prevent="submit">
    <FormField label="Тип опции">
      <FormCheckRadioPicker
        v-model="formGroupModelComputed"
        name="group"
        type="radio"
        :options="groupOptions"
      />
    </FormField>
    <FormField label="Тип опций в группе" v-if="isOptionGroup">
      <FormCheckRadioPicker
        v-model="form.group_variant"
        name="group_variant"
        type="radio"
        :options="groupVariantOptions"
      />
    </FormField>
    <FormField :label="placeholders.name">
      <FormControl :placeholder="placeholders.name" v-model="form.name" />
    </FormField>
    <FormField label="Внутринняя заметка">
      <FormControl placeholder="Заметка для админов" v-model="form.note" />
    </FormField>
    <FormField :label="placeholders.description">
      <FormControl
        type="textarea"
        :placeholder="placeholders.description"
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

    <DisplayErrors v-if="errorsFromApi" :errors="errorsFromApi" />

    <NotificationBar color="success" timeout="5000" v-if="notificationSave">
      {{ notificationSave }}
    </NotificationBar>

    <BaseButton
      type="submit"
      color="success"
      :label="labelButton"
      :loader="loaderSubmit"
    />
  </CardBox>
</template>
