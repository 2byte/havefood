<script setup>
import { computed, watch, ref, reactive, defineAsyncComponent } from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import FormFilePicker from "@/admin/components/FormFilePicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import DisplayErrors from "@/admin/components/DisplayErrors.vue";
import NotificationBar from "@/admin/components/NotificationBar.vue";
import { useGoodsOptionListStore } from '@/admin/stores/goodsOptionListStore.js'
import {
  loadingGoodsTypes,
  goodsTypeOptions,
} from "@/admin/Goods/Repositories/goodsTypeRepository.js";
import Api from "@/admin/libs/Api.js";
import GoodsOptionList from "@/admin/Goods/GoodsOptionList.vue";

const props = defineProps({
  /**
   * Load from api by goods_id
   * */
  goodsId: {
    default: 0,
  },
  /**
   * Load from api by option_id
   * */
  optionId: {
    default: 0,
  },
  parentOptionData: {
    type: Object,
    default: () => {},
  },
  /**
   * Load a data for form
   * */
  optionData: Object,
  /**
   * option or group
   * */
  type: {
    default: "option",
  },
  /**
   * create or update
   * */
  mode: {
    default: "create",
  },
  /**
   * Test mode
   * */
  test: {
    type: Boolean,
    default: false,
  },
  buttonCloseForm: {
    type: Boolean,
    default: false,
  },
  showChildOptonList: {
    type: Boolean,
    default: true
  }
});

const emit = defineEmits(["created", "close-form"]);

const isCreatingForGroup = ref(!!props.optionId);
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

const isModeUpdate = computed(() => {
  return componentMode.value == "update";
});

const form = reactive({
  goods_id: refGoodsId,
  // for update
  option_id: refOptionId,
  // for creating in group
  parent_id: refOptionId,
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
    "group",
    "goods_type",
    "group_variant",
    "note",
    "hidden"
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
      if (data?.option_id) {
        notificationSave.value = "Опция успешно создана";
        if (form.group) {
          notificationSave.value +=
            " , вы можете перейти к созданию опций в группе";
        }
      } else {
        notificationSave.value = "Опция успешно сохранена";
      }

      if (data?.option_id) {
        refOptionId.value = data.option_id;
      }

      switchMode("update");
      emit("created");
    })
    .run();
};
// ---------------- end submit --------------//

const titleCardBox = computed(() => {
  const pieces = {
    create: "Создание",
    update: "Редактирование",
    option: "опции",
    group: "группы",
  };

  const id = computed(() => {
    return componentMode.value == "update" ? `#${refOptionId.value} ` : "";
  });

  return `${id.value}${pieces[componentMode.value]} ${
    pieces[typeOption.value]
  }`;
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

// ---------------- Action for update and create --------------//

/**
 * Actions for creating mode
 * */
const detectGoodsTypeForCreating = () => {
  const goodsOptionListStore = useGoodsOptionListStore()
  
  form.goods_type = goodsOptionListStore.goodsData?.goods_type
}


if (componentMode.value == 'create') {
  detectGoodsTypeForCreating()
}

// ---------------- End action for update mode --------------//

// ---------------- test property --------------//
const isTest = props.test;

const testComponent = ref(null);
const testStore = ref({});

if (isTest) {
  testComponent.value = defineAsyncComponent(async () => {
    const testComp = await import(
      "@/admin/Goods/Tests/GoodsOptionFormTest.vue"
    );

    const { useTestComponentStore } = await import(
      "@/admin/stores/testComponentStore.js"
    );

    testStore.value = useTestComponentStore();
    testStore.value.setStateComponent(
      reactive({
        form,
        switchMode,
      })
    );

    return testComp;
  });
}
// ---------------- end test property --------------//

</script>

<template>
  
  <component :is="testComponent" keyForm="gov_goods_option_form" />

  <CardBox :title="titleCardBox" form @submit.prevent="submit" :="$attrs">
    <div v-if="isCreatingForGroup && parentOptionData" class="mb-2 text-teal-500">
      Создание опции в группе {{ parentOptionData.name }}
    </div>
    
    <FormField label="Тип опции" v-if="!isCreatingForGroup && !optionData">
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

    <FormFilePicker
      model="goodsoption"
      :model_id="refOptionId"
      label="Загрузить изображения"
    />

    <DisplayErrors v-if="errorsFromApi" :errors="errorsFromApi" />

    <NotificationBar color="success" timeout="5000" v-if="notificationSave">
      {{ notificationSave }}
    </NotificationBar>

    <div class="flex justify-between">
      <BaseButton
        type="submit"
        color="success"
        :label="labelButton"
        :loader="loaderSubmit"
      />

      <BaseButton
        type="button"
        v-if="buttonCloseForm"
        color="danger"
        label="Отмена"
        @click.prevent="$emit('close-form')"
      />
    </div>
  </CardBox>
  
  <GoodsOptionList
    v-if="isModeUpdate && form.group && showChildOptonList"
    :option-id="refOptionId"
    :empty-message="`В группе ${form.name} ещё нет опций`"
    :parent-option="form"
    button-create
  />
  
</template>
