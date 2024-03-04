import getters from './getters'
import mutations from './mutations'
import actions from './actions'

export default {
  namespaced: true,
  user: {
    id: null
  },
  getters,
  mutations,
  actions
}