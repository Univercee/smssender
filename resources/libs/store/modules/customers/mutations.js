export default {
    set(state, customers) {   
        state.customers = customers
    },
    delete(state, id) {   
        state.customers = state.customers.filter((customer)=> customer.id != id)
    },
    add(state, customer) {   
        state.customers.push(customer)
    },
    update(state, data){
        objIndex = state.customers.findIndex(obj => obj.id == data.id)
        state.customers[objIndex] = data
    }
}