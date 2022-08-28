<script setup>
import { ref } from 'vue'
import FormFilePicker from "@/admin/components/FormFilePicker.vue";
import PreviewImages from "@/admin/components/PreviewImages.vue";
import FormTestSetting from '@/admin/components/FormTestSetting.vue'

const formSettings = [
  {
    name: 'goodsId',
    label: 'ID товара',
    type: 'input',
  }
]
</script>

<template>
  <div
    class="px-2 py-2 bg-gray-100 min-h-screen flex flex-col items-stretch justify-center"
  >
    <FormTestSetting :settings="formSettings"/>
    
    <PreviewImages />
    <FormFilePicker label="Загрузить изображение" :enable-preview="false"/>
  </div>
</template>
