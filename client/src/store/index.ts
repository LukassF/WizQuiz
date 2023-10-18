import { createStore } from 'vuex'

export default createStore({
  state:{
  
      showLogin:false,
      showSignup:false,
      showAside:true,
  },
  getters: {
  },
  mutations: {
    setShowLogin(state,value){
      state.showSignup = false
      state.showLogin = value
    },

    setShowSignup(state,value){
      state.showLogin = false
      state.showSignup = value
    },

    setShowAside(state){
      state.showAside = !state.showAside
    }
  },
  actions: {
  },
  modules: {
  }
})
