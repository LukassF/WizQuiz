import { createStore } from 'vuex'

export default createStore({
  state:{
  
      showLogin:false,
      showSignup:false,
      showAside:true,
      showModifyProfile:false,
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
    },

    setShowModifyProfile(state,value){
      state.showModifyProfile = value
    }
  },
  actions: {
  },
  modules: {
  }
})
