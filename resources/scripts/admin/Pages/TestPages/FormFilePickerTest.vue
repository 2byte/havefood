<script setup>
import { ref, reactive, watch, computed, toRef } from "vue";
import FormFilePicker from "@/admin/components/FormFilePicker.vue";
//import PreviewImages from "@/admin/components/PreviewImages.vue";
import FormTestSetting from "@/admin/components/FormTestSetting.vue";
import Api from "@/admin/libs/Api.js";
import { mdiBugPlay } from "@mdi/js";

const formSettings = reactive([
  {
    name: "goodsId",
    label: "ID товара",
    value: ref(0),
  },
  {
    name: "fileModel",
    value: ref("goods"),
    label: "Модель",
    type: "select",
    options: [
      {
        label: "goods",
        value: "goods",
      },
    ],
  },
  {
    name: "mode",
    label: "Режим",
    options: { create: "Создание", edit: "Редактирование" },
    value: ref("create"),
    type: "radio",
  },
  {
    name: "submit",
    label: "Запустить компонент",
    value: ref(null),
    type: "button",
    color: "success",
    icon: mdiBugPlay,
    click() {
      testRun.value = true
    }
  },
]);

const testPreview = reactive({
  enable: true,
  mode: "upload",
});

const images = ref([]);

const testRun = ref(false);
const test = reactive({
  run: testRun,
  mode: ref("upload"),
  testFiles: [],
});

Api("get-samples-images")
  .success((data) => {
    const promises = data.map((url) => {
      return new Promise((resolve, reject) => {
        Api(url, "get", null, { responseType: "blob" })
          .complete((ok, data) => {
            if (!ok) console.log("Error getting samples images");
            resolve(data);
          })
          .fail((err) => {
            console.error(err);
            reject(err);
          })
          .run();
      });
    });

    Promise.all(promises).then((res) => {
      test.testFiles = res;
    });
  })
  .run();
</script>

<template>
  <div
    class="px-2 py-2 bg-gray-100 min-h-screen flex flex-col items-stretch justify-center"
  >
    <FormTestSetting v-model:formSettings="formSettings" />

    <!--
    <PreviewImages v-if="testPreview.enable" :images="images"/>
    -->

    <FormFilePicker
      label="Загрузить изображение"
      fileModel="goods"
      :test="test"
    />
  </div>
</template>
