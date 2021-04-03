
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
    settings: {},
    postDialog: false,
    article: {},
    activeArticle: null,
  },
  mutations: {
    getSettings: state => { return state.settings },
    gonnaLoading: state => {
      state.isLoading = true;
    },
    loaded: state => {
      state.isLoading = false;
    },
    setPostDialog: (state, payload) => { state.postDialog = payload },
    setActiveArticle: (state, payload) => { state.activeArticle = payload },
  },
  getters: {
    getActiveArticle: state => { return state.activeArticle },
  }
};

export default new Vuex.Store(opt)
