import { getToken } from "../jwt/service.js";
import axios from "axios";

const api = axios.create()

api.interceptors.request.use( config => {
        const token = getToken();
        if (token) {
            config.headers.authorization = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        console.error("Ошибка перехватчика запросов:", error);
    }
);

const ApiService = {

    get(resource) {
        try {
            return api.get(resource);
        } catch (error) {
            throw new Error(`[RWV] ApiService GET ${resource} - ${error.message}`);
        }
    },

    post(resource, params) {
        try {
            return api.post(resource, params);
        } catch (error) {
            throw new Error(`[RWV] ApiService POST ${resource} - ${error.message}`);
        }
    },

    put(resource, params) {
        try {
            return api.put(resource, params);
        } catch (error) {
            throw new Error(`[RWV] ApiService PUT ${resource} - ${error.message}`);
        }
    },

    delete(resource) {
        try {
            return api.delete(resource);
        } catch (error) {
            throw new Error(`[RWV] ApiService DELETE ${resource} - ${error.message}`);
        }
    },
};

export default ApiService
