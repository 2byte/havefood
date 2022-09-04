<script setup>
import { watch, ref } from 'vue'
import BaseIcon  from '@/admin/components/BaseIcon.vue'
import { mdiClose } from '@mdi/js'
import Api from '@/admin/libs/Api.js'

const props = defineProps({
  /**
   * 
   * [
   *   reactive({
        imageObj: {DOMString}, - file URL.createObjectURL()
        uploadPercent: 0,
        complete: false, - status upload true or false
        error: null - error from api
        
        // if complete == true will be added with merges
          {
            'path' => '/path', 
            'path_destination' => '/path', 
            'filename' => 'filename.jpg',
            'is_img' => true,
            'size' => 123,
            ?'resized_images' => [
              [300] => '/path',
              [600] => '/path',
            ]
          }
        }
        })
   * ]
   * */
  images: {
    type: [Array, Object],
    default: () => [] 
  },
});

const remove = (id, previewIndex) => {
  if (confirm('Удалить изображение?')) {
    Api('file/delete', 'post', {id})
      .success((data) => {
        props.images.splice(previewIndex, 1)
      })
      .run()
  }
}

watch(props.images, (newVal) => {
  newVal.forEach((item, index) => {
    if (item.error) {
      props.images.splice(index, 1)
    }
  })
}, { deep: true })

</script>

<template>
  <!--<div class="grid grid-cols-2 justify-center gap-4 mb-4">-->
  <div class="gap-2 columns-2 md:columns-3 lg:columns-4 mb-4 space-y-2">
    <div v-for="(image, index) in images" :key="index" class="relative p-1">
      <div class="absolute inset-0 text-4xl font-bold text-black/80 flex justify-center items-center" v-if="image?.uploading">
        {{ image.uploadPercent }}%
      </div>
      <button v-if="image?.complete" class="absolute top-1 right-1 text-md" @click.prevent="remove(image.id, index)">
        <BaseIcon :path="mdiClose"/>
      </button>
      <img
      :src="image.imageObj"
      :data-upload-percent="image.uploadPercent"
      alt=""
      class="w-auto ring-4 ring-gray-300 shadow-md"
      />
    </div>
  </div>
  
</template>