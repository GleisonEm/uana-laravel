export function setData(state, payload) {
  state.data = payload
}

export function setLogged(state, payload = true) {
  state.logged = payload
}
