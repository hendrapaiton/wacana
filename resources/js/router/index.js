import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        redirect: "/landing",
    },
    {
        path: "/landing",
        name: "landing",
        component: () => import("@/Pages/Landing.vue"),
    },
    {
        path: "/login",
        name: "login",
        component: () => import("@/Pages/Login.vue"),
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: () => import("@/Pages/Dashboard.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routes,
});

export default router;
