import axios from 'axios'

const apiChat = axios.create({
    baseURL: process.env.VUE_APP_API_CHAT,
})
console.log('API CHAT', process.env.VUE_APP_API_CHAT)
    // api.interceptors.request.use((config) => {
    // 	const user = store.state.user.data
    // 	if (user) {
    // 		config.headers['Authorization'] = user.token
    // 	}

// 	return config
// })

export default apiChat