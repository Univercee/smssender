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
                resolve(response.data)
            })
            .catch((err)=>{
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
                resolve(true)
            })
            .catch((err)=>{
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
                resolve(true)
            })
            .catch((err)=>{
                reject(err)
            })
        })
    }
}