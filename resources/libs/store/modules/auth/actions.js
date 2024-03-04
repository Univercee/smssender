export default {
    LOGIN(context) {
        return new Promise((resolve, reject)=>{
          axios.get('/api/tasks/')
            .then((response)=>{
              context.commit("set", response.data)
              resolve(response.data)
            })
            .catch((err)=>{
              reject(err)
            })
        })
      },
}