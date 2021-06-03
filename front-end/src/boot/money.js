import money from 'v-money'

export default async ({ Vue }) => {
  Vue.use(money, {
    decimal: ',',
    thousands: '.',
    prefix: 'R$ ',
    precision: 2,
    masked: true
  })
}
