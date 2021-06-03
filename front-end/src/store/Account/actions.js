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

export function withDraw ({ dispatch }) {
  return new Promise((resolve, reject) => {
    axios.get('account', {
      headers: {
        Authorization: `Bearer ${Cookies.get('api_token')}`
      }
    })
      .then(resp => {
        return resolve(resp.data)
      })
      .catch(error => reject(error))
  })
}
