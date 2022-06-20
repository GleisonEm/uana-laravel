const routes = [{
        path: "/home",
        name: "Home",
    },
    {
        path: "/contacts-converse",
        name: "ContactsConverse",

        component: () =>
            import ("../pages/Contacts.vue"),
    },
    {
        path: "/converse",
        name: "ConverseDetails",

        component: () =>
            import ("../pages/Chat.vue"),
    },
];

export default routes;