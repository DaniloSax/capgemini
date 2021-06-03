import Vue from 'vue'
import Vuex from 'vuex'

// import example from './module-example'
import Auth from './Auth'
import Account from './Account'
import Extract from './Extract'
import Transaction from './Transaction'

Vue.use(Vuex)

/*
 * If not building with SSR mode, you can
 * directly export the Store instantiation;
 *
 * The function below can be async too; either use
 * async/await or return a Promise which resolves
 * with the Store instance.
 */

export default function (/* { ssrContext } */) {
  const Store = new Vuex.Store({
    modules: {
      // example
      Auth,
      Account,
      Extract,
      Transaction
    },

    // enable strict mode (adds overhead!)
    // for dev mode only
    strict: process.env.DEBUGGING
  })

  return Store
}
