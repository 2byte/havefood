<script setup>
import { reactive, ref, watch, computed, markRaw } from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import { useCategoriesStore } from "@/admin/stores/categories.js";
import BaseButton from "@/admin/components/BaseButton.vue";
import { storeToRefs } from "pinia";
import { mdiPlaylistEdit, mdiPlus, mdiClose } from "@mdi/js";
import "/resources/css/animate.css/animate.min.css";
import GoodsCategoryForm from "@/admin/Goods/GoodsCategoryForm.vue";
import ActionButtons from "@/admin/components/CardBoxRepository/ActionButtons.js";
import Api from "@/admin/libs/Api.js";

const categoriesStore = useCategoriesStore();
const { listCategories: list } = storeToRefs(categoriesStore);
const { fetchAllCategories, removeById } = categoriesStore;

const props = defineProps({});

const state = reactive({});

fetchAllCategories();

const stateOpenEditorTabs = reactive({});

const showEditFormCategory = (id) => {
  stateOpenEditorTabs[id] = !stateOpenEditorTabs[id];
};

const showFormCreateCategory = ref(false);

const categoryButtons = {};

const setCategoryButtons = (list) => {
  list.forEach((cat) => {
    categoryButtons[cat.id] = new ActionButtons([
      {
        id: "actionRemove",
        title: "Удалить",
        icon: mdiClose,
        isActive: ref(false),
        click() {
          if (confirm('Удалить категорию вместе с товарами?')) {
            Api('categories/delete', 'post', {id: cat.id})
              .success((data) => {
                removeById(cat.id)
              })
              .run()
          }
        },
      },
    ]);
  });
};

watch(list, (newList) => {
  setCategoryButtons(newList);
});

</script>

<template>
  <GoodsCategoryForm
    v-if="showFormCreateCategory"
    @created="fetchAllCategories(true)"
  />

  <BaseButton
    v-if="!showFormCreateCategory"
    class="mb-2 mx-2"
    color="success"
    label="Создать категорию"
    :icon="mdiPlus"
    @click.prevent="showFormCreateCategory = true"
  />

  <CardBox
    v-for="category in list"
    :key="category.id"
    :title="category.name"
    :empty="!list.length"
    empty-message="Пока нет категорий"
    :header-icon="mdiPlaylistEdit"
    @header-icon-click="showEditFormCategory(category.id)"
    :action-button-manager="categoryButtons[category.id]"
  >
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
    >
      <div v-if="!stateOpenEditorTabs[category.id]">
        <span class="text-zinc-400">Позиция:</span> {{ category.sortpos }}
        <br />
        <span class="text-zinc-400">Количество товаров:</span>
        {{ category.count_goods }}
      </div>
    </transition>
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
    >
      <GoodsCategoryForm
        v-if="stateOpenEditorTabs[category.id]"
        :categoryData="category"
        mode="update"
        @created="fetchAllCategories(true)"
      />
    </transition>
  </CardBox>
</template>
