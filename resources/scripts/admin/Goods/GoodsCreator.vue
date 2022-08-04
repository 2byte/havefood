<script setup>
    import { computed, watch } from 'vue'
    import FormField from '@/admin/components/FormField.vue'
    import FormControl from '@/admin/components/FormControl.vue'
    import CardBox from '@/admin/components/CardBox.vue'
    import BaseIcon from '@/admin/components/BaseIcon.vue'
    import { useForm } from '@inertiajs/inertia-vue3' 

    import {
        //mdiCashMultiple,
        mdiShoppingOutline,
        mdiFolder
    } from '@mdi/js'
    
    const props = defineProps({
        'category': {
            default: null
        },
        'mode': {
            default: 'create'
        },
        'goodsCategories': {
            type: Object,
            default: []
        }
    })
    
    const titleCardBox = computed(() => props.mode == 'create' ? 'Создание товара' : 'Редактирование товара')

    const form = useForm({
        name: null,
        category_id: 0
    })
    
    const submit = () => {
        
    }
    
    const categoryOptions = props.goodsCategories.map((category) => {
        return {
            id: category.id,
            label: `${category.name} (${category.count_goods})`
        }
    })
    categoryOptions.unshift({id: 0, label: 'Выберите категорию', selected: true})
    form.category_id = categoryOptions[0]
</script>

<template>
    <CardBox :title="titleCardBox" form @submit.prevent="submit">
        <FormField label="Имя товара">
          <FormControl
            v-model="form.name"
            :icon="mdiShoppingOutline"
            placeholder="Бургер"
          />
          <FormControl
            v-model="form.category_id"
            :icon="mdiFolder"
            :options="categoryOptions"
            placeholder="Выберите категорию"
          />
        </FormField>
    </CardBox>
</template>