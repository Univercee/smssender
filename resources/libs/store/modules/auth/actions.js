export default {
  CHECK_AUTH(context) {
    return new Promise((resolve, reject)=>{
      let token = sessionStorage.getItem('token')
      axios.get('/api/auth/check', token)
        .then((response)=>{
          context.commit("login", token)
          resolve(true)
        })
        .catch((err)=>{
          context.commit("logout")
          reject(false)
        })
    })
  },
  LOGIN(context, data) {
    return new Promise((resolve, reject)=>{
      axios.post('/api/auth/login', data)
        .then((response)=>{
          let token = response.data.token
          context.commit("login", token)
          resolve(true)
        })
        .catch((err)=>{
          context.commit("logout")
          reject(err)
        })
    })
  },
  LOGOUT(context) {
    return new Promise((resolve, reject)=>{
      axios.get('/api/auth/logout')
        .then((response)=>{
          context.commit("logout")
          resolve(true)
        })
        .catch((err)=>{
          reject(err)
        })
    })
  },
}