import cutomers from "./modules/cutomers"
import auth from "./modules/auth"
import { createStore } from "vuex"

//TODO: update function in lumen return false if data doesn't change. It leads to incorrect frontend work
export default createStore({
  modules: {
    cutomers,
    auth
  },
})