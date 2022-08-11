import { useGoodsOptionStore } from "@/admin/stores/goodsOptionStore.js";
import { storeToRefs } from "pinia";

// load an options
export const {
  list,
  tree,
  loading,
  error: errorStore,
} = storeToRefs(useGoodsOptionStore());

export const { load } = useGoodsOptionStore();