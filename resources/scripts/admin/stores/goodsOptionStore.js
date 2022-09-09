import { defineStore } from "pinia";
import Api from "@/admin/libs/Api.js";

export const useGoodsOptionStore = defineStore("goodsOption", {
  state: () => ({
    option: null,
    loading: true,
    error: null,
  }),
  actions: {
    async loadOption(optionId, forceLoad = true) {
      if (!forceLoad && Object.keys(this.option) > 0) {
        if (this.loading) this.loading = false;

        return Promise.resolve();
      }

      const req = Api("goods/option/get/first", 'post', {id: optionId});

      req.complete((ok, data) => {
        this.loading = false;
        if (ok) {
          this.option = data;
        }
      });

      req.success((data) => {});

      req.fail((err) => {
        this.error = err;
        alert(err);
      });
      
      req.run()
    },
  },
});
