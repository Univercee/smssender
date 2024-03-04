import getters from './getters'
import mutations from './mutations'
import actions from './actions'

export default {
  namespaced: true,
  state: {
    message: null,
    type: "error"|"success"|null
  },
  getters,
  mutations,
  actions
}