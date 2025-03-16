const routes = [
    {
        path: '/',
        name: 'Index',
        component: () => import("../pages/Index.vue"),
        meta: {
            authRequired: true,
        },
    },
    {
        path: '/registration',
        name: 'Registration',
        component: () => import("../pages/Registration.vue"),
        meta: {
            authRequired: false,
        },
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import("../pages/Login.vue"),
        meta: {
            authRequired: false,
        },
    }
]

export default routes;
