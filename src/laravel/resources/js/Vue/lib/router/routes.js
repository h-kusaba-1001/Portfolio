import Home from "@/Vue/Home.vue";
import About from "@/Vue/pages/About.vue";
import Blog from "@/Vue/pages/Blog.vue";

export default [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/blog",
        name: "blog",
        component: Blog,
    },
    {
        path: "/blog/:id",
        name: "blogDetail",
        component: Blog,
        props: true,
    },
    {
        path: "/about",
        name: "about",
        component: About,
    },
];
