<template>
    <div class="ms-auto">
        <button v-if="isAuthenticated" @click.prevent="exit()" class="btn m-1 btn-outline-danger">Выйти</button>
        <router-link v-if="!isAuthenticated" to="/registration" class="btn m-1 btn-outline-success">Регистрация</router-link>
        <router-link v-if="!isAuthenticated" to="/login" class="btn m-1 btn-outline-success">Войти</router-link>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { LOGOUT } from "../../../store/types/actions.type.js";
import router from "../../../router/index.js";

export default {
    methods: {
        exit() {
            this.$store
                .dispatch(LOGOUT)
                .finally(() => {
                    router.push(
                        { name: 'Login' }
                    );
            });
        }
    },
    computed: {
        ...mapGetters(['isAuthenticated'])
    }
};
</script>
