export default {
    FETCH_ALL(context) {
        return new Promise((resolve, reject)=>{
            axios.get('/api/customers/')
            .then((response)=>{
                context.commit("set", response.data)
                resolve(response.data)
            })
            .catch((err)=>{
                reject(err)
            })
        })
    },
    FETCH(context, id) {
        return new Promise((resolve, reject)=>{
            axios.get('/api/customers/'+id)
            .then((response)=>{
                resolve(response.data)
            })
            .catch((err)=>{
                reject(err)
            })
        })
    },
    CREATE(context, data) {
        return new Promise((resolve, reject)=>{
            axios.post(
                '/api/customers/',
                data
            )
            .then((response)=>{
                const id = {
                    id: response.data.id
                }
                const customer = {...data, id}
                context.commit("add", customer)
                context.commit("notification/notifyMessage", response.data.message, { root: true })
                resolve(response.data)
            })
            .catch((err)=>{
                context.commit("notification/notifyError", err.data.message, { root: true })
                reject(err)
            })
        })
    },
    UPDATE(context, data) {
        return new Promise((resolve, reject)=>{
            axios.patch(
            '/api/customers/'+data.id,
            data
            )
            .then((response)=>{
                context.commit("update", data)
                context.commit("notification/notifyMessage", response.data.message, { root: true })
                resolve(true)
            })
            .catch((err)=>{
                context.commit("notification/notifyError", err.data.message, { root: true })
                context.dispatch('FETCH_ALL')
                reject(err)
            })
        })
    },
    DELETE(context, id) {
        console.log('delete action');
        return new Promise((resolve, reject)=>{
            axios.delete('/api/customers/'+id)
            .then((response)=>{
                context.commit("delete", id)
                context.commit("notification/notifyMessage", response.data.message, { root: true })
                resolve(true)
            })
            .catch((err)=>{
                context.commit("notification/notifyError", err.data.message, { root: true })
                reject(err)
            })
        })
    }
}