import Vue from "vue";
import Vuetify from "vuetify/lib";
import "vuetify/dist/vuetify.min.css";

Vue.use(Vuetify);
const opts = {
    icons: {
        iconfont: "mdiSvg",
    },
};

export default new Vuetify(opts);
