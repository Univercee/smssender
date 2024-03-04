export default {
    customers: (state) => {
        return state.customers
    },
    customerById: (state, id) => {
        const filteredArray = state.customers.filter(customer=>{customer.id == id})
        if(filteredArray.length){
            return filteredArray[0]
        }
        return null
    }
}