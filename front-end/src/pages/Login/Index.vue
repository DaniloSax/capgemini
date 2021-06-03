<template>
  <q-layout row wrap>
    <q-page-container class="background-theme">
      <q-page padding>
        <div class="fixed-center">
          <q-card class="rounded border-top " style="width: 700px">
            <q-card-section>
              <div class="text-h6">Entrar</div>
              <div class="text-subtitle2">Qual sua agência e conta ?</div>
            </q-card-section>
            <q-card-section>
              <q-form @submit="onSubmit" class="q-gutter-md">
                <div class="row ">
                  <div class="col-12">
                    <q-input
                      v-model="agency"
                      type="text"
                      label="Agência"
                      :rules="[value => !!value || 'Campo Obrigatório']"
                      clearable
                    />
                  </div>
                </div>

                <div class="row ">
                  <div class="col-12">
                    <q-input
                      v-model="account"
                      type="text"
                      label="Conta"
                      :rules="[value => !!value || 'Campo Obrigatório']"
                      clearable
                    />
                  </div>
                </div>

                <div class="row ">
                  <div class="col-12">
                    <q-input
                      v-model="password"
                      type="password"
                      label="Senha"
                      :rules="[value => !!value || 'Campo Obrigatório']"
                      clearable
                    />
                  </div>
                </div>

                <div>
                  <q-btn
                    label="Entrar"
                    type="submit"
                    color="blue"
                    class="full-width"
                    :loading="loading"
                  />
                </div>
              </q-form>
            </q-card-section>
          </q-card>
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>
export default {
  data: () => ({
    agency: '250',
    account: '2100460',
    password: 'danilo123',
    loading: false
  }),
  methods: {
    async onSubmit () {
      this.loading = true

      const credentials = {
        agency: this.agency,
        account: this.account,
        password: this.password
      }

      try {
        await this.$store.dispatch('Auth/login', credentials)
        this.$router.replace({ name: 'home' })
      } catch (error) {
        console.error(error)
      } finally {
        this.loading = false
      }
    }
  }
}
</script>

<style lang="scss">
.background-theme {
  background: #c9d6ff;
  background: -webkit-linear-gradient(to right, #e2e2e2, #c9d6ff);
  background: linear-gradient(to right, #e2e2e2, #c9d6ff);
}

.border-top {
  border-top: 4px solid $blue;
}
</style>
