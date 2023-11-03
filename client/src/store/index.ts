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

    isAuthenticated: false,
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

    setIsAuthenticated(state, value) {
      state.isAuthenticated = value;
    },
  },
  actions: {
    async SIGN_UP({ commit }, args: signupArgs) {
      try {
        const response = await axios.post(
          `${BACKEND_URL}?request=signup&method=insertUser`,
          {
            body: args,
          }
        );

        commit("signUp");

        return response.data;
      } catch (err: any) {
        console.log(err);
      }
    },

    async LOG_IN({ commit }, args: loginArgs) {
      try {
        const response = await axios.post(
          `${BACKEND_URL}?request=login&method=logInUser`,
          {
            body: args,
          }
        );

        commit("logIn");
        console.log(response.data);

        return response.data;
      } catch (err: any) {
        console.log(err);
      }
    },

    async SET_AUTHENTICATED({ commit }, token) {
      try {
        const result = await axios.post(
          `${BACKEND_URL}?request=auth&method=checkToken`,
          {
            body: token,
          }
        );

        if (!result.data) window.localStorage.removeItem("current_user");

        commit("setIsAuthenticated", result.data);
      } catch (err: any) {
        console.log(err);
      }
    },
  },
  modules: {},
});
