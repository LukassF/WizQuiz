import { createStore } from "vuex";

// interface storeState {
//   showLogin: boolean;
//   showSignup: boolean;
//   showAside: boolean;
//   showModifyProfile: boolean;
//   tooltipParams: { x: number; y: number; show: boolean; content: string };
// }

export default createStore({
  state: {
    showLogin: false,
    showSignup: false,
    showAside: true,
    showQuizCreator: false,
    showModifyProfile: false,
    tooltipParams: { x: 0, y: 0, show: false, content: "" },
  },
  getters: {},
  mutations: {
    setShowLogin(state, value) {
      state.showSignup = false;
      state.showLogin = value;
    },

    setShowSignup(state, value) {
      state.showLogin = false;
      state.showSignup = value;
    },

    setShowAside(state, value) {
      if (value === undefined) state.showAside = !state.showAside;
      else state.showAside = value;
    },

    setShowModifyProfile(state, value) {
      state.showModifyProfile = value;
    },

    setTooltipParams(state, value) {
      state.tooltipParams = value;
    },

    setShowQuizCreator(state, value) {
      state.showQuizCreator = value;
    },
  },
  actions: {},
  modules: {},
});
