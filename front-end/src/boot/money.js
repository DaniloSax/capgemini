// import something here
import money from 'v-money'

// "async" is optional;
// more info on params: https://quasar.dev/quasar-cli/boot-files
export default async ({ Vue }) => {
  Vue.use(money, {
    decimal: ',',
    thousands: '.',
    prefix: 'R$ ',
    precision: 2,
    masked: true
  })
}
