import Vuex from "vuex";
window.Vue = require("vue").default;

window.Vue.use(Vuex);

import state from "./state";
import mutations from "./mutations";
import getters from "./getters";

const opt = {
    state: state,
    mutations: mutations,
    getters: getters,
};

export default new Vuex.Store(opt);
