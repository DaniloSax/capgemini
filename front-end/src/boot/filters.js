
export default async ({ Vue }) => {
  Vue.filter('money', function (value) {
    if (!value || value === 0) return 0
    return Intl.NumberFormat('pt-BR', {
      style: 'currency',
      currency: 'BRL'
    }).format(value)
  })
}
