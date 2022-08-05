import { defineStore } from 'pinia'
import Api from '@/admin/libs/Api.js'

export const useGoodsTypeStore = defineStore('goodsType', {
    state: () => ({
        listGoodsTypes: [],
        loading: true,
        error: null
    }),
    actions: {
        async fetchAllGoodsTypes(forceLoad = true) {
            
            if (!forceLoad && this.listGoodsTypes.length > 0) {
                if (this.loading) this.loading.false;
                
                return Promise.resolve()
            }
            
            await Api('different/get-goods-types')
                .complete((ok, data) => {
                    this.loading = false
                    if (ok) {
                        this.listGoodsTypes = data;
                    }
                })
                .fail((err) => {
                    this.error = err
                    alert(err)
                });
        }
    }
})