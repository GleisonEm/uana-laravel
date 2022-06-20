import axios from "axios";
import store from "../store";

const domain = "http://localhost:8000";

const api = axios.create({
    baseURL: process.env.VUE_APP_API_BASE,
});

api.interceptors.request.use((config) => {
    const user = store.state.user.data;
    if (user) {
        config.headers["Authorization"] = user.token;
    }

    return config;
});

export default { api, domain };