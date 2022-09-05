import {
  defineStore
} from "pinia";
import Api from "@/admin/libs/Api.js";

export const useGoodsOptionListStore = defineStore("goodsOptionList", {
  state: () => ({
    listByGoodsId: [],
    listByOptionId: [],
    listByPersonal: [],
    listAll: [],
    sourceValue: null,
    goodsData: null,
    statusLoading: {
      listByGoodsId: true,
      listByOptionId: true,
      listByPersonal: true,
      listAll: true,
    },
    errors: {
      listByGoodsId: null,
      listByOptionId: null,
      listByPersonal: null,
      listAll: null,
    },
    lazyLoad: true
  }),
  actions: {
    loadOptions({
      source, value = null, forceLoad = false
    }) {
      this.sourceValue = value

      const sourceName = this.makeNameStorage(source)

      const storage = this[`listBy${sourceName}`]

      if (!storage) {
        throw new Error(`Error find storage listBy${sourceName}`)
      }

      if (this.lazyLoad && !forceLoad && storage.length) {
        return storage
      }

      Api('goods/option/get', 'post', {
        source, value
      })
      .success((data) => {
        storage = data
      }).fail((err) => {
        this.errors[sourceName] = err
      })
    },
    makeNameStorage(source) {
      return `${source[0].toUpperCase()}${source.substr(1)}`
    },
    isLoadingBySource(source) {
      return this.statusLoading(this.makeNameStorage(source))
    }
    /*async load(goodsId, forceLoad = true) {
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
    },*/
  },
});