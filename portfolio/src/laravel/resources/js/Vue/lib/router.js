import Router from 'vue-router'
window.Vue = require('vue').default;

window.Vue.use(Router)

import Home from "../Home.vue"
import About from "../pages/About.vue"
import Blog from "../pages/Blog.vue"

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/blog',
      name: 'blog',
      component: Blog
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
  ]
})