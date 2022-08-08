<script setup>
import {computed} from 'vue'
//import BaseIcon from "@/admin/componentS/BaseIcon.vue";

const props = defineProps({
  type: {
    type: String,
    default: 'circle'
  },
  w: {
    type: String,
    default: '6'
  },
  h: {
    type: String,
    default: '6'
  },
  size: {
    default: 24
  }
})

const spanClass = computed(() => {
  return [`w-${props.w}`, `h-${props.h}`]
})
</script>

<template>
  <span :class="spanClass">
  <svg
    v-if="type == 'circle'"
    xmlns="http://www.w3.org/2000/svg"
    aria-hidden="true"
    role="img"
    :width="size"
    :height="size"
    preserveAspectRatio="xMidYMid meet"
    viewBox="0 0 24 24"
  >
    <path
      fill="none"
      stroke="currentColor"
      stroke-dasharray="15"
      stroke-dashoffset="15"
      stroke-linecap="round"
      stroke-width="2"
      d="M12 3C16.9706 3 21 7.02944 21 12"
    >
      <animate
        fill="freeze"
        attributeName="stroke-dashoffset"
        dur="0.3s"
        values="15;0"
      />
      <animateTransform
        attributeName="transform"
        dur="1.5s"
        repeatCount="indefinite"
        type="rotate"
        values="0 12 12;360 12 12"
      />
    </path>
  </svg>
  
  <svg v-if="type == 'circle2'" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" :width="size" :height="size" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5"/><path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z"><animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate"/></path></svg>
  
  <svg v-if="type == 'line'" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" :width="size" :height="size" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><circle cx="18" cy="12" r="0" fill="currentColor"><animate attributeName="r" begin=".67" calcMode="spline" dur="1.5s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="12" r="0" fill="currentColor"><animate attributeName="r" begin=".33" calcMode="spline" dur="1.5s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="6" cy="12" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1.5s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>

</span>
</template>
