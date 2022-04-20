import VueRouter from 'vue-router'
import Home from "./pages/Home.vue";
import PageNotFound from "./pages/404.vue";

const routes = [
    {
        path: '*',
        name: '404',
        component: PageNotFound,
    },
    {
        path: '/',
        name: 'home',
        component: Home,
    }
];

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    root: '/',
    base: `/`,
    routes,
    scrollBehavior: to => {
        if (to.hash) {
            return {selector: to.hash};
        } else {
            return {x: 0, y: 0};
        }
    }
});

export default router
