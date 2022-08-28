import { defineStore } from "pinia";
import Api from "@/admin/libs/Api.js";

export const useCategoriesStore = defineStore("categories", {
  state: () => ({
    listCategories: [],
    category: null,
    loading: true,
    error: null,
  }),
  actions: {
    async fetchAllCategories(forceLoad = true) {
      if (!forceLoad && this.listCategories.length > 0) {
        if (this.loading) this.loading.false;

        return Promise.resolve();
      }

      await Api("categories")
        .complete((ok, data) => {
          this.loading = false;
          if (ok) {
            this.listCategories = data;
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
