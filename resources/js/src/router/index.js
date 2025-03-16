import {createRouter, createWebHistory} from "vue-router";
import routes from "./routes.js";
import {CHECK_AUTH} from "../store/types/actions.type.js";
import store from "../store/modules/index.js";
import {getToken} from "../services/jwt/service.js";

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (getToken()) {
            store.dispatch(CHECK_AUTH)
                .then(() => {
                    if (to.name === 'Login' || to.name === 'Register') {
                        return next({
                            path: router.back()
                        });
                    } else {
                        return next();
                    }
                }).catch(() => {
                return next({
                    name: 'Login'
                })
            });
        }
    }
    else {
        return next();
    }
});

export default router;
