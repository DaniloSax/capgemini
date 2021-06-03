<template>
  <div style="height: 50px;" class="border-top bg-blue">
    <div class="row align-center bg-blue-4" style="width: 17%; height: 100%">
      <div class="col-12 q-ml-md q-py-xs column text-white">
        <label for="">Saldo disponível</label>
        <span>{{ 500.0 | money }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  filters: {
    money (value) {
      return Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
      }).format(value)
    }
  }
}
</script>

<style scoped>
.border-top {
  border-top: 3px solid yellow;
}
</style>
