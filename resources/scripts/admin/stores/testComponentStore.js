import { ref, reactive, defineAsyncComponent, watch } from "vue";
import { defineStore } from "pinia";

export const useTestComponentStore = defineStore("testComponent", () => {

  const formSettings = reactive([]);
  const settingNames = reactive({})
  const pathTestComponent = ref(null)
  const stateComponent = reactive({})
  
  /*watch(formSettings, (formItems) => {
    formItems.forEach((item) => {
      const itemInState = stateComponent[item.name]
      
      if (itemInState && itemInState.value != item.value) {
        itemInState.value = item.value
      }
    })
  })*/
  watch(formSettings, (formItems) => {
    formItems.forEach((item) => {
      const itemInNames = settingNames[item.name]
      if (!itemInNames) {
        Object.assign(settingNames, {[item.name]: item})
      }
      
      if (itemInNames && itemInNames.value != item.value) {
        itemInNames.value = item.value
      }
    })
  }, { deep: true })
  
  async function init(pathfile, cb) {
    const formSettingsComponent = await defineAsyncComponent(() =>
      import('../Goods/Tests/GoodsOptionListTest.vue')
    );
    
    pathTestComponent.value = pathfile
    
    return cb(formSettingsComponent);
  }
  
  function setForm(formItems) {
    formItems.forEach((item) => {
      formSettings.push(item)
    })
  }

  return { formSettings, settingNames, init, setForm };
});
