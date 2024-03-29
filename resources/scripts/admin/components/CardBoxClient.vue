<script setup>
import { computed } from 'vue'
import { mdiTrendingDown, mdiTrendingUp, mdiTrendingNeutral } from '@mdi/js'
import CardBox from '@/admin/components/CardBox.vue'
import BaseLevel from '@/admin/components/BaseLevel.vue'
import PillTag from '@/admin/components/PillTag.vue'
import UserAvatar from '@/admin/components/UserAvatar.vue'

const props = defineProps({
  name: {
    type: String,
    required: true
  },
  login: {
    type: String,
    required: true
  },
  date: {
    type: String,
    required: true
  },
  progress: {
    type: Number,
    default: 0
  },
  text: {
    type: String,
    default: null
  },
  type: {
    type: String,
    default: null
  }
})

const pillType = computed(() => {
  if (props.type) {
    return props.type
  }

  if (props.progress) {
    if (props.progress >= 60) {
      return 'success'
    }
    if (props.progress >= 40) {
      return 'warning'
    }

    return 'danger'
  }

  return 'info'
})

const pillIcon = computed(() => {
  return {
    success: mdiTrendingUp,
    warning: mdiTrendingNeutral,
    danger: mdiTrendingDown,
    info: null
  }[pillType.value]
})

const pillText = computed(() => props.text ?? `${props.progress}%`)
</script>

<template>
  <CardBox
    class="mb-6 last:mb-0"
    hoverable
  >
    <BaseLevel>
      <BaseLevel type="justify-start">
        <UserAvatar
          class="w-12 h-12 md:mr-6"
          :username="name"
        />
        <div class="text-center md:text-left">
          <h4 class="text-xl">
            {{ name }} <span class="text-gray-500 dark:text-gray-400">@{{ login }}</span>
          </h4>
          <p class="text-gray-500 dark:text-gray-400">
            {{ date }}
          </p>
        </div>
      </BaseLevel>
      <PillTag
        :type="pillType"
        :text="pillText"
        :icon="pillIcon"
      />
    </BaseLevel>
  </CardBox>
</template>
