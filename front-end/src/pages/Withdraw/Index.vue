<template>
  <q-page padding>
    <q-card class="bg-white">
      <q-card-section>
        <div class="row justify-between">
          <div class="column">
            <div class="text-h6">Sacar</div>
            <div class="text-subtitle2">
              Preencha os campos necessários para saque
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
      <q-card-section>
        <q-form @submit="onSubmit" class="q-gutter-md">
          <div class="row">
            <div class="col-12">
              <q-field filled v-model="value" label="Valor">
                <template
                  v-slot:control="{ id, floatingLabel, value, emitValue }"
                >
                  <money
                    :id="id"
                    class="q-field__input text-right"
                    :value="value"
                    @input="emitValue"
                    v-show="floatingLabel"
                  />
                </template>

                <template v-slot:prepend>
                  <span>R$</span>
                </template>
              </q-field>
            </div>
          </div>

          <div>
            <q-btn
              label="Sacar"
              type="submit"
              color="primary"
              class="full-width"
            />
          </div>
        </q-form>
      </q-card-section>
    </q-card>
  </q-page>
</template>

<script>
export default {
  data: () => ({
    value: ''
  }),

  methods: {
    onSubmit () {
      this.$store.dispatch('Account/withDraw', { value: this.value })
    }
  }
}
</script>

<style></style>
