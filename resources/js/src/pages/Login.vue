<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Аутентификация</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">E-Mail адрес</label>
                            <input v-model="email" type="text" class="form-control" id="exampleInputSurname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input v-model="password" type="password" class="form-control" id="exampleInputPassword">
                        </div>
                        <button @click.prevent="onSubmit(email, password)" type="submit" class="btn btn-primary">Готово</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { LOGIN } from "../store/types/actions.type.js";

export default {
    data() {
        return {
            email: null,
            password: null,
        }
    },
    methods: {
        onSubmit(email, password) {
            this.$store
                .dispatch(LOGIN, { email, password })
                .then(() => {
                    this.$router.push({
                        name: 'Index'
                    })
                })
        }
    }
}
</script>

<style scoped>

</style>
