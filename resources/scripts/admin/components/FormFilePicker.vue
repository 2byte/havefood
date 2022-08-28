<script setup>
import { mdiUpload } from "@mdi/js";
import { computed, ref, watch, reactive } from "vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import PreviewImages from "@/admin/components/PreviewImages.vue";
import { sendFile } from "@/admin/libs/Api.js"

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
  fileModel: {
    default: 'goods'
  },
  enablePreview: {
    default: true
  }
});

const test = ref(true)

const emit = defineEmits(["update:modelValue", "dropPreview"]);

const root = ref(null);

const files = ref(props.modelValue);

const modelValueProp = computed(() => props.modelValue);

watch(modelValueProp, (value) => {
  files.value = value;

  if (!value) {
    root.value.input.value = null;
  }
});

const readerImages = (file, cb) => {
  if (!file.type.startsWith('image/')) {
    return alert('Выберите изображения');
  }
  
  const reader = new FileReader();
  
  reader.addEventListener("load", (event) => {
    cb(event.target.result);
  });
  
  reader.readAsDataURL(file);
};

const simulatorProgress = (cb) => {
  let amount = 0;
  const rand = Math.floor(Math.random() * 30)
  const timer = setInterval(() => {
    amount += rand
    if (amount >= 100) {
      clearInterval(timer)
      cb(100, true)
    } else {
      cb(amount)
    }
  }, 1000)
}

const previewImageItems = ref([])

const upload = (event) => {
  const value = event.target.files || event.dataTransfer.files;

  files.value = value;

  emit("update:modelValue", files.value);
  
  for (let i = 0; i<files.value.length; i++) {
    readerImages(files.value[i], (fileSourceUrl) => {
      
      const previewData = reactive({
        imageObj: fileSourceUrl,
        uploadPercent: 0,
        complete: false,
        error: null
      })
      
      previewImageItems.value.push(previewData)
      
      if (test.value) {
        setTimeout(function () {
          previewData.complete = false
          simulatorProgress((percent, complete) => {
            previewData.uploadPercent = percent
            if (complete) previewData.complete = true
          })
        }, 2000)
      }
      
      sendFile('file/upload', {
        model: props.fileModel, 
        files: files.value[i]
      }).onUploadProgress((ev) => {
        previewImageItems.value[i].uploadPercent = (ev.loaded * 100) / ev.total
      }).complete((ok, data) => {
        previewImageItems.value[i].complete = true
        
        Object.assign(previewImageItems.value[i], data)
      }).run()
    })
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
  <PreviewImages v-if="previewImageItems.length && enablePreview" :images="previewImageItems"/>
  
  <div
    v-if="dropZone"
    class="w-full p-4 border-slate-400 border-2 border-dashed text-slate-500 mb-2"
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
          :class="{ 'rounded-r-none': files }"
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
      <div v-if="files">
        <span
          class="inline-flex px-4 py-2 justify-center bg-gray-100 dark:bg-gray-800 border-gray-200 dark:border-gray-700 border rounded-r"
        >
          {{ files }}
        </span>
      </div>
    </div>
  </div>
</template>
