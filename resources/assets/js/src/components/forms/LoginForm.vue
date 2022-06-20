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
import { Notify } from "quasar";
import Main from "../../services/Main";
import { mapMutations, mapState } from "vuex";
import axios from "axios";

export default {
  name: "LoginForm",
  data: () => ({
    user: {
      email: "",
      password: "",
    },
    loading: false,
  }),
  methods: {
    ...mapMutations("user", ["setData", "setLogged"]),
    async handleSubmit() {
      this.loading = true;
      // var data = {
      //   id: 4,
      //   cpf: "000.000.000-03",
      //   name: "Luciana Rodrigues Diniz",
      //   email: "aluno1@gmail.com",
      //   avatar: "4.jpg",
      //   assignment_id: 4,
      //   path_signature: null,
      //   block: "N",
      //   institute_id: 1,
      //   area_id: 3,
      //   tags: "arduino,web,goiaba,inter",
      //   created_at: "2022-06-10 18:00:02",
      //   updated_at: "2022-06-10 18:22:05",
      //   created_by: "admin",
      //   updated_by: "Luciana Rodrigues Diniz",
      // };
      // this.setData(data);
      // this.setLogged();
      const result = await Main.login(this.user.email, this.user.password);
      this.loading = false;

      if (!result.success) {
        console.log("ERRRRRRRROOOOOOOOO");

        return false;
      }
      this.setData(result.user);
      this.setLogged();
      window.location.href = "home";
      // axios
      //   .post("login", { email: this.user.email, password: this.user.password })
      //   .then(function (response) {
      //     console.log("SUCCESS", response.data);
      //   })
      //   .catch(function (error) {
      //     console.log(error);
      //   });

      // console.log(result);

      // if (!result.success) {
      //   Notify.create({
      //     message: result.message,
      //     type: 'error',
      //   })

      //   return false
      // }

      // this.$router.push({ name: 'Home' })
    },
  },
};
</script>

<style scoped></style>
