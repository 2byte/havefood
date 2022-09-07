import { ref, reactive, defineAsyncComponent, watch, computed } from "vue";
import { defineStore } from "pinia";

export const useTestComponentStore = defineStore("testComponent", () => {
  const formSettings = ref([]);
  const settingNames = reactive({});
  const pathTestComponent = ref(null);
  const stateComponent = ref({});

  // formSettings to settingNames
  watch(
    formSettings,
    (formItems) => {
      formItems.forEach((item) => {
        const itemInNames = settingNames[item.name];

        if (!itemInNames) {
          Object.assign(settingNames, { [item.name]: item });
        }

        if (itemInNames && itemInNames.value != item.value) {
          itemInNames.value = item.value;
        }
      });
    },
    { deep: true }
  );

  function setForm(formItems) {
    formSettings.value = formItems
  }

  function setStateComponent(refObj) {
    stateComponent.value = refObj;
  }

  return {
    formSettings,
    settingNames,
    stateComponent,
    setForm,
    setStateComponent,
  };
});
