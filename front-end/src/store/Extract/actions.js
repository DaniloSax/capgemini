import axios from 'axios'
import { Cookies } from 'quasar'

export function extracts ({ commit }) {
  return new Promise((resolve, reject) => {
    axios.get('extracts', {
      headers: {
        Authorization: `Bearer ${Cookies.get('api_token')}`
      }
    })
      .then(resp => {
        commit('SET_EXTRACTS', resp.data)
        return resolve(resp.data)
      })
      .catch(error => reject(error))
  })
}
