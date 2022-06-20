<template>
  <div class="page-center">
    <q-card id="login-card">
      <q-card-section>
        <div class="text-subtitle2">Preencha os campos abaixo</div>
      </q-card-section>

      <q-card-section class="q-pt-none">
        <LoginForm @logged="onLogin()" />
        <br />
        -->
        <router-link :to="{ name: 'Home' }">
          Ainda não possuo uma conta
        </router-link>
      </q-card-section>
    </q-card>
  </div>
</template>

<style scoped>
.page-center {
  align-items: center;
  background: linear-gradient(to top, #fff, #027be3);
  width: 100%;
  height: 100%;
  display: flex;
  align-self: center;
  display: flex;
  justify-content: center;
}

#login-card {
  min-width: 400px;
}
</style>

<script>
import LoginForm from "../components/forms/LoginForm.vue";
export default {
  name: "login",
  components: {
    LoginForm,
  },
  methods: {
    onLogin() {
      // this.$router.push({ name: 'Home' })
    },
  },
};
</script>
