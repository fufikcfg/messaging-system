import auth from "./user/auth.module.js"
import Vuex from "vuex";

export default new Vuex.Store({
    modules: {
        auth,
    }
});
