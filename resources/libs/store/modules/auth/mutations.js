import router from "../../../router"
export default {
    login(state, token){
        sessionStorage.setItem("token", token)
        axios.defaults.headers.common.Authorization = 'Bearer '+sessionStorage.getItem('token')  
        state.is_auth = true
        router.push({name: 'customers'})
    },
    logout(state) {
        sessionStorage.removeItem("token")
        delete axios.defaults.headers.common["Authorization"]
        state.is_auth = false
        router.push({name: 'index'})
    }
}