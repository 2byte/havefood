<script setup>
import { ref, reactive, watch, toRefs } from "vue";
import FormTestSetting from "@/admin/components/FormTestSetting.vue";
import Api from "@/admin/libs/Api.js";

const props = defineProps({
  modelTestProps: {
    type: Object,
    default: () => {}
  }
})

const emit = defineEmits(['update:modelTestProps'])

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
    role: 'run',
    click() {
      test.run = true;
    },
  },
]);

const test = reactive({
  run: false,
  mode: ref("upload"),
  testFiles: [],
});

watch(() => test.run, (newVal) => {
  emit('update:modelTestProps', test)
})

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
  <FormTestSetting v-model:formSettings="formSettings" />
</template>
