/*
export function someAction (context) {
}
*/
import axios from 'axios'

export function csrfToken () {
  return axios.get('http://localhost:8000/api/csrf-cookie')
}

export function login ({ commit, dispatch }, credentials) {
  return new Promise((resolve, reject) => {
    dispatch('csrfToken')
    axios
      .post('login', credentials)
      .then(resp => {
        commit('SET_AUTH', resp.data)
        console.log(resp.data)
        return resolve(resp)
      })
      .catch(error => {
        return reject(error)
      })
  })
}

// export logout()
