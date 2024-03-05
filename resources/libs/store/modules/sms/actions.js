export default {
  SEND_SMS(context, data) {
    return new Promise((resolve, reject)=>{
      axios.post('/api/sms/send', data)
        .then((response)=>{
          context.commit("notification/notifyMessage", response.data.message, { root: true })
          context.dispatch('FETCH_BALANCE');
          resolve(true)
        })
        .catch((err)=>{
          context.commit("notification/notifyError", err.data.message, { root: true })
          reject(false)
        })
    })
  },
  SEND_ALL_SMS(context) {
    return new Promise((resolve, reject)=>{
      axios.post('/api/sms/send-all')
        .then((response)=>{
          context.commit("notification/notifyMessage", response.data.message, { root: true })
          context.dispatch('FETCH_BALANCE');
          resolve(true)
        })
        .catch((err)=>{
          context.commit("notification/notifyError", err.data.message, { root: true })
          reject(false)
        })
    })
  },
  FETCH_BALANCE(context) {
    return new Promise((resolve, reject)=>{
      axios.get('/api/sms/balance')
        .then((response)=>{
          let balance = response.data.balance
          context.commit('setBalance', balance)
          resolve(true)
        })
        .catch((err)=>{
          reject(false)
        })
    })
  },
}