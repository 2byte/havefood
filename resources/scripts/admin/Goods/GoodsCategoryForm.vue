<script setup>
import { computed, watch, ref } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import DisplayErrors from "@/admin/components/DisplayErrors.vue";
import NotificationBar from "@/admin/components/NotificationBar.vue";
import Api from "@/admin/libs/Api.js";
// Загрузка данных по api
// загружаются типы товаров, это хранилище pinia, пока все что нужно знать
// что данные будут в goodsTypeOptions а статус загрузки loadingGoodsTypes = true если загружено
import {
  loadingGoodsTypes,
  goodsTypeOptions,
} from "@/admin/Goods/Repositories/goodsTypeRepository.js";


const props = defineProps({});

const title = "Заголовок карточки"

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

  Api("goods/option/store", "post", form)
    // передаем ссылку классу, когда заыершится запрос ей будет присвоено false
    .setLoader(loaderSubmit)
    // Передаем ссылку куда будут загружен массив с ошибками из апи
    .setErrors(errorsFromApi)
    .success((data) => {
      notificationSave.value = data?.option_id
        ? "Опция успешно создана"
        : "Опция успешно сохранена";

      if (data?.option_id) {
        refOptionId.value = data.option_id;
      }
      
      // Режим компонента, перкключаем в режим редактирования
      switchMode("update");
      // Генерируем событие о создании
      emit("created");
    });
};
// ---------------- end submit --------------//

</script>

<template>
  <!-- и так все компоненты юзают CardBox компонент-->
  <!-- так как у нас будет форма передаем form свойство компоненту -->
  <!-- свойство loader показывает картинку загрузчик -->
  <CardBox :title="title" form @submit="submit" :loader="loaderSubmit">
    
    <!-- ошибки от апи выброшенные валидатором -->
    <DisplayErrors
      v-if="errorsFromApi"
      :errors="errorsFromApi"
      class="-mt-6"
    />
    <!-- 
    Тут мы используем компоненты создания формы
    можно посмотреть resources/scripts/admin/Goods/GoodsCreator.vue
    -->
    
  </CardBox>
</template>
