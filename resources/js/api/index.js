import axios from "axios";
import { useAuthStore } from "@/store/auth";

const baseURL = import.meta.env.VITE_API_BASE_URL || "http://wacana.test/api";

const apiInstance = axios.create({
    baseURL,
    timeout: 10000,
    headers: {
        "Content-Type": "application/json",
    },
});

apiInstance.interceptors.request.use((config) => {
    const authStore = useAuthStore();
    if (authStore.token) {
        config.headers.Authorization = `Bearer ${authStore.token}`;
    }
    return config;
});

apiInstance.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response?.status === 401) {
            const authStore = useAuthStore();
            authStore.setToken(null);
        }
        return Promise.reject(error);
    }
);

export const api = {
    login: (credentials) => apiInstance.post("/login", credentials),
    validateToken: () => apiInstance.post("/validate"),
    logout: () => apiInstance.post("/logout"),
    refreshToken: () => apiInstance.post("/refresh"),
    getUser: (userId) => apiInstance.get(`/profile/${userId}`),
};

export default apiInstance;
