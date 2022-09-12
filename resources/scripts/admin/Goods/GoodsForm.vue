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
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import FormFilePicker from "@/admin/components/FormFilePicker.vue";
import { useCategoriesStore } from "@/admin/stores/categories.js";
import { useGoodsTypeStore } from "@/admin/stores/goodsTypeStore.js";
//import { useGoodsStore } from "@/admin/stores/goodsStore.js";
import { storeToRefs } from "pinia";
import {
  mdiCashMultiple,
  mdiShoppingOutline,
  mdiFolder,
  mdiBookInformationVariant,
} from "@mdi/js";
import GoodsOptionRelationships from "@/admin/Goods/GoodsOptionRelationships.vue";
import Api from "@/admin/libs/Api.js";
import { listGoodsTypes, loadingGoodsTypes, goodsTypeOptions } from '@/admin/Goods/Repositories/goodsTypeRepository.js'

const props = defineProps({
  category: {
    default: null,
  },
  /**
   * create or update
   * */
  mode: {
    default: "create",
  },
  goodsId: {
    type: Number,
    default: null,
  },
  goodsLoad: {
    type: Boolean,
    default: false,
  },
  goodsData: {
    type: Object,
    default: null
  },
  buttonCloseForm: {
    type: Boolean,
    default: false,
  },
});

const emit = defineEmits(["close-form"]);

const componentMode = ref(props.mode);
const goodsId = ref(props.goodsId);

const titleCardBox = computed(() => {
  return componentMode.value == "create"
    ? "Создание товара"
    : "Редактирование товара";
});

// Load categories a goods
const { fetchAllCategories } = useCategoriesStore();
const { listCategories, loading: loadingCategories } = storeToRefs(
  useCategoriesStore()
);

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
  return listCategories.value.find(({ id }) => id == categoryIdSelected.value)
    ?.goods_type;
});

const stickerOptions = {
  none: "Без стикера",
  new: "Новинка",
  hit: "Хит",
  bonus: "Бонус",
};

const switchHidden = { 1: "Да" };

const form = reactive({
  id: goodsId,
  name: null,
  category_id: categoryIdSelected,
  description: null,
  price: 1.0,
  sticker: "none",
  goods_type: goodsTypeValueForm.value,
  hidden: 1,
  mode: componentMode,
});

const switchHiddenValue = computed({
  get: () => [form.hidden],
  set: (val) => {
    form.hidden = val[0];
  },
});

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
const notificationSave = ref(null);

const loaderSubmit = ref(false);

const submit = () => {
  loaderSubmit.value = true;
  notificationSave.value = null;
  
  Api("goods/store", "post", form)
    .setErrors(errorsFromApi)
    .setLoader(loaderSubmit)
    .success((payload) => {
      notificationSave.value = payload?.goods_id
        ? "Товар успешно создан"
        : "Товар успешно сохранен";

      switchMode("update", payload?.goods_id);
    }).run();
};

// Load goods by id from prop
const errorsGoodsLoad = ref(null);
const statusGoodsLoad = ref(false);

if (props.goodsLoad) {
  statusGoodsLoad.value = true;

  Api("goods/get", "get", { id: props.goodsId })
    .setErrors(errorsGoodsLoad)
    .setLoader(statusGoodsLoad)
    .success((data) => {
      switchMode("update", data.id);

      for (const nameField of Object.keys(form)) {
        form[nameField] = data[nameField];
      }
    })
    .run();
}
// update mode from a prop goodsData
if (props.goodsData) {
  for (const nameField of Object.keys(props.goodsData)) {
    form[nameField] = props.goodsData[nameField];
  }
  switchMode('update', props.goodsData.id)
}

const buttonSubmitLabel = computed(() => {
  return componentMode == "create" ? "Создать" : "Сохранить";
});
</script>

<template>
  <CardBox
    :title="titleCardBox"
    form
    @submit.prevent="submit"
    class="shadow-sm"
    :loader="statusGoodsLoad"
  >
    <DisplayErrors
      v-if="errorsGoodsLoad"
      :errors="errorsGoodsLoad"
      class="-mt-6"
    />

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
      <FormControl
        v-model="form.goods_type"
        :options="goodsTypeOptions"
        :loader="loadingGoodsTypes"
      />
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

    <h3 class="text-md font-medium text-slate-500 mb-4">Изображения</h3>
    <FormFilePicker model="goods" :model_id="form.id" :mode="form.mode" label="Загрузить изображение" class="mb-4"/>
    
    <h3 class="text-md font-medium text-slate-500 mb-4">Опции товара</h3>
    <div v-if="componentMode == 'create'" class="text-slate-400 mb-2">
      Для создания опций к товару, вначале создайте товар
    </div>
    <GoodsOptionRelationships
      v-else
      class="mb-2 -mx-6"
      :goods-id="form.id"
    />
    
    <DisplayErrors v-if="errorsFromApi" :errors="errorsFromApi" />

    <NotificationBar color="success" timeout="5000" v-if="notificationSave">
      {{ notificationSave }}
    </NotificationBar>

    <div class="flex justify-between">
      <BaseButton
        type="submit"
        color="info"
        :label="buttonSubmitLabel"
        :loader="loaderSubmit"
        loader-type="circle2"
      />
      <BaseButton
        type="submit"
        v-if="buttonCloseForm"
        color="danger"
        label="Отмена"
        @click.prevent="$emit('close-form')"
      />
    </div>
  </CardBox>
</template>
