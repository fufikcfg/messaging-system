import {
    LOGIN,
    LOGOUT,
    REGISTER,
    CHECK_AUTH,
} from "../../types/actions.type.js";
import * as JwtService from "../../../services/jwt/service.js";
import {PURGE_AUTH, SET_AUTH, SET_ERROR} from "../../types/mutations.type.js";
import {AuthService} from "../../../services/user/auth.js";

const state = {
    errors: null,
    user: {},
    isAuthenticated: !!JwtService.getToken()
}

const getters = {
    currentUser(state) {
        return state.user;
    },
    isAuthenticated: state => state.isAuthenticated
};

const actions = {
    [LOGIN](context, credentials) {
        return new Promise((resolve, reject) => {
            AuthService.login(
                credentials.email, credentials.password
            ).then(({data}) => {
                    context.commit(SET_AUTH, data.data);
                    resolve()
                }).catch(({response}) => {
                    context.commit(SET_ERROR, response.data.errors);
                    reject();
                });
        })
    },
    [LOGOUT](context) {
        return new Promise((resolve, reject) => {
            if (JwtService.getToken()) {
                AuthService.exit()
                    .then(({data}) => {
                        context.commit(PURGE_AUTH);
                        resolve();
                    }).catch(({response}) => {
                            context.commit(PURGE_AUTH);
                            reject(response);
                        }
                    );
            }
        })
    },
    [REGISTER](context, credentials) {
        return new Promise((resolve, reject) => {
            AuthService.registration(
                credentials.name, credentials.email, credentials.password
            ).then(({data}) => {
                context.commit(SET_AUTH, data.data);
                resolve()
            }).catch(({response}) => {
                    context.commit(SET_ERROR, response.data.errors);
                    reject()
                }
            );
        })
    },
    [CHECK_AUTH](context) {
        return new Promise((resolve, reject) => {
            if (JwtService.getToken()) {
                AuthService.verify()
                    .then(({data}) => {
                        context.commit(SET_AUTH, data.data);
                        resolve();
                    })
                    .catch(({response}) => {
                        context.commit(SET_ERROR, response.data.errors);
                        context.commit(PURGE_AUTH);
                        reject();
                    });
            } else {
                context.commit(PURGE_AUTH);
                reject();
            }
        });

    },
}

const mutations = {
    [SET_ERROR](state, error) {
        state.errors = error;
    },
    [SET_AUTH](state, user) {
        state.isAuthenticated = true;
        state.user = {
            email: user.email,
            name: user.name,
        };
        state.errors = {};
        if (user.token) {
            JwtService.saveToken(user.token);
        }
    },
    [PURGE_AUTH](state) {
        state.isAuthenticated = false;
        state.user = {};
        state.errors = {};
        JwtService.destroyToken();
    }
};

export default {
    state,
    actions,
    mutations,
    getters
};
