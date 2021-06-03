/*
export function someAction (context) {
}
*/
import axios from 'axios'
import { Cookies } from 'quasar'

export function login ({ commit, dispatch }, credentials) {
  return new Promise((resolve, reject) => {
    axios
      .post('login', credentials)
      .then(resp => {
        commit('SET_AUTH', resp.data)
        Cookies.set('api_token', resp.data.token, {
          sameSite: 'Lax'
        })
        return resolve(resp)
      })
      .catch(error => {
        return reject(error)
      })
  })
}

export function logout () {
  return new Promise((resolve, reject) => {
    axios
      .post('logout', [], {
        headers: {
          Authorization: `Bearer ${Cookies.get('api_token')}`
        }
      })
      .then(resp => {
        Cookies.remove('api_token')
        return resolve(resp)
      })
      .catch(error => {
        return reject(error)
      })
  })
}

export function auth ({ commit }) {
  return new Promise((resolve, reject) => {
    axios.get('auth', {
      headers: {
        Authorization: `Bearer ${Cookies.get('api_token')}`
      }
    })
      .then(resp => {
        commit('SET_AUTH', resp.data)
        return resolve(resp.data)
      })
      .catch(error => reject(error))
  })
}
