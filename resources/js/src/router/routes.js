const routes = [
    {
        path: '/',
        component: () => import("../pages/Index.vue"),
    },
    {
        path: '/registration',
        component: () => import("../pages/Registration.vue"),
    },
    {
        path: '/login',
        component: () => import("../pages/Login.vue"),
    }
]

export default routes;
