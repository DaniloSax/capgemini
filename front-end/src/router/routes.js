const routes = [
  {
    path: '/login',
    name: 'login',
    component: () => import('pages/Login/Index')
  },

  {
    path: '/',

    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'home', component: () => import('pages/Index.vue') },
      { path: '/Deposit', name: 'Deposit', component: () => import('pages/Deposit/Index.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
