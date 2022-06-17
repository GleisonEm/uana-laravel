import { io } from 'socket.io-client'

class SocketioService {
  socket
  constructor() {}

  setupSocketConnection() {
    this.socket = io('http://localhost:3000', {
      transports: ['websocket'],
      jsonp: false
    })
  }

  emit(message, content) {
    if (this.socket) {
      this.socket.emit(message, content)
    }
  }

  disconnect() {
    if (this.socket) {
      this.socket.disconnect()
    }
  }

  addEventListener(event) {
    if (!this.socket) {
      setupSocketConnection()
    }

    this.socket.on(event.type, event.callback)
  }
}

export default new SocketioService()
