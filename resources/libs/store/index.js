import customers from "./modules/customers"
import auth from "./modules/auth"
import notification from "./modules/notification"
import { createStore } from "vuex"

//TODO: update function in lumen return false if data doesn't change. It leads to incorrect frontend work
export default createStore({
  modules: {
    customers,
    auth,
    notification
  },
})