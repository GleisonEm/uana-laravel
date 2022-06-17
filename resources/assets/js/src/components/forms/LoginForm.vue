<template>
  <q-form ref="loginForm" @submit="handleSubmit">
    <div class="q-gutter-md">
      <q-input
        type="email"
        outlined
        required
        :disable="loading"
        v-model="user.email"
        label="E-mail"
      />
      <q-input
        type="password"
        outlined
        required
        :disable="loading"
        v-model="user.password"
        label="Senha"
      />

      <q-btn
        type="submit"
        color="green"
        text-color="white"
        label="Entrar"
        :disable="loading"
        :loading="loading"
      />
    </div>
  </q-form>
</template>

<script>
// import Auth from 'src/services/Auth'
// import { Notify } from 'quasar'
// import { mapMutations } from 'vuex'

export default {
  name: 'LoginForm',
  data: () => ({
    user: {
      email: '',
      password: '',
    },
    loading: false,
  }),
  methods: {
    // ...mapMutations('user', [
    //   'setData',
    //   'setLogged',
    // ]),
    // async handleSubmit() {
    //   this.loading = true
    //   const result = await Auth.login(this.user.email, this.user.password)
    //   this.loading = false

    //   if (!result.success) {
    //     Notify.create({
    //       message: result.message,
    //       type: 'error',
    //     })

    //     return false
    //   }

    //   this.setData(result.user)
    //   this.setLogged()
    //   this.$router.push({ name: 'Home' })
    // },
  }
}
</script>

<style scoped>
</style>
