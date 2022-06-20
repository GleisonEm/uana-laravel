import Vue from "vue";
import Vuex from "vuex";
import VuexPersistence from "vuex-persist";

import userModule from "./modules/user";

Vue.use(Vuex);

const vuexLocal = new VuexPersistence({
    storage: window.localStorage,
});

/*
 * If not building with SSR mode, you can
 * directly export the Store instantiation;
 *
 * The function below can be async too; either use
 * async/await or return a Promise which resolves
 * with the Store instance.
 */
const store = new Vuex.Store({
    modules: {
        user: userModule,
    },
    // state: {
    //     user: { data: null, logged: false },
    // },
    // mutations: {
    //     saveUser(state, payload) {
    //         state.user.data = payload;
    //     },
    // },
    // actions: {},

    // enable strict mode (adds overhead!)
    // for dev mode only
    strict: process.env.DEBUGGING,
    plugins: [vuexLocal.plugin],
});

export default store;