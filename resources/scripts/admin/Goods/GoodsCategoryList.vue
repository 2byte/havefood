<script setup>
import { reactive, ref, watch, computed } from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import { useCategoriesStore } from "@/admin/stores/categories.js";
import { storeToRefs } from "pinia";

const categoriesStore = useCategoriesStore()
const { listCategories: list } = storeToRefs(categoriesStore)
const { fetchAllCategories } = categoriesStore

const props = defineProps({});

const state = reactive({});

//fetchAllCategories(true)
</script>

<template>
  <CardBox v-for="category in list" :title="category.name" :empty="!list.length" empty-message="Пока нет категорий">
    <span class="text-zinc-400">Позиция:</span> {{ category.sortpos }} <br>
    <span class="text-zinc-400">Количество товаров:</span> {{ category.count_goods }}
  </CardBox>
</template>