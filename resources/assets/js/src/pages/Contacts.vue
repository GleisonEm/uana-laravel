<template>
  <div class="q-pa-md" style="flex: 1">
    <q-toolbar class="bg-primary text-white shadow-2">
      <q-toolbar-title>{{ this.$route.params.title }}</q-toolbar-title>
    </q-toolbar>

    <q-list bordered>
      <q-item
        v-for="contact in contacts"
        :key="contact.id"
        class="q-my-sm"
        clickable
        v-ripple
      >
        <q-item-section avatar>
          <q-avatar color="primary" text-color="white">
            {{ contact.letter }}
          </q-avatar>
        </q-item-section>

        <q-item-section>
          <q-item-label>{{ contact.name }}</q-item-label>
          <q-item-label caption lines="1">{{ contact.email }}</q-item-label>
        </q-item-section>

        <q-item-section side>
          <q-icon
            name="chat_bubble"
            color="green"
            v-on:click="createConverse(contact)"
          />
        </q-item-section>
      </q-item>
    </q-list>
  </div>
</template>
<script>
import User from "../services/chatApi/User";
import Chat from "../services/Chat";
import { mapState } from "vuex";

export default {
  components: {},
  sockets: {
    connection: function () {
      console.log("socket connected KKKKKKKKKKKKKKKKKK");
    },
    customEmit: function (data) {
      console.log(
        'this method was fired by the socket server. eg: io.emit("customEmit", data)'
      );
    },
  },
  name: "contacts",
  computed: {
    ...mapState({
      // map this.count to store.state.count
      user: "user",
    }),
  },
  data: () => ({
    conversationId: "6219124fc392c345cde298e10",
    items: [],
    publishing: false,
    classData: null,
    loading: true,
    name: "",
    tab: "general",
    fab1: true,
    fab2: false,
    contacts: [
      {
        id: 1,
        name: "Ruddy Jedrzej",
        email: "rjedrzej0@discuz.net",
        letter: "R",
      },
      {
        id: 2,
        name: "Mallorie Alessandrini",
        email: "malessandrini1@marketwatch.com",
        letter: "M",
      },
      {
        id: 3,
        name: "Elisabetta Wicklen",
        email: "ewicklen2@microsoft.com",
        letter: "E",
      },
      {
        id: 4,
        name: "Seka Fawdrey",
        email: "sfawdrey3@wired.com",
        letter: "S",
      },
    ],
  }),
  mounted() {
    // console.log(this.$route.params.title, this.$route);
    // this.getConnectionSocket()
    this.getUsers();
  },
  methods: {
    async getUsers() {
      this.loading = true;
      const result = await User.get();
      this.loading = false;
      if (!result.success) {
        return false;
      }

      this.contacts = [];
      result.users.forEach((user) => {
        this.contacts.push({
          id: user.id,
          name: user.name,
          email: user.email,
          avatar: user.avatar,
          letter: user.name.charAt(0).toUpperCase(),
        });
      });
    },
    async createConverse(user) {
      this.loading = true;
      console.log("createConverse", user);
      const result = await Chat.createConverse({
        author: this.user.data.id,
        participants: [this.user.data.id, parseInt(user.id)],
        image: user.avatar,
        name: user.name,
        type: "converse",
      });
      this.loading = false;
      if (!result.success) {
        return false;
      }
      window.location.href = "chat/" + result.converse._id;
      // this.navigateToCreateConversePrivate(result.converse._id);
    },
    navigateToCreateConversePrivate(conversationId) {
      this.$router.push({
        name: "ConverseDetails",
        params: { conversationId: conversationId },
      });
    },
    onContentAdded() {},
    submit() {
      // axios.post('/your-url', {name: this.name})
      // .then(res => {
      //     // do something with res
      // })
      // .catch(err => {})
      // var message = this.name;
      // var data = {
      //   message: message,
      //   userSendId: "6219124fc392c345cde298e6f",
      //   conversationId: "6219124fc392c345cde298e10"
      // };
      // this.items.push(data);
      // this.$socket.emit("message", data);
      // // this.sockets.customEmit(data)
      // console.log("robinn");
    },
  },
};
</script>
