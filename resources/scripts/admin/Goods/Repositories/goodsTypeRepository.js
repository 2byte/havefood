import { computed } from "vue";
import { useGoodsTypeStore } from "@/admin/stores/goodsTypeStore.js";
import { storeToRefs } from "pinia";

// load a goods types
const { fetchAllGoodsTypes } = useGoodsTypeStore();
const { listGoodsTypes, loading: loadingGoodsTypes } = storeToRefs(
  useGoodsTypeStore()
);

fetchAllGoodsTypes();

export const goodsTypeOptions = computed(() => {
  const options = listGoodsTypes.value.map((data) => {
    const nameEn = Object.keys(data)[0];
    return { value: nameEn, label: data[nameEn] };
  });
  options.unshift({ value: 0, label: "Выберите тип товара" });

  return options;
});

export { loadingGoodsTypes, listGoodsTypes };
