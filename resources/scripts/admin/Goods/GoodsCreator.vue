<script setup>
import { computed, watch, ref, reactive } from "vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import CardBox from "@/admin/components/CardBox.vue";
import BaseIcon from "@/admin/components/BaseIcon.vue";
import BaseDivider from "@/admin/components/BaseDivider.vue";
import DisplayErrors from "@/admin/components/DisplayErrors.vue";
import NotificationBar from "@/admin/components/NotificationBar.vue";
//import { useForm } from "@inertiajs/inertia-vue3";
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
import Api from "@/admin/libs/Api.js";

const props = defineProps({
  category: {
    default: null,
  },
  mode: {
    default: "create",
  },
  goodsId: {
    type: Number,
    default: null
  },
  goodsLoad: {
    type: Boolean,
    default: false,
  },
});

const componentMode = ref(props.mode);

const titleCardBox = computed(() => {
  return componentMode.value == "create" ? "Создание товара" : "Редактирование товара";
});

// load a goods types
const { fetchAllGoodsTypes } = useGoodsTypeStore();
const { listGoodsTypes, loading: loadingGoodsTypes } = storeToRefs(useGoodsTypeStore());

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
const { listCategories, loading: loadingCategories } = storeToRefs(useCategoriesStore());

fetchAllCategories();

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

const form = reactive({
  name: null,
  category_id: categoryIdSelected,
  description: null,
  price: 1.0,
  sticker: "none",
  goods_type: goodsTypeValueForm,
  hidden: 1,
});

const switchHiddenValue = computed({
  get: () => [form.hidden],
  set: (val) => {
    form.hidden = val[0];
  },
});

const goodsId = ref(props.goodsId);

const switchMode = (mode, goodsIdVal) => {
  if (mode == "update") {
    componentMode.value = "update";
    if (goodsIdVal) {
      goodsId.value = goodsIdVal;
    }
  } else {
    componentMode.value = "create";
    if (goodsId.value) {
      goodsId.value = null;
    }
  }
};

const errorsFromApi = ref(null);
const notify = reactive({
  created: false,
});

const loaderSubmit = ref(false);

const submit = () => {
  loaderSubmit.value = true
  
  Api("goods/store", "post", form)
    .setErrors(errorsFromApi)
    .setLoader(loaderSubmit)
    .success((payload) => {
      notify.created = true;

      switchMode("update", payload.goods_id);
    });
};

// Load goods by id from prop
const errorsGoodsLoad = ref(null)

if (props.goodsLoad) {
  Api('goods/get', 'get', {id: props.goodsId})
    .setErrors(errorsGoodsLoad)
    .success((data) => {
      console.log(data)
    })
}
</script>

<template>
  <CardBox
    :title="titleCardBox"
    form
    @submit.prevent="submit"
    class="shadow-sm"
  >
    <DisplayErrors v-if="errorsGoodsLoad" :errors="errorsGoodsLoad" class="-mt-6" />

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
        :loader="loadingCategories"
      />
    </FormField>
    <FormField label="Тип товара">
      <FormControl v-model="form.goods_type" :options="goodsTypeOptions" :loader="loadingGoodsTypes"/>
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
    <FormField label="Скрыт">
      <FormCheckRadioPicker
        v-model="switchHiddenValue"
        name="sample-switch"
        type="switch"
        :options="switchHidden"
      />
    </FormField>

    <BaseDivider />
    
    <h3 class="text-md font-medium text-slate-500 mb-2">Опции товара</h3>
    <div v-if="mode == 'create'" class="text-slate-400 mb-2">
      Для создания опций к товару, вначале создайте товар
    </div>

    <DisplayErrors v-if="errorsFromApi" :errors="errorsFromApi" />

    <NotificationBar color="success" timeout="5000" v-if="notify.created">
      Товар успешно создан
    </NotificationBar>

    <BaseButton type="submit" color="info" label="Создать" :loader="loaderSubmit" loader-type="circle2"/>
  </CardBox>
</template>
