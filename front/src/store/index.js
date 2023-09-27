import { createStore } from 'vuex'

export default createStore({
  state: {
    logged: false,
  },
  getters: {
  },
  mutations: {
    changeLogged(state, data) {
      state.logged = data;
    },
  },
  actions: {
    changeLogged( {commit}, data) {
      commit('changeLogged', data);
    },
  },
  modules: {
  }
})
