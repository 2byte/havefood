<script setup>
import { mdiUpload } from "@mdi/js";
import { computed, ref, watch, reactive, defineAsyncComponent, shallowReactive } from "vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import PreviewImages from "@/admin/components/PreviewImages.vue";
import { sendFile } from "@/admin/libs/Api.js";
import DisplayErrors from "@/admin/components/DisplayErrors.vue";

const props = defineProps({
  modelValue: {
    type: [Object, File, Array],
    default: null,
  },
  label: {
    type: String,
    default: "Upload",
  },
  icon: {
    type: String,
    default: mdiUpload,
  },
  accept: {
    type: String,
    default: null,
  },
  color: {
    type: String,
    default: "info",
  },
  dropZone: {
    default: true,
  },
  enablePreview: {
    default: true,
  },
  test: {
    type: Boolean,
    default: null,
  },
  mode: {
    type: String,
    default: 'create'
  },
  model: {
    required: true,
    type: String
  },
  model_id: {
    type: Number,
    default: 0
  },
  dataPreviews: {
    type: Array,
    default: () => []
  }
});

// ---------------- test property --------------//
const test = props.test;

let testComponent = ref(null)

if (test) {
  testComponent.value = defineAsyncComponent(() => import('@/admin/components/FormFilePickerTest.vue'))
}

const testProps = ref({})

// Running test
const testRunner = () => {
  const testData = testProps.value
  
  if (testData.upload) {
    
    const runUpload = (val) => {
      upload({
        target: {
          files: val,
        },
      });
    }
    
    if (testData.testFiles.length && testData.mode == 'create') {
      runUpload(testData.testFiles)
    }
    
    watch(() => testData.testFiles, (val) => {
      console.log('watched')
      runUpload(val)
    });
    
    console.log('run test', test.mode)
  }
};

watch(testProps, (newVal) => {
  console.log('runned from watch')
  if (newVal) {
    testRunner()
    
    if (newVal.previews?.length) {
      previewImageItems.value = newVal.previews
    }
    
    Object.assign(state, newVal)
  }
}, {deep: true})

// ---------------- main --------------//

const mode = ref(props.mode)

const state = reactive({
  mode: ref(props.mode),
  model: props.model,
  model_id: props.model_id,
  previews: props.dataPreviews
})

const emit = defineEmits(["update:modelValue", "dropPreview"]);

const root = ref(null);

const files = ref(props.modelValue);

const previewImageItems = ref([]);

const modelValueProp = computed(() => props.modelValue);

watch(modelValueProp, (value) => {
  files.value = value;

  if (!value) {
    root.value.input.value = null;
  }
});

const readerImages = (file, cb) => {
  if (!file.type.startsWith("image/")) {
    return alert("Выберите изображения");
  }

  const reader = new FileReader();

  reader.addEventListener("load", (event) => {
    cb(event.target.result);
  });

  reader.readAsDataURL(file);
};

const simulatorProgress = (cb) => {
  let amount = 0;
  const rand = Math.floor(Math.random() * 30);
  const timer = setInterval(() => {
    amount += rand;
    if (amount >= 100) {
      clearInterval(timer);
      cb(100, true);
    } else {
      cb(amount);
    }
  }, 1000);
};

const errorsUpload = ref(null)

const upload = (event) => {
  const value = event.target.files || event.dataTransfer.files;

  files.value = value;

  emit("update:modelValue", files.value.length);
  
  for (let i = 0; i < files.value.length; i++) {
    readerImages(files.value[i], (fileSourceUrl) => {
      const previewData = reactive({
        imageObj: fileSourceUrl,
        uploadPercent: 0,
        complete: false,
        uploading: true,
        error: null,
      });

      previewImageItems.value.push(previewData);
      
      if (testProps.value.run && testProps.value.mode == 'create') {
        setTimeout(function () {
          previewData.complete = false;
          simulatorProgress((percent, complete) => {
            previewData.uploadPercent = percent;
            if (complete) previewData.complete = true;
          });
        }, 2000);
      }

      sendFile("file/upload", {
        model: props.model,
        relate_id: state.model_id,
        files: files.value[i],
      })
        .setErrors(errorsUpload)
        .onUploadProgress((ev) => {
          previewData.uploadPercent =
            (ev.loaded * 100) / ev.total;
        })
        .complete((ok, data) => {
          Object.assign(previewData, {
            complete: true,
            uploading: false,
            id: data[0]?.id,
            error: !ok
          })
        })
        .run();
    });
  }

  // Use this as an example for handling file uploads
  // let formData = new FormData()
  // formData.append('file', file.value)

  // const mediaStoreRoute = `/your-route/`

  // axios
  //   .post(mediaStoreRoute, formData, {
  //     headers: {
  //       'Content-Type': 'multipart/form-data'
  //     },
  //     onUploadProgress: progressEvent
  //   })
  //   .then(r => {
  //
  //   })
  //   .catch(err => {
  //
  //   })
};

// const uploadPercent = ref(0)
//
// const progressEvent = progressEvent => {
//   uploadPercent.value = Math.round(
//     (progressEvent.loaded * 100) / progressEvent.total
//   )
// }

</script>

<template>
  
  <component :is="testComponent" v-model:testProps="testProps"/>
    
  <PreviewImages
    v-if="previewImageItems.length && enablePreview"
    :images="previewImageItems"
  />

  <DisplayErrors v-if="errorsUpload" :errors="errorsUpload" />
  
  <div
    v-if="dropZone"
    class="w-full p-4 border-slate-400 border-2 border-dashed text-slate-500 mb-2"
    :="$attrs"
  >
    
    <div class="mb-2 font-semibold w-full text-center">
      Зона для перетаскивания файлов
    </div>
    <div class="flex items-stretch justify-start relative">
      <label class="inline-flex">
        <BaseButton
          as="a"
          :label="label"
          :icon="icon"
          :color="color"
        />
        <input
          ref="root"
          type="file"
          class="absolute top-0 left-0 w-full h-full opacity-0 outline-none cursor-pointer -z-1"
          :accept="accept"
          @input="upload"
          multiple
        />
      </label>
    </div>
  </div>
</template>
