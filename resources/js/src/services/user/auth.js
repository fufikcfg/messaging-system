import { CHECK_AUTH, EXIT, LOGIN, REGISTRATION } from "../../store/resources/user/v1/auth.resource.js";
import ApiService from "../api/service.js";

export const AuthService = {
    registration(name, email, password) {
        return ApiService.post(
            REGISTRATION,
            { name: name, email: email, password: password }
        )
    },
    login(email, password) {
        return ApiService.post(
            LOGIN,
            {email, password })
    },
    exit() {
        return ApiService.get(EXIT)
    },
    verify() {
        return ApiService.get(CHECK_AUTH)
    }
}
