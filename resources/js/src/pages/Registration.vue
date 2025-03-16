<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Регистрация</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Имя</label>
                            <input v-model="name" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-Mail адрес</label>
                            <input v-model="email" type="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input v-model="password" type="password" class="form-control">
                        </div>
                        <button @click.prevent="onSubmit(name, email, password)" class="btn btn-primary">Готово</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { REGISTER } from "../store/types/actions.type.js";

export default {
    data() {
        return {
            name: null,
            email: null,
            password: null,
        }
    },
    methods: {
        onSubmit(name, email, password) {
            this.$store
                .dispatch(REGISTER, { name, email, password })
                .then(() => {
                    this.$router.push({
                        name: 'Index'
                    })
                })
        }
    }
}
</script>
