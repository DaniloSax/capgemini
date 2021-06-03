<template>
  <q-card class="shadow-0 card-hover q-mx-sm" @click="route">
    <q-card-section class="column align-center">
      <div class="text-h6 q-mb-sm">
        <q-icon :name="icon" size="md" />
      </div>
      <div class="text-subtitle2">{{ title }}</div>
    </q-card-section>
  </q-card>
</template>

<script>
export default {
  name: 'CardTransaction',
  props: {
    title: String,
    icon: String,
    linkName: String
  },

  methods: {
    route () {
      this.$router.push({ name: this.linkName })
    }
  }
}
</script>

<style lang="scss" scoped>
.card-hover:hover {
  background-color: rgb(206, 200, 200);
  cursor: pointer;
  border-bottom: 2px solid $blue;
}
</style>
