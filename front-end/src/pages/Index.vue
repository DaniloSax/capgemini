<template>
  <q-page class="flex q-py-xl q-px-xl">
    <div v-for="(item, index) in transactions" :key="index">
      <CardTransaction
        :title="item.title"
        :icon="item.icon"
        :link-name="item.linkName"
      />
    </div>
  </q-page>
</template>

<script>
import CardTransaction from '../components/CardTransaction'

export default {
  name: 'PageIndex',

  data: () => ({
    transactions: [
      {
        title: 'Extratos',
        icon: 'fas fa-file-invoice-dollar',
        linkName: 'Extract'
      },
      {
        title: 'Transferências',
        icon: 'fas fa-exchange-alt',
        linkName: 'Transfer'
      },
      {
        title: 'Depósitar',
        icon: 'fas fa-hand-holding-usd',
        linkName: 'Deposit'
      },
      {
        title: 'Sacar',
        icon: 'far fa-money-bill-alt',
        linkName: 'Withdraw'
      }
    ]
  }),

  components: { CardTransaction }
}
</script>
