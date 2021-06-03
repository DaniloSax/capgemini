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
          <q-item clickable v-ripple>
            <q-item-section avatar>
              <q-icon color="primary" name="bluetooth" />
            </q-item-section>
            <q-item-section>Icon as avatar</q-item-section>
          </q-item>
        </q-list>
      </q-card-section>
    </q-card>
  </q-page>
</template>

<script>
export default {}
</script>

<style></style>
