<script setup>
import FormFilePicker from '@/admin/components/FormFilePicker.vue'
</script>

<template>
  <div
    class="px-2 py-2 bg-gray-100 min-h-screen flex flex-col items-stretch justify-center"
  >
    <!--
    <PreviewImages v-if="testPreview.enable" :images="images"/>
    -->
    <FormFilePicker
      label="Загрузить изображение"
      model="goods"
      test
    />
  </div>
</template>
