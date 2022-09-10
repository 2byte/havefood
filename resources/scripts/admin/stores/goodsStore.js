import { defineStore, storeToRefs } from "pinia";
import Api from "@/admin/libs/Api.js";

export const useGoodsStore = defineStore("goodsStore", {
  state: () => ({
    list: [],
    currentGoods: null,
    loading: true,
    errors: null,
    lazyLoad: true,
  }),
  actions: {
    async loadGoods({
      id = 0,
      typeList = 'singleGoods', 
      params = null, 
      forceLoad = false
    }) {

      if (this.lazyLoad && !forceLoad && this.list.length) {
        this.loading = false
        return storage;
      }
      
      const postData = {
        type_list: typeList,
        id,
      }
      
      Object.assign(postData, params)

      Api("goods/get", "post", postData)
        .success((data) => {
          
          if (typeList == 'singleGoods') {
            this.currentGoods = data
          } else {
            this.list = data;
          }
          
        })
        .complete((ok, data) => {
          this.loading = false
        })
        .fail((err) => {
          this.error = err;
          console.log('Error load a goods data', err)
        })
        .run();
    },
  },
});
