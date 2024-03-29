<script setup>
import { computed, ref, toRef, reactive } from "vue";
import CardBox from "@/admin/components/CardBox.vue";
import GoodsOptionList from "@/admin/Goods/GoodsOptionList.vue";
import GoodsOptionForm from "@/admin/Goods/GoodsOptionForm.vue";
import { useGoodsOptionListStore } from "@/admin/stores/goodsOptionListStore.js";
import "/resources/css/animate.css/animate.min.css";
import BaseIcon from "@/admin/components/BaseIcon.vue";
import BaseButton from "@/admin/components/BaseButton.vue";
import DisplayErrors from "@/admin/components/DisplayErrors.vue";
import Api from "@/admin/libs/Api.js";
import ActionButtons from "@/admin/components/CardBoxRepository/ActionButtons.js";
import PreviewImages from "@/admin/components/PreviewImages.vue";
import {
  mdiCog,
  mdiAttachment,
  mdiAttachmentCheck,
  mdiAttachmentMinus,
  mdiClose,
  mdiArrowUpBoldOutline,
  mdiArrowDownBoldOutline,
} from "@mdi/js";

const props = defineProps({
  option: Object,
  openedGoods: {
    type: Object,
    default: null,
  },
});

const emit = defineEmits(['sorted'])

const prepData = {
  price:
    props.option.price_type == "single"
      ? `+ ${props.option.price} ₽ к стоимости товара`
      : `${props.option.price} ₽ стартовая цена товара `,
  groupVariant:
    props.option.group_variant == "checkbox"
      ? "Множественный выбор"
      : "Вариативный",
};

let title = `#${props.option.id} ${props.option.name}`;

if (props.option.group) {
  title += " (Группа опций)";
}

const titleClasses = "text-gray-400 font-medium";
const cellValClasses = "text-slate-600 font-extrathin leading-2";

const showEditForm = ref(false);
const showInfo = ref(true);

const clickSetting = () => {
  showEditForm.value = !showEditForm.value;
  showInfo.value = false;
};

const isRootOption = !props.option.parent_id;

// ---------- attach option --------- //
const optionListStore = useGoodsOptionListStore();

const isAttachedToOpenedGoods = computed(() => {
  if (!props.openedGoods) {
    return false;
  }

  return optionListStore.isAttachedOption(
    props.option.id,
    props.openedGoods.id
  );
});

const isLoaderAttachment = ref(false);
const errorsAttachment = ref(null);

const attach = (optionId, goodsId, attach = true) => {
  isLoaderAttachment.value = true;

  Api("goods/option/attach", "post", {
    goods_id: goodsId,
    option_id: optionId,
    attach: !!attach,
  })
    .setLoader(isLoaderAttachment)
    .setErrors(errorsAttachment)
    .success((data) => {
      optionListStore.attachOption(optionId, goodsId, attach);
    })
    .run();
};

// ------------ end attach option ------------ //

const deleteOption = () => {
  Api("goods/option/delete", "post", { id: props.option.id })
    .success((data) => {
      optionListStore.removeOption(props.option.id);
    })
    .run();
};

const actionButtonItems = [
  {
    id: "actionDel",
    title: "Удалить",
    icon: mdiClose,
    isActive: ref(false),
    click() {
      if (confirm("Удалить опцию?")) {
        deleteOption();
      }
    },
  },
];

const actionButtonManager = new ActionButtons(actionButtonItems);

// ------------ previews ------------ //
const previews = computed(() => {
  return reactive(
    props.option?.preview_of_sizes.map((image) => {
      return {
        imageObj: image.small.url,
        id: image.small.id,
        complete: true,
      };
    })
  );
});

// ------------ Sorting ------------ //
const sort = (direction) => {
  Api('goods/option/sort', 'post', {
    option_id: props.option.id, 
    goods_id: props.openedGoods?.id,
    direction
  })
    .success((data) => {
      
      // manual sort for child a option
      if (!isRootOption) {
        try {
          optionListStore.manualSortChild(
            direction, 
            props.option.id,
            props.option.parent_id
          )
        } catch (err) {
          console.error(err)
        }
      }
      
      emit('sorted')
    })
    .run()
}
// ------------ end Sorting ------------ //
</script>

<template>
  <CardBox
    :title="title"
    :headerIcon="mdiCog"
    @header-icon-click="clickSetting"
    class="relative"
    :action-button-manager="actionButtonManager"
  >
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
      @after-leave="showInfo = true"
    >
      <div v-if="showEditForm" class="mb-2">
        <GoodsOptionForm
          v-if="showEditForm"
          class="-mx-6 -mb-6"
          title="Редактирование опции"
          :optionData="option"
          mode="update"
        />
      </div>
    </transition>
    <transition
      enter-active-class="animate__animated animate__slideInLeft"
      leave-active-class="animate__animated animate__bounceOutRight"
      appear
    >
      <div class="flex flex-col" v-if="showInfo">
        
        <!-- sorting -->
        <div v-if="option.sortParams" class="bg-gray-50 -mt-6 -mx-6 p-4 text-zinc-500 md:w-6/12">
          <a v-if="option.sortParams.up" class="hover:text-zinc-600" @click.prevent="sort('up')">Вверх <BaseIcon :path="mdiArrowUpBoldOutline" /></a>
          <a v-if="option.sortParams.down" class="hover:text-zinc-600" @click.prenent="sort('down')">Вниз <BaseIcon :path="mdiArrowDownBoldOutline" /></a>
        </div>
        <!-- end sorting -->
        
        <!-- Attachment a option to goods -->
        <div
          v-if="openedGoods && isRootOption"
          class="-mx-6 mb-2 md:w-6/12"
        >
          <DisplayErrors v-if="errorsAttachment" :errors="errorsAttachment" />
          <div
            v-if="isAttachedToOpenedGoods"
            class="bg-blue-100 p-4 text-blue-500"
          >
            <BaseIcon :path="mdiAttachmentCheck" />
            Опция прикреплена к товару {{ openedGoods.name }}
            <BaseButton
              color="danger"
              @click.prevent="attach(option.id, openedGoods.id, false)"
              :label="`Открепить от товара ${openedGoods.name}`"
              :loader="isLoaderAttachment"
              small
            />
          </div>
          <div v-else class="bg-green-100 p-4 text-green-500">
            <BaseIcon :path="mdiAttachment" />
            Опция готова к прикреплению
            <BaseButton
              color="success"
              @click.prevent="attach(option.id, openedGoods.id)"
              :label="`Прикрепить к товару ${openedGoods.name}`"
              :icon="mdiAttachment"
              :loader="isLoaderAttachment"
              small
            />
          </div>
        </div>
        <!-- End attachment a option to goods -->

        <PreviewImages :images="previews" />

        <template v-if="option.group">
          <div :class="titleClasses">Тип группы</div>
          <div :class="cellValClasses">{{ prepData.groupVariant }}</div>
        </template>
        <template v-if="option.description">
          <div :class="titleClasses">Описание</div>
          <div :class="cellValClasses">{{ option.description }}</div>
        </template>
        <div :class="titleClasses">Цена</div>
        <div :class="cellValClasses">{{ prepData.price }}</div>
        <div :class="titleClasses" v-if="option.note">Заметка</div>
        <div :class="cellValClasses" v-if="option.note">{{ option.note }}</div>
      </div>
    </transition>

    <GoodsOptionList
      v-if="option.childs?.length"
      :dataOptions="option.childs"
      :parentOption="option"
      is-recursive
    />
  </CardBox>
</template>
