<template>
  <div style="height: 50px;" class="border-top bg-blue">
    <div class="row align-center bg-blue-4" style="width: 17%; height: 100%">
      <div class="col-12 q-ml-md q-py-xs column text-white">
        <label for="">Saldo disponível</label>

        <q-spinner
          v-if="!account.balance"
          color="primary"
          size="1rem"
          :thickness="2"
        />
        <span v-else>
          {{ account.balance | money }}
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  async mounted () {
    await this.$store.dispatch('Account/getBalance')
  },

  filters: {
    money (value) {
      return Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
      }).format(value)
    }
  },

  computed: {
    ...mapGetters({
      account: 'Account/account'
    })
  }
}
</script>

<style scoped>
.border-top {
  border-top: 3px solid yellow;
}
</style>
