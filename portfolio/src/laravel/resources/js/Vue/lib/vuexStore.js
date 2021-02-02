
import Vuex from 'vuex'
window.Vue = require('vue').default;

window.Vue.use(Vuex)

const opt = {
  state: {
    isLoading: true,
    transitionStyle: "slide-x-reverse-transition",
    lazyOptions: {
      threshold: 1.0
    },
  },
  mutations: {
    gonnaLoading(state) {
      state.isLoading = true;
    },
    loaded(state) {
      state.isLoading = false;
    },
  }
};

export default new Vuex.Store(opt)