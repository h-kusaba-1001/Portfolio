import Router from "vue-router";
window.Vue = require("vue").default;

window.Vue.use(Router);

import routes from "./routes";

export default new Router({
    mode: "history",
    routes: routes,
});
