const Home = () => import(/* webpackChunkName: "Home" */ "@/Vue/Home.vue");
const About = () =>
    import(/* webpackChunkName: "About" */ "@/Vue/pages/About.vue");
const Blog = () =>
    import(/* webpackChunkName: "Blog" */ "@/Vue/pages/Blog.vue");

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
