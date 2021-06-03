<template>
  <div style="height: 50px;" class="border-top bg-blue">
    <div class="row align-center bg-blue-4" style="width: 100%; height: 100%">
      <div class="row justify-around q-py-xs ">
        <div class="q-mx-md column text-white">
          <label for="">Conta</label>

          <q-spinner
            v-if="!account.balance"
            color="yellow"
            size="1rem"
            :thickness="2"
          />
          <span v-else> <b>Ag</b> {{ account.agency }} <b>Cc</b> {{ account.account }} </span>
        </div>

        <q-separator spaced inset vertical dark />
        <div class="q-mx-md column text-white">
          <label for="">Saldo disponível</label>

          <q-spinner
            v-if="!account.balance"
            color="yellow"
            size="1rem"
            :thickness="2"
          />
          <span v-else>
            {{ account.balance | money }}
          </span>
        </div>
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
