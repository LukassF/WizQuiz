import { createStore } from "vuex";
import axios from "axios";
const BACKEND_URL = "http://localhost/website/api/index.php";

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

    signUp() {},

    logIn() {},
  },
  actions: {
    async SIGN_UP({ commit }, args: signupArgs) {
      const response = await axios.post(
        `${BACKEND_URL}?request=signup&method=insertUser`,
        {
          body: args,
        }
      );

      commit("signUp");

      return response.data;
    },

    async LOG_IN({ commit }, args: loginArgs) {
      const response = await axios.post(
        `${BACKEND_URL}?request=login&method=logInUser`,
        {
          body: args,
        }
      );

      console.log(response);
      commit("logIn");

      return response.data;
    },
  },
  modules: {},
});
