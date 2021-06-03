<template>
  <q-page padding>
    <q-card class="bg-white">
      <q-card-section>
        <div class="row justify-between">
          <div class="column">
            <div class="text-h6">Transferência</div>
            <div class="text-subtitle2">
              Dados de destino
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
        <q-form @submit="onSubmit" class="">
          <div class="row q-col-gutter-md">
            <div class="col-12">
              <q-input v-model="bank" type="text" label="Banco" readonly />
            </div>

            <div class="col-12">
              <q-input
                v-model="accountType"
                type="text"
                label="Tipo da conta"
                readonly
              />
            </div>

            <div class="col-12">
              <q-input
                v-model="agency"
                type="text"
                label="Agência"
                :rules="[value => !!value || 'Campo Obrigatório']"
                clearable
              />
            </div>

            <div class="col-12">
              <q-input
                v-model="account"
                type="text"
                label="Conta"
                clearable
                :rules="[value => !!value || 'Campo Obrigatório']"
              />
            </div>

            <div class="col-12">
              <q-field
                filled
                v-model="value"
                label="Valor"
                :rules="[value => !!value || 'Campo Obrigatório']"
              >
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

          <div class="q-mt-md">
            <q-btn
              label="Transferir"
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
    value: '',
    bank: 'Banco Capgemini',
    accountType: 'Conta Corrente',
    agency: '',
    account: ''
  }),

  methods: {
    onSubmit () {
      console.log('sacando dinheiro')
    }
  }
}
</script>

<style></style>
