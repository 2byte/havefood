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
    referencesByGoodsId: [],
    referencesByOptionId: [],
    referencesByPersonal: [],
    referencesByAll: [],
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
      const keySourceReferences = `referencesBy${sourceName}`
      
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
          this.goodsData ??= data.goods
          this[keySource] = data.options;
          this[keySourceReferences] = data.references;
        })
        .complete((ok, data) => {
          this.statusLoading[keySource] = false
        })
        .fail((err) => {
          this.errors[keySource] = err;
          console.log(err, 'load from source', source)
        })
        .run();
    },
    makeNameStorage(source) {
      return `${source[0].toUpperCase()}${source.substr(1)}`;
    },
    isLoadingBySource(source) {
      return toRef(this.statusLoading, `listBy${this.makeNameStorage(source)}`);
    },
    isAttachedOption(optionId, goodsId) {
      return this.referencesByGoodsId.find((item) => item.option_id == optionId && item.goods_id == goodsId);
    },
    attachOption(option_id, goods_id, attach = true) {
      if (attach) {
        this.referencesByGoodsId.push({option_id, goods_id})
      } else {
        this.referencesByGoodsId.forEach((item, i) => {
          if (item.option_id == option_id) {
            this.referencesByGoodsId.splice(i, 1)
          }
        })
      }
    },
    // Remove option from storage
    removeOption(optionId) {
      // remove option from lists
      const lists = [
        'listByGoodsId',
        'listByOptionId',
        'listByPersonal',
        'listByAll'
      ]
      
      for (const listKey of lists) {
        this[listKey].forEach((item, i) => {
          if (item.id == optionId) {
            this[listKey].splice(i, 1)
          }
          if (item?.childs) {
            item.childs.forEach((childItem, indexChild) => {
              if (childItem.id == optionId) {
                this[listKey][i].childs.splice(indexChild, 1)
              }
            })
          }
        })
      }
      
      // remove options from references
      const listReferences = [
        'referencesByGoodsId',
        'referencesByOptionId',
        'referencesByPersonal',
        'referencesByAll',
      ]
      
      for (const listKey of listReferences) {
        this[listKey].forEach((item, i) => {
          if (item.option_id == optionId) {
            this[listKey].splice(i, 1)
          }
        })
      }
    }
  },
});
