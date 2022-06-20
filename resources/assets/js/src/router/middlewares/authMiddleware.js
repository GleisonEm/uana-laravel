import store from '../../store'

export default function (to, from, next) {
  if (to.meta.requiresAuth && !store.state.user.logged) {
    return next({ name: 'Login' })
  }

  if (to.meta.requiresGuest && store.state.user.logged) {
    return next({ name: 'Home' })
  }

  next()
}
