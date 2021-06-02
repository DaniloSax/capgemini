/*
export function someAction (context) {
}
*/
import axios from 'axios'
import { Cookies } from 'quasar'

export function csrfToken () {
  return axios.get('http://localhost:8000/api/csrf-cookie')
}

export function login ({ commit, dispatch }, credentials) {
  return new Promise((resolve, reject) => {
    // dispatch('csrfToken')
    axios
      .post('login', credentials)
      .then(resp => {
        commit('SET_AUTH', resp.data)
        Cookies.set('token', resp.data.token, {
          sameSite: 'Lax'
        })
        return resolve(resp)
      })
      .catch(error => {
        return reject(error)
      })
  })
}

export function logout ({ commit }) {
  return new Promise((resolve, reject) => {
    axios
      .post('logout', [], {
        headers: {
          Authorization: `Bearer ${Cookies.get('token')}`
        }
      })
      .then(resp => {
        Cookies.remove('token')
        return resolve(resp)
      })
      .catch(error => {
        return reject(error)
      })
  })
}
