<script setup>
import FormField from '@/admin/components/FormField.vue'
import FormControl from '@/admin/components/FormControl.vue'

const props = defineProps({
  settings: {type: Array}
});
</script>

<template>
  <div
    class="block my-4 p-4 border-solid border border-slate-300 bg-slate-200 shadow-sm"
  >
    <header class="text-2xl text-gray-700 font-extrathin mb-4">
      Данные для компонента
    </header>
    <FormField v-for="item in settings" :key="item.name" :label="item.label">
      <FormControl :type="item.type" />
    </FormField>
  </div>
</template>
