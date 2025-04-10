import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "@/store/auth";

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
    {
        path: "/:pathMatch(.*)*",
        name: "not-found",
        component: () => import("@/Pages/404.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routes,
});

router.beforeEach(async (to, _, next) => {
    const authStore = useAuthStore();

    if (!authStore.isInitialized) {
        await authStore.initialize();
    }

    const isAuthenticated = authStore.isAuthenticated;

    if (!isAuthenticated && to.name !== "login" && to.name !== "landing") {
        return next({ name: "login" });
    }

    next();
});

export default router;
