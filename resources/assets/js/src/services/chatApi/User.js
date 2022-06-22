import apiChat from "../api-chat";
import errorHandler from "../errorHandler";
console.log("fdsfdsfdsfdsfds", apiChat);
const User = {
  get: async (userId) =>
    apiChat
      .get("users", { params: { userId: userId } })
      .then((r) => ({
        success: true,
        users: r.data.users,
      }))
      .catch((er) =>
        errorHandler({
          er,
          defaultMessage: "Não foi possível listar os contatos",
        })
      ),

  // find: async (id) => api.get(`classes/${id}`)
  //   .then(r => ({
  //     success: true,
  //     message: r.data.message,
  //     class: r.data.class,
  //   }))
  //   .catch(er => errorHandler({ er, defaultMessage: 'Não foi possível encontrar a turma'}))
};

export default User;
