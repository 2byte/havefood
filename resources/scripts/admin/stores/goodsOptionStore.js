import { defineStore } from "pinia";
import Api from "@/admin/libs/Api.js";

export const useGoodsOptionStore = defineStore("goodsOption", {
  state: () => ({
    list: [],
    tree: [],
    goodsId: null,
    goodsData: null,
    loading: true,
    error: null,
  }),
  actions: {
    async load(goodsId, forceLoad = true) {
      
      if (!forceLoad && this.list.length > 0) {
        if (this.loading) this.loading.false;

        return Promise.resolve();
      }

      Api(`goods/option/get`, 'get', {goods_id: goodsId})
        .complete((ok, data) => {
          this.loading = false;
          if (ok) {
            this.list = data.options;
            this.tree = data.treeOptions;
            this.goodsData = data.goods;
            this.goodsId = goodsId
          }
        })
        .fail((err) => {
          this.error = err;
          alert(err);
        })
        .run();
    },
  },
});
