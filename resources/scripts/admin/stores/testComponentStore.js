import { ref, reactive, defineAsyncComponent, watch } from "vue";
import { defineStore } from "pinia";

export const useTestComponentStore = defineStore("testComponent", () => {

  //const testRunned
  const formSettings = reactive([]);
  const pathTestComponent = ref(null)
  const ready = ref(false)
  
  async function init(pathfile, cb) {
    const formSettingsComponent = await defineAsyncComponent(() =>
      import('../Goods/Tests/GoodsOptionListTest.vue')
    );
    
    pathTestComponent.value = pathfile
    
    return cb(formSettingsComponent);
  }

  return { formSettings, init };
});
