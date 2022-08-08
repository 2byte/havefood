<script setup>
import { computed, watch, ref } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";

const props = defineProps({
  'errors': Object
});

const errorItems = computed(() => {
  return Object.keys(props.errors.errors).map((field) => {
    return props.errors.errors[field][0]
  })
})
</script>

<template>
  <div class="bg-rose-100 p-6 text-rose-700 mb-2 -mx-6">
    <div class="font-medium mb-2">Что-то не так!</div>
    <ul class="list-disc list-inside space-y-3">
      <li v-for="error in errorItems" class="font-light">{{ error }}</li>
    </ul>
  </div>
</template>
