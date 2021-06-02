/*
export function someAction (context) {
}
*/
import axios from 'axios'

export function login () {
  return new Promise((resolve, reject) => {
    axios.get('http://localhost:8000/sanctum/csrf-cookie').then(response => {
      return resolve(response)
    })
  })
}
