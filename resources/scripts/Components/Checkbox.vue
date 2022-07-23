<script setup>
import { computed, ref, onMounted } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        default: null
    },
    checkedDefault: {
        default: false
    }
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit("update:checked", val);
    },
});

const inputCheckbox = ref(null);

const isChecked = computed(() => { return props.checkedDefault; });

onMounted(() => {
    inputCheckbox.value.checked = isChecked;
    proxyChecked.value = true;
});
</script>

<template>
    <input type="checkbox" :value="value" v-model="proxyChecked" ref="inputCheckbox">
</template>
