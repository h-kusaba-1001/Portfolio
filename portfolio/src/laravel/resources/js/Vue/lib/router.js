import Router from 'vue-router'
window.Vue = require('vue').default;

window.Vue.use(Router)

import Home from "../Home.vue"

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
  ]
})