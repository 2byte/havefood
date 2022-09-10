import { defineStore, storeToRefs } from "pinia";
import Api from "@/admin/libs/Api.js";
import { toRef } from 'vue'
import { useGoodsOptionStore } from '@/admin/stores/goodsOptionStore.js'

export const useGoodsOptionListStore = defineStore("goodsOptionList", {
  state: () => ({
    listByGoodsId: [],
    listByOptionId: [],
    listByPersonal: [],
    listByAll: [],
    sourceValue: null,
    goodsData: null,
    statusLoading: {
      listByGoodsId: true,
      listByOptionId: true,
      listByPersonal: true,
      listByAll: true,
    },
    errors: {
      listByGoodsId: null,
      listByPersonal: null,
      optionId: null,
      listAll: null,
    },
    lazyLoad: true,
    parentOptionStore: null
  }),
  actions: {
    async loadOptions({ source, value = null, forceLoad = false }) {
      this.sourceValue = value;

      const sourceName = this.makeNameStorage(source);
      const keySource = `listBy${sourceName}`
      
      this.statusLoading[keySource] = true
      
      const storage = this[keySource];

      if (!storage) {
        throw new Error(`Error find storage listBy${sourceName}`);
      }
      
      if (source == 'optionId') {
        const optionStore = useGoodsOptionStore()
        
        optionStore.loadOption(value)
        
        this.parentOptionStore = optionStore
      }

      if (this.lazyLoad && !forceLoad && storage.length) {
        this.statusLoading[keySource] = false
        return storage;
      }

      Api("goods/option/get", "post", {
        source,
        value,
      })
        .success((data) => {
          this[keySource] = data.options;
        })
        .complete((ok, data) => {
          this.statusLoading[keySource] = false
        })
        .fail((err) => {
          this.errors[keySource] = err;
          console.log(err)
        })
        .run();
    },
    makeNameStorage(source) {
      return `${source[0].toUpperCase()}${source.substr(1)}`;
    },
    isLoadingBySource(source) {
      return toRef(this.statusLoading, `listBy${this.makeNameStorage(source)}`);
    },
  },
});
