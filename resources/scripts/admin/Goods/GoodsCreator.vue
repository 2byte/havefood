<script setup>
import { computed, watch, ref } from "vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import CardBox from "@/admin/components/CardBox.vue";
import BaseIcon from "@/admin/components/BaseIcon.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import { useCategoriesStore } from "@/admin/stores/categories.js";
import { useGoodsTypeStore } from "@/admin/stores/goodsTypeStore.js";
import { storeToRefs } from "pinia";
import {
  mdiCashMultiple,
  mdiShoppingOutline,
  mdiFolder,
  mdiBookInformationVariant,
} from "@mdi/js";

const props = defineProps({
  category: {
    default: null,
  },
  mode: {
    default: "create",
  },
  goodsCategories: {
    type: Object,
    default: [],
  },
});

const titleCardBox = computed(() =>
  props.mode == "create" ? "Создание товара" : "Редактирование товара"
);

// load a goods types
const { fetchAllGoodsTypes } = useGoodsTypeStore();
const { listGoodsTypes } = storeToRefs(useGoodsTypeStore());

fetchAllGoodsTypes();

const goodsTypeOptions = computed(() => {
  const options = listGoodsTypes.value.map((data) => {
    const nameEn = Object.keys(data)[0];
    return { value: nameEn, label: data[nameEn] };
  });
  options.unshift({ value: 0, label: "Выберите тип товара" });

  return options;
});

// Load categories a goods
const { fetchAllCategories } = useCategoriesStore();
const { listCategories } = storeToRefs(useCategoriesStore());

fetchAllCategories();

/*const categoryOptions = props.goodsCategories.map((category) => {
        return {
            value: category.id,
            label: `${category.name} (${category.count_goods})`
        }
    })*/
const categoryOptions = computed(() => {
  const options = listCategories.value.map((data) => {
    return { value: data.id, label: data.name };
  });
  options.unshift({ value: 0, label: "Выберите категорию" });
  return options;
});

const categoryIdSelected = ref(0);
const goodsTypeSelected = ref(0);

const goodsTypeValueForm = computed(() => {
  return (
    listCategories.value.find(({ id }) => id == categoryIdSelected.value)
      ?.goods_type ?? 0
  );
});

const stickerOptions = {
  none: "Без стикера",
  new: "Новинка",
  hit: "Хит",
  bonus: "Бонус",
};

const switchHidden = { 1: "Да" };

const form = useForm({
  name: null,
  category_id: categoryIdSelected,
  description: null,
  price: 1.0,
  sticker: "none",
  goodsType: goodsTypeValueForm,
  hidden: 0,
});

const submit = () => {};
</script>

<template>
  <CardBox
    :title="titleCardBox"
    form
    @submit.prevent="submit"
    class="shadow-sm"
  >
    <FormField label="Имя товара">
      <FormControl
        v-model="form.name"
        :icon="mdiShoppingOutline"
        placeholder="Бургер"
      />
      <FormControl
        v-model="form.category_id"
        :icon="mdiFolder"
        :options="categoryOptions"
        placeholder="Выберите категорию"
      />
    </FormField>
    <FormField label="Тип товара">
      <FormControl v-model="form.goodsType" :options="goodsTypeOptions" />
    </FormField>
    <FormField label="Описание товара">
      <FormControl
        v-model="form.description"
        :icon="mdiBookInformationVariant"
        type="textarea"
        placeholder="Описание товара"
      />
    </FormField>
    <FormField label="Цена">
      <FormControl
        v-model="form.price"
        :icon="mdiCashMultiple"
        placeholder="100.00"
      />
    </FormField>
    <FormField label="Стикер">
      <FormCheckRadioPicker
        v-model="form.sticker"
        name="sticker"
        type="radio"
        :options="stickerOptions"
      />
    </FormField>
    <FormCheckRadioPicker v-model="form.hidden" type="checkbox" />
    <FormField label="Скрыт">
      <FormCheckRadioPicker
        v-model="form.hidden"
        name="sample-switch"
        type="switch"
        :options="switchHidden"
      />
    </FormField>
    <BaseButton type="submit" color="info" label="Создать" />
  </CardBox>
</template>
