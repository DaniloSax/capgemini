<template>
  <q-page padding>
    <q-card class="bg-white">
      <q-card-section>
        <div class="row justify-between">
          <div class="column">
            <div class="text-h6">Extrato da conta</div>
            <div class="text-subtitle2">
              Acompange todas as transações
            </div>
          </div>

          <q-btn
            color="primary"
            icon="arrow_back"
            size="lg"
            flat
            @click="$router.push({ name: 'home' })"
          />
        </div>
      </q-card-section>

      <q-separator spaced inset />

      <q-card-section>
        <label>A partir do dia 01</label>
      </q-card-section>

      <q-card-section>
        <q-list>
          <q-item clickable v-ripple v-for="(item, i) in extracts" :key="i">
            <q-item-section :class="classType(item)">
              <div class="text-subtitle2">
                {{ item.operation }}
              </div>
              <div class="text-subtitle1">
                {{ formatDate(item.created_at) }}
              </div>
            </q-item-section>
            <q-item-section>
              <div class="text-subtitle2 text-weight-thin">
                De: {{ item.from.name }}
              </div>
              <div class="text-subtitle2 text-weight-thin">
                Para: {{ item.to.name }}
              </div>
            </q-item-section>
            <q-item-section>
              <div class="text-subtitle1">
                {{ item.value | money }}
              </div>
            </q-item-section>
          </q-item>
        </q-list>
      </q-card-section>
    </q-card>
  </q-page>
</template>

<script>
import { mapGetters } from 'vuex'
import { date } from 'quasar'

export default {
  async mounted () {
    await this.$store.dispatch('Extract/extracts')
  },

  computed: {
    ...mapGetters({
      extracts: 'Extract/extracts',
      auth: 'Auth/auth'
    })
  },

  methods: {
    formatDate (timeStamp) {
      return date.formatDate(timeStamp, 'DD/MM/YYYY')
    },

    classType (transaction) {
      const conditional =
        transaction.from.id === this.auth.id &&
        transaction.operation !== 'Depósito'

      if (conditional) {
        return 'text-negative'
      } else return 'text-positive'
    }
  }
}
</script>

<style></style>
