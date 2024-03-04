export default {
    notifyMessage(state, message){
        state.message = message
        state.type = "message"
    },
    notifyError(state, message){
        state.message = message
        state.type = "error"
    },
    clear(state){
        state.message = null
        state.type = null
    }
}