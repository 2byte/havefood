<script setup>
import { computed, watch, ref, reactive } from "vue";
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import CardBox from "@/admin/components/CardBox.vue";
import FormField from "@/admin/components/FormField.vue";
import FormControl from "@/admin/components/FormControl.vue";
import FormCheckRadioPicker from "@/admin/components/FormCheckRadioPicker.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import GoodsOptionForm from "@/admin/Goods/GoodsOptionForm.vue";

const props = defineProps({
  goodsId: Number,
  type: {
    type: String,
    default: "createOption",
  },
});

const submit = () => {};

const compGoodsOptionList = reactive({
  
})

const onCreated = () => {
  alert('On created')
}
</script>

<template>
  <GoodsOptionForm :goods-id="goodsId" @created="onCreated" class="mb-2"/>
</template>
