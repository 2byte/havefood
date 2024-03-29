<script setup>
import { computed, ref, onMounted } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'
import { useMainStore } from '@/admin/stores/main'
import {
  mdiAccountMultiple,
  mdiCartOutline,
  mdiChartTimelineVariant,
  mdiFinance,
  mdiMonitorCellphone,
  mdiReload,
  mdiGithub,
  mdiChartPie,
  mdiPlus
} from '@mdi/js'
import * as chartConfig from '@/admin/components/Charts/chart.config.js'
import LineChart from '@/admin/components/Charts/LineChart.vue'
import SectionMain from '@/admin/components/SectionMain.vue'
import SectionTitleBar from '@/admin/components/SectionTitleBar.vue'
import SectionHeroBar from '@/admin/components/SectionHeroBar.vue'
import CardBoxWidget from '@/admin/components/CardBoxWidget.vue'
import CardBox from '@/admin/components/CardBox.vue'
import TableSampleClients from '@/admin/components/TableSampleClients.vue'
import NotificationBar from '@/admin/components/NotificationBar.vue'
import BaseButton from '@/admin/components/BaseButton.vue'
import CardBoxTransaction from '@/admin/components/CardBoxTransaction.vue'
import CardBoxClient from '@/admin/components/CardBoxClient.vue'
import SectionTitleBarSub from '@/admin/components/SectionTitleBarSub.vue'
import GoodsForm from '@/admin/Goods/GoodsForm.vue'
import LayoutAuthenticated from '@/admin/layouts/LayoutAuthenticated.vue'

const titleStack = ref(['Admin', 'Dashboard'])

const chartData = ref(null)

const fillChartData = () => {
  chartData.value = chartConfig.sampleChartData()
}

onMounted(() => {
  fillChartData()
})

const mainStore = useMainStore()

const clientBarItems = computed(() => mainStore.clients.slice(0, 3))

const transactionBarItems = computed(() => mainStore.history.slice(0, 3))

const showGoodsForm = ref(false)
</script>
<script>
    export default {
        layout: LayoutAuthenticated
    }
</script>

<template>
    <Head title="Админ панель" />
    <SectionTitleBar :title-stack="titleStack" />
    <SectionHeroBar>Админ панель</SectionHeroBar>
    <SectionMain>
      
      <CardBox title="Что сделать?">
        <GoodsForm v-if="showGoodsForm" button-close-form @closeForm="showGoodsForm = false"/>
        <BaseButton v-if="!showGoodsForm" label="Создать товар" :icon="mdiPlus" color="success" @click="showGoodsForm = !showGoodsForm"/>
      </CardBox>
      
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
        <CardBoxWidget
          trend="12%"
          trend-type="up"
          color="text-emerald-500"
          :icon="mdiAccountMultiple"
          :number="512"
          label="Клиенты"
        />
        <CardBoxWidget
          trend="12%"
          trend-type="down"
          color="text-blue-500"
          :icon="mdiCartOutline"
          :number="7770"
          prefix="$"
          label="Продажи"
        />
        <CardBoxWidget
          trend="Перевыполнен"
          trend-type="alert"
          color="text-red-500"
          :icon="mdiChartTimelineVariant"
          :number="256"
          suffix="%"
          label="Показатель месяца"
        />
      </div>

      <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-6">
        <div class="flex flex-col justify-between">
          <CardBoxTransaction
            v-for="(transaction,index) in transactionBarItems"
            :key="index"
            :amount="transaction.amount"
            :date="transaction.date"
            :business="transaction.business"
            :type="transaction.type"
            :name="transaction.name"
            :account="transaction.account"
          />
        </div>
        <div class="flex flex-col justify-between">
          <CardBoxClient
            v-for="client in clientBarItems"
            :key="client.id"
            :name="client.name"
            :login="client.login"
            :date="client.created"
            :progress="client.progress"
          />
        </div>
      </div>

      <SectionTitleBarSub
        :icon="mdiChartPie"
        title="График активности продаж"
      />

      <CardBox
        title="Продажи"
        :icon="mdiFinance"
        :header-icon="mdiReload"
        class="mb-6"
        @header-icon-click="fillChartData"
      >
        <div v-if="chartData">
          <line-chart
            :data="chartData"
            class="h-96"
          />
        </div>
      </CardBox>

      <SectionTitleBarSub
        :icon="mdiAccountMultiple"
        title="Clients"
      />

      <NotificationBar
        color="info"
        :icon="mdiMonitorCellphone"
      >
        <b>Responsive table.</b> Collapses on mobile
      </NotificationBar>

      <CardBox
        :icon="mdiMonitorCellphone"
        title="Responsive table"
        has-table
      >
        <TableSampleClients />
      </CardBox>
    </SectionMain>
</template>
