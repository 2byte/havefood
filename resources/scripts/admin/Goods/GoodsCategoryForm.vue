<script setup>
import { reactive, ref, watch, computed } from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import DisplayErrors from "@/admin/components/DisplayErrors.vue";
import NotificationBar from "@/admin/components/NotificationBar.vue";
import Api from "@/admin/libs/Api.js";
import {
  mdiFolder
} from '@mdi/js'

import {
  loadingGoodsTypes,
  goodsTypeOptions,
} from "@/admin/Goods/Repositories/goodsTypeRepository.js";

const props = defineProps({
  buttonCloseForm: {
    type: Boolean,
    default: false,
  },
});

const emit = defineEmits(["created", "close-form", "updated"]);

const state = reactive({
  categoryId: null,
  mode: "create",
});

const switchMode = (newMode, categoryId) => {
  if (state.mode != newMode) {
    state.mode = newMode;
  }
  if (categoryId) {
    state.categoryId = categoryId;
  }
};

// Данные формы привязывает по модели формы
const form = reactive({
  id: computed(() => state.categoryId),
  name: null,
});

// ---------------- submit --------------//
// Ошибки от api
const errorsFromApi = ref(null);
// Статус отправки формы
const loaderSubmit = ref(false);
// Результат о выполнении задачи
const notificationSave = ref(null);

const submit = () => {
  // Устанавливаем статус отправки формы
  loaderSubmit.value = true;

  Api("categories/store", "post", form)
    // передаем ссылку классу, когда заыершится запрос ей будет присвоено false
    .setLoader(loaderSubmit)
    // Передаем ссылку куда будут загружен массив с ошибками из апи
    .setErrors(errorsFromApi)
    .success((data) => {
      notificationSave.value = data?.id
        ? "Категория успешно создана"
        : "Категория успешно сохранена";

      if (state.mode == "create") {
        switchMode("update", data.id);
        emit("created");
      } else {
        emit("updated");
      }
    }).run();
};
// ---------------- end submit --------------//

const labelButton = ref("Создать");

// ---------------- update mode --------------//

watch(() => state.mode, (newMode) => {
  labelButton.value = 'Сохранить'
})

</script>

<template>
  <CardBox
    title="Создание категории"
    form
    @submit.prevent="submit"
  >
    <DisplayErrors v-if="errorsFromApi" :errors="errorsFromApi" class="-mt-6" />

    <FormField label="Имя категории">
      <FormControl
        v-model="form.name"
        :icon="mdiFolder"
        placeholder="Напитки"
      />
    </FormField>
    <FormField label="Тип товара">
      <FormControl
        v-model="form.goods_type"
        :options="goodsTypeOptions"
        :loader="loadingGoodsTypes"
      />
    </FormField>

    <NotificationBar color="success" timeout="5000" v-if="notificationSave" @dismiss="notificationSave = null">
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
        type="submit"
        v-if="buttonCloseForm"
        color="danger"
        label="Отмена"
        @click.prevent="$emit('close-form')"
      />
    </div>
  </CardBox>
</template>
