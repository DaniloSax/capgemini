<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated class="text-black">
      <q-toolbar class="bg-header">
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />

        <q-toolbar-title>
          <div class="q-pt-sm">
            <img src="../assets/logo.svg" alt="logo" />
          </div>
        </q-toolbar-title>

        <UserDropdown />
      </q-toolbar>

      <Balance />
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
      content-class="bg-grey-1"
    >
      <q-list>
        <q-item-label header class="text-grey-8">
          Essential Links
        </q-item-label>
        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container class="background-theme">
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import EssentialLink from 'components/EssentialLink'
import UserDropdown from './UserDropdown'
import Balance from '../components/Balance'

const linksData = [
  {
    title: 'Docs',
    caption: 'quasar.dev',
    icon: 'school',
    link: 'https://quasar.dev'
  }
]

export default {
  name: 'MainLayout',
  components: { EssentialLink, UserDropdown, Balance },
  data () {
    return {
      leftDrawerOpen: false,
      essentialLinks: linksData
    }
  }
}
</script>

<style scoped>
.bg-header {
  background-color: white;
}

.background-theme {
  background: #c9d6ff;
  background: -webkit-linear-gradient(to right, #e2e2e2, #c9d6ff);
  background: linear-gradient(to right, #e2e2e2, #c9d6ff);
}
</style>
