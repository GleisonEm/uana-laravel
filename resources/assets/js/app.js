/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Quasar from "quasar";
import Vue from "vue";
import VueRouter from "vue-router";
import Vuex from "vuex";
// import router from "./src/router/index";
import router from "./src/route/index";
import store from "./src/store/index";
import App from "./src/App.vue";
import LoginForm from "./src/components/forms/LoginForm.vue";
import Login from "./src/pages/Login.vue";
import Converse from "./src/pages/Converse.vue";
import Chat from "./src/pages/Chat.vue";
import Contacts from "./src/pages/Contacts.vue";

require("./bootstrap");

Vue.use(VueRouter);

// const routes = [{
//     path: "/home",
//     name: "Home",
// }, ];
// const router = new VueRouter({ mode: "history", routes });
Vue.use(Quasar);
Vue.use(Vuex);
// register the component
// app.component('hello-world', require('./components/ExampleComponent.vue').default)
// app.component('converse', require('./src/pages/Converse.vue').default)
// Vue.component("login-card", require("./src/pages/Login.vue").default);
// app.component('login-page', require('./src/pages/Login.vue').default)
// ..HTML element to mount the Vue application
// Vue.mount("#app");

// Vue.component('example-list', require('./components/Example.vue').default)
// Vue.component('task-list', require('./components/Main.vue').default)
// Vue.component("login-paged", require("./src/pages/Login.vue").default);
// Vue.component('example-component', require('./components/ExampleComponent.vue').default)

const app = new Vue({
    el: "#app",
    router,
    store,
    components: { App, Login, LoginForm, Converse, Contacts, Chat },
});
// app.component("login-page", require("./src/pages/Login.vue").default);
// import { createApp, h } from 'vue'
// import { createInertiaApp } from '@inertiajs/inertia-vue3'
// import { InertiaProgress } from '@inertiajs/progress'

// require('./bootstrap')

// const appName = window.document.getElementsByTagName('title')[0] ? .innerText || 'Laravel'

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => require(`./Pages/${name}.vue`),
//     setup({
//         el,
//         app,
//         props,
//         plugin,
//     }) {
//         return createApp({ render: () => h(app, props) })
//             .use(plugin)
//             .mixin({ methods: { route } })
//             .mount(el)
//     },
// })

// InertiaProgress.init({ color: '#4B5563' })