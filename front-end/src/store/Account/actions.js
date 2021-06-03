/*
export function someAction (context) {
}
*/
import axios from 'axios'
import { Cookies } from 'quasar'

export function getBalance ({ commit }) {
  return new Promise((resolve, reject) => {
    axios.get('account', {
      headers: {
        Authorization: `Bearer ${Cookies.get('api_token')}`
      }
    })
      .then(resp => {
        commit('SET_ACCOUNT', resp.data)
        return resolve(resp.data)
      })
      .catch(error => reject(error))
  })
}

export function withDraw ({ getters, commit }, value) {
  return new Promise((resolve, reject) => {
    axios.put(`account/${getters.account.id}`, value, {
      headers: {
        Authorization: `Bearer ${Cookies.get('api_token')}`
      }
    })
      .then(resp => {
        commit('SET_ACCOUNT', resp.data)
        return resolve(resp.data)
      })
      .catch(error => reject(error))
  })
}

export function deposit ({ commit }, transaction) {
  return new Promise((resolve, reject) => {
    axios.post('account/deposit', transaction, {
      headers: {
        Authorization: `Bearer ${Cookies.get('api_token')}`
      }
    })
      .then(resp => {
        commit('SET_ACCOUNT', resp.data)
        return resolve(resp.data)
      })
      .catch(error => reject(error))
  })
}

export function transfer ({ getters, dispatch }, transaction) {
  return new Promise((resolve, reject) => {
    axios.post(`account/${getters.account.id}/transfer`, transaction, {
      headers: {
        Authorization: `Bearer ${Cookies.get('api_token')}`
      }
    })
      .then(resp => {
        dispatch('getBalance')
        return resolve(resp.data)
      })
      .catch(error => reject(error))
  })
}
