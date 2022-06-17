import api from './api'
import errorHandler from './errorHandler'

const Post = {
  all: async (params = {}) => api.get('posts', { params })
    .then(r => ({
      success: true,
      posts: r.data.posts,
    }))
    .catch(er => errorHandler({ er, defaultMessage: 'Não foi possível listar as publicações' })),
  store: async (data) => api.post('posts', data)
    .then(r => ({
      success: true,
      message: r.data.message,
      post: r.data.post,
    }))
    .catch(er => errorHandler({ er, defaultMessage: 'Não foi possível registrar a publicação'})),
  addLocation: async (id, data) => api.post(`posts/locations/${id}/create`, data)
    .then(r => ({
      success: true,
      message: r.data.message,
      post: r.data.post,
    }))
    .catch(er => errorHandler({ er, defaultMessage: 'Não foi possível registrar a publicação'})),
  addAttachment: async (id, data) => api.post(`posts/attachments/${id}/create`, data)
    .then(r => ({
      success: true,
      message: r.data.message,
      post: r.data.post,
    }))
    .catch(er => errorHandler({ er, defaultMessage: 'Não foi possível registrar a publicação'})),
}

export default Post
