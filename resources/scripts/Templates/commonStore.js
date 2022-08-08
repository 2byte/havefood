import { defineStore } from "pinia";
import Api from "@/admin/libs/Api.js";

export const useCommonStore = defineStore("common-name", {
  state: () => ({
    list: [],
    currentItem: null,
    loading: true,
    error: null,
  }),
  actions: {
    async fetchAll(forceLoad = true) {
      if (!forceLoad && this.listCategories.length > 0) {
        if (this.loading) this.loading.false;

        return Promise.resolve();
      }

      const req = Api("method");

      req.complete((ok, data) => {
        this.loading = false;
        if (ok) {
          this.list = data;
        }
      });

      req.success((data) => {});

      req.fail((err) => {
        this.error = err;
        alert(err);
      });
    },
  },
});
