import Vuetify from "vuetify/lib";
import "vuetify/dist/vuetify.min.css";
window.Vue = require("vue").default;

window.Vue.use(Vuetify);
const opts = {
    icons: {
        iconfont: "mdiSvg",
    },
};

export default new Vuetify(opts);
