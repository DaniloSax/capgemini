<template>
  <q-btn-dropdown stretch flat>
    <template v-slot:label>
      <div class="row items-center no-wrap">
        <q-icon left name="account_circle" />
        <div class="text-center">{{ auth ? auth.name : 'username' }}</div>
      </div>
    </template>

    <q-list style="min-width: 100px">
      <q-item>
        <q-item-section>
          <div>
            {{ auth ? auth.name : 'username' }}
            <br />
            <strong>Administrador</strong>
          </div>
        </q-item-section>
      </q-item>

      <q-separator />

      <q-item>
        <q-item-section>
          <span class="text-overline">Notificações:</span>
          <div>
            lista de Notificações aqui
          </div>
        </q-item-section>
      </q-item>

      <q-separator />

      <q-item clickable style="color: green;" @click="() => {}">
        <q-item-section avatar>
          <q-icon name="account_circle" />
        </q-item-section>
        <q-item-section>
          Perfil
        </q-item-section>
      </q-item>

      <q-item clickable style="color: red;" @click="logout">
        <q-item-section avatar>
          <q-icon name="login" />
        </q-item-section>
        <q-item-section>Sair</q-item-section>
      </q-item>
    </q-list>
  </q-btn-dropdown>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  mounted () {
    this.$store.dispatch('Auth/auth')
  },

  methods: {
    async logout () {
      const resp = await this.$store.dispatch('Auth/logout')
      console.log(resp)
      this.$router.replace({ name: 'login' })
    }
  },

  computed: {
    ...mapGetters({
      auth: 'Auth/auth'
    })
  }
}
</script>

<style></style>
