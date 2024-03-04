import customers from "./modules/customers"
import auth from "./modules/auth"
import notification from "./modules/notification"
import sms from "./modules/sms"
import { createStore } from "vuex"

//TODO: update function in lumen return false if data doesn't change. It leads to incorrect frontend work
export default createStore({
  modules: {
    sms,
    customers,
    auth,
    notification
  },
})