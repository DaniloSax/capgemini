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
import { mapGetters } from 'vuex'

export default {
  name: 'PageIndex',

  components: { CardTransaction },

  computed: {
    ...mapGetters({
      transactions: 'Transaction/transactions'
    })
  }
}
</script>
