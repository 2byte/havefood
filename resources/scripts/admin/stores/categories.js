import { defineStore } from 'pinia'
import Api from '@/admin/libs/Api.js'

export const useCategoriesStore = defineStore('categories', {
    state: () => ({
        listCategories: [],
        category: null,
        loading: true,
        error: null
    }),
    actions: {
        async fetchAllCategories() {
            await Api('categories')
                .complete((ok, data) => {
                    this.loading = false
                    if (ok) {
                        this.listCategories = data;
                    }
                })
                .fail((err) => {
                    this.error = err
                    alert(err)
                });
        }
    }
})