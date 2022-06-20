import axios from "axios";
import errorHandler from "./errorHandler";

const Auth = {
    login: async(email, password) =>
        axios
        .post("login", { email, password })
        .then((r) => ({
            success: true,
            user: r.data,
        }))
        .catch((er) =>
            errorHandler({ er, defaultMessage: "Não foi possível realizar login" })
        ),
    register: async(data) =>
        axios
        .post("register", {...data })
        .then((r) => ({
            success: true,
            message: r.data.message,
            user: r.data.user,
        }))
        .catch((er) =>
            errorHandler({
                er,
                defaultMessage: "Não foi possível realizar o cadastro ",
            })
        ),
};

export default Auth;