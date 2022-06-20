// const routes = [{
//         path: "/",
//         component: () =>
//             import ("layouts/MainLayout.vue"),
//         children: [{ path: "", component: () =>
//                 import ("pages/Index.vue") }],
//     },
//     {
//         path: "/guest",
//         component: () =>
//             import ("layouts/GuestLayout.vue"),
//         children: [{
//                 path: "/register",
//                 name: "Register",
//                 meta: {
//                     requiresGuest: true,
//                 },
//                 component: () =>
//                     import ("pages/auth/Register.vue"),
//             },
//             {
//                 path: "/login",
//                 name: "Login",
//                 meta: {
//                     requiresGuest: true,
//                 },
//                 component: () =>
//                     import ("../pages/Login.vue"),
//             },
//         ],
//     },
//     {
//         path: "/home",
//         component: () =>
//             import ("layouts/MainLayout.vue"),
//         children: [{
//                 path: "",
//                 name: "Home",
//                 meta: {
//                     requiresAuth: true,
//                 },
//                 component: () =>
//                     import ("pages/Home.vue"),
//             },
//             {
//                 path: "/classes",
//                 name: "Classes",
//                 meta: {
//                     requiresAuth: true,
//                 },
//                 component: () =>
//                     import ("pages/Classes.vue"),
//             },
//             {
//                 path: "/classes/:id",
//                 name: "ClassDetails",
//                 meta: {
//                     requiresAuth: true,
//                 },
//                 component: () =>
//                     import ("pages/ClassDetails.vue"),
//             },
//             {
//                 path: "/classes/:id/settings",
//                 name: "ClassSettings",
//                 meta: {
//                     requiresAuth: true,
//                 },
//                 component: () =>
//                     import ("pages/ClassSettings.vue"),
//             },
//             {
//                 path: "/groups/:id",
//                 name: "GroupDetails",
//                 meta: {
//                     requiresAuth: true,
//                 },
//                 component: () =>
//                     import ("pages/ClassDetails.vue"),
//             },
//             {
//                 path: "/converses",
//                 name: "Converse",
//                 meta: {
//                     requiresAuth: true,
//                 },
//                 component: () =>
//                     import ("pages/Converse.vue"),
//             },
//             {
//                 path: "/chat",
//                 name: "Chat",
//                 meta: {
//                     requiresAuth: true,
//                 },
//                 component: () =>
//                     import ("pages/Chat.vue"),
//             },
//             {
//                 path: "/contacts-converse",
//                 name: "ContactsConverse",
//                 meta: {
//                     requiresAuth: true,
//                 },

//                 component: () =>
//                     import ("pages/Contacts.vue"),
//             },
//             {
//                 path: "/converse",
//                 name: "ConverseDetails",
//                 meta: {
//                     requiresAuth: true,
//                 },

//                 component: () =>
//                     import ("pages/ConverseDetails.vue"),
//             },
//         ],
//     },

//     // Always leave this as last one,
//     // but you can also remove it
//     // {
//     //     path: "*",
//     //     component: () =>
//     //         import ("pages/Error404.vue"),
//     // },
// ];

const routes = [{
    path: "/conversas",
    name: "Conversa",
    component: () =>
        import ("../pages/Converse.vuee"),
    children: [{
            path: "/contacts-converse",
            name: "ContactsConverse",

            component: () =>
                import ("../pages/Contacts.vue"),
        },
        {
            path: "/converse",
            name: "Chat",

            component: () =>
                import ("../pages/Chat.vue"),
        },
    ],
}, ];
export default routes;