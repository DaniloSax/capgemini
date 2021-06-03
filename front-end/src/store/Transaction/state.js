export default function () {
  return {
    transactions: [
      {
        title: 'Início',
        icon: 'fas fa-house-user',
        linkName: 'home'
      },
      {
        title: 'Extratos',
        icon: 'fas fa-file-invoice-dollar',
        linkName: 'Extract'
      },
      {
        title: 'Transferências',
        icon: 'fas fa-exchange-alt',
        linkName: 'Transfer'
      },
      {
        title: 'Depósitar',
        icon: 'fas fa-hand-holding-usd',
        linkName: 'Deposit'
      },
      {
        title: 'Sacar',
        icon: 'far fa-money-bill-alt',
        linkName: 'Withdraw'
      }
    ]
  }
}
