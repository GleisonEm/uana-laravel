import api from './api'
import errorHandler from './errorHandler'

const Class = {
  all: async () => api.get('classes')
    .then(r => ({
      success: true,
      message: r.data.message,
      classes: r.data.classes,
    }))
    .catch(er => errorHandler({ er, defaultMessage: 'Não foi possível listar as turmas' })),
  find: async (id) => api.get(`classes/${id}`)
    .then(r => ({
      success: true,
      message: r.data.message,
      class: r.data.class,
    }))
    .catch(er => errorHandler({ er, defaultMessage: 'Não foi possível encontrar a turma'}))
}

export default Class
