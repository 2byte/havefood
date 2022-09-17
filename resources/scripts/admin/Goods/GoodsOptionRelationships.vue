<script setup>
import { reactive, ref } from "vue";
import { storeToRefs } from "pinia";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import GoodsOptionForm from "@/admin/Goods/GoodsOptionForm.vue";
import GoodsOptionList from "@/admin/Goods/GoodsOptionList.vue";
//import { useGoodsOptionListStore } from "@/admin/stores/goodsOptionStore.js";
import { mdiPlus } from "@mdi/js";
import "/resources/css/animate.css/animate.min.css";

const props = defineProps({
  goodsId: Number,
});

const isCreateOption = ref(false);

const showListOption = reactive({
  goodsId: false,
  personal: false,
  all: false
})

const setShowList = (nameList) => {
  for (const key of Object.keys(showListOption)) {
    showListOption[key] = false
  }
  
  showListOption[nameList] = true
}

// Show list default
setShowList(props.goodsId ? 'goodsId' : 'personal')

const navDefaultColors = 'bg-zinc-100 text-zinc-500 border-zinc-200'
const navActiveColors = 'bg-zinc-200 border-zinc-300 text-zinc-600'
</script>

<template>
  <CardBox>
    <nav class="mb-4 shadow-sm overflow-x-auto">
      <ul class="list-none w-max devide-x">
        <li
          class="inline-block border border-solid px-4 py-2 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600"
          :class="{[navDefaultColors]: !showListOption.goodsId, [navActiveColors]: showListOption.goodsId}"
          @click.prevent="setShowList('goodsId')"
          v-if="goodsId"
        >
          Опции к товару
        </li>
        <li 
        class="inline-block border border-solid px-4 py-2 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600"
        :class="{[navDefaultColors]: !showListOption.personal, [navActiveColors]: showListOption.personal}"
        @click.prevent="setShowList('personal')"
        >
          Мои опции
        </li>
        <li class="inline-block border border-solid px-4 py-2 shadow-sm font-semibold hover:bg-zinc-200 hover:border-zinc-300 hover:text-zinc-600"
        :class="{[navDefaultColors]: !showListOption.all, [navActiveColors]: showListOption.all}"
        @click.prevent="setShowList('all')"
        >
          Все опции
        </li>
      </ul>
    </nav>
    
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
      appear
    >
      <div v-if="showListOption.goodsId">
        <GoodsOptionList :goods-id="goodsId" buttonCreate/>
      </div>
    </transition>
    
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
    >
      <div v-if="showListOption.personal">
        <GoodsOptionList list="personal" buttonCreate/>
      </div>
    </transition>
    
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
    >
      <div v-if="showListOption.all">
        <GoodsOptionList list="all" buttonCreate/>
      </div>
    </transition>
    
  </CardBox>
</template>
