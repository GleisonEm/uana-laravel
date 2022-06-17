/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { Quasar } from 'quasar'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import { createApp } from 'vue'

require('./bootstrap')

const app = createApp({})

app.use(Quasar)
    // register the component
app.component('hello-world', require('./components/ExampleComponent.vue').default)
app.component('converse', require('./src/pages/Converse.vue').default)
    // app.component('login-page', require('./src/pages/Login.vue').default)
    // ..HTML element to mount the Vue application
app.mount('#app')

// Vue.component('example-list', require('./components/Example.vue').default)
// Vue.component('task-list', require('./components/Main.vue').default)
// Vue.component('login-page', require('./src/pages/Login.vue').default)
// Vue.component('example-component', require('./components/ExampleComponent.vue').default)

// const app = new Vue({
//     el: '#app',
// })

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