import axios from "axios";

const apiChat = axios.create({
    baseURL: "http://localhost:3340",
});
// api.interceptors.request.use((config) => {
// 	const user = store.state.user.data
// 	if (user) {
// 		config.headers['Authorization'] = user.token
// 	}

// 	return config
// })

export default apiChat;