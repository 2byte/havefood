<script setup>
import { computed, watch, ref, reactive } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";

defineProps({
  goodsId: Number,
});

const form = reactive({
  group: 0,
});

const groupOptions = { 0: "Одиночная", 1: "Группа" };

const submit = () => {};
</script>

<template>
  <CardBox title="Создание опции" form @submit.prevent="submit">
    <FormField label="Тип опции">
      <FormCheckRadioPicker
        v-model="form.group"
        name="group"
        type="radio"
        :options="groupOptions"
      />
    </FormField>
  </CardBox>
</template>
