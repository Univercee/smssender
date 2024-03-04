import cutomers from "./modules/cutomers"
import { createStore } from "vuex"

//TODO: update function in lumen return false if data doesn't change. It leads to incorrect frontend work
export default createStore({
  modules: {
    cutomers
  },
})