import apiChat from './api-chat'
import errorHandler from './errorHandler'

const Chat = {
  all: async conversationId =>
    apiChat
      .get('messages', { params: { conversationId: conversationId } })
      .then(r => ({
        success: true,
        messages: r.data.messages
      }))
      .catch(er =>
        errorHandler({
          er,
          defaultMessage: 'Não foi possível listar as mensagens'
        })
      ),
  getConverses: async data =>
    apiChat
      .get('converses', { params: data })
      .then(r => ({
        success: true,
        converses: r.data.converses
      }))
      .catch(er =>
        errorHandler({
          er,
          defaultMessage: 'Não foi possível listar as conversas'
        })
      ),
  find: async id =>
    apiChat
      .get(`converses/${id}`)
      .then(r => ({
        success: true,
        messages: r.data.converse.messages,
        converse: r.data.converse
      }))
      .catch(er =>
        errorHandler({
          er,
          defaultMessage: 'Não foi possível obter detalhes da conversa'
        })
      ),
  createConverse: async data =>
    apiChat
      .post('converses', { ...data })
      .then(r => ({
        success: true,
        message: r.data.message,
        converse: r.data
      }))
      .catch(er =>
        errorHandler({
          er,
          defaultMessage: 'Não foi possível realizar o cadastro '
        })
      )
}

export default Chat
