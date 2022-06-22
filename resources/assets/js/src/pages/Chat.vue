<template>
  <div
    class="q-pa-md"
    style="
      flex: 1;
      justify-content: justify-between;
      overflow: hidden;
      height: 100%;
    "
  >
    <q-toolbar
      class="bg-primary text-white shadow-2"
      style="
        top: 0;
        left: 0;
        right: 0;
        height: 30px;
        position: fixed;
        width: 100%;
        padding: 5px;
        overflow: hidden;
      "
    >
      <q-toolbar-title>{{
        personName ? personName : "kkkkkkkkk"
      }}</q-toolbar-title>
    </q-toolbar>
    <div
      class="col-6 q-pa-md"
      style="
        overflow: auto;
        /* height: 83vh; */
        display: flex;

        flex-direction: column-reverse;
        justify-content: end;
        position: fixed;
        margin: 5px;

        width: 100%;
        top: 50px; /*Set top value to HeightOfTopFrameDiv*/
        margin-left: auto;
        margin-right: auto;
        bottom: 82px; /*Set bottom value to HeightOfBottomFrameDiv*/
        right: 0px;
      "
    >
      <div
        class="q-pa-md column-reverse"
        ref="listMessages"
        style="margin: 15px; justify-content: center; max-width: 500px"
      >
        <div v-for="message in this.messages" :key="message.uniqueId">
          <q-chat-message
            v-if="message.userSendId === user.data.id"
            name="me"
            :text="[message.message]"
            :stamp="message.sendMessageHour"
            sent
            bg-color="amber-7"
          ></q-chat-message>
          <q-chat-message
            v-else
            v-bind:name="personName"
            :avatar="getAvatar(message.userSendId)"
            :text="[message.message]"
            :stamp="message.sendMessageHour"
            size="8"
            text-color="white"
            bg-color="primary"
          ></q-chat-message>
        </div>
      </div>
    </div>
    <div
      class="col-6"
      style="
        bottom: 0;
        left: 0;
        right: 0;
        height: 83px;
        position: fixed;
        width: 100%;
        padding: 5px;
      "
    >
      <q-input filled bottom-slots v-model="text" counter maxlength="500">
        <template v-slot:append>
          <q-icon
            v-if="text !== ''"
            name="close"
            @click="text = ''"
            class="cursor-pointer"
          />
        </template>

        <template v-slot:after>
          <q-btn round dense flat icon="send" @click="sendMessage()" />
        </template>
      </q-input>
    </div>
    <!-- </div> -->
  </div>
  <!-- </div> -->
</template>
<script>
import Chat from "../services/Chat";
import Vue from "vue";
import VueSocketIO from "vue-socket.io";
import { Notify } from "quasar";
import { uuid } from "vue-uuid";
import { mapState } from "vuex";
import SocketioService from "../services/socket.js";
import domain from "../services/api";
import { timeouts } from "retry";

export default {
  props: ["conversationid"],
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
  computed: {
    ...mapState({
      // map this.count to store.state.count
      user: "user",
    }),
  },
  name: "chat",
  data: () => ({
    text: "",
    items: [],
    converse: {},
    messages: [],
    publishing: false,
    classData: null,
    loading: true,
    name: "",
    tab: "general",
    fab1: true,
    fab2: false,
    personName: "",
    defaultAvatar: "https://cdn.quasar.dev/img/avatar-placeholder.png",
    domainApi: domain.domain + "/assets/uploads/avatars/",
  }),
  created() {
    SocketioService.setupSocketConnection();
    this.conversationId = this.conversationid;
    console.log(this.conversationId, "this.$route.params");
  },
  beforeUnmount() {
    SocketioService.disconnect();
  },
  mounted() {
    SocketioService.addEventListener({
      type: this.conversationId,
      callback: (message) => {
        if (
          !this.messages.find(
            (localMessage) => localMessage.uniqueId === message.uniqueId
          )
        ) {
          this.messages.push(message);
          setTimeout(() => {}, 2000);
          this.scrollToEnd();
        }
      },
    });
    this.getDetailsOfConverse();
  },

  methods: {
    async getDetailsOfConverse() {
      this.loading = true;
      const result = await Chat.find(this.conversationId);

      if (!result.success) {
        Notify.create({
          message: result.message,
          type: "error",
        });

        return false;
      }

      this.messages = result.messages
        .map((message) => {
          var date = new Date(message.createdAt);
          var sendMessageHour = date.toLocaleString("pt-br", {
            hour: "2-digit",
            minute: "2-digit",
          });

          return { ...message, sendMessageHour };
        })
        .reverse();

      this.converse = result.converse;

      var personName = this.converse.participants.find(
        (user) => user.id !== this.$store.state.user.data.id
      ).name;
      this.personName = personName;
      document.getElementsByClassName("titlePerson").value = personName;
      this.loading = false;
      this.scrollToEnd();
    },
    navigateToCreateConversePrivate() {
      this.$router.push({
        name: "ContactsConverse",
        params: { title: "Nova Conversa" },
      });
    },
    getAvatar(id) {
      const avatar = this.converse.participants.find(
        (user) => user.id == id
      ).avatar;

      if (avatar) {
        return this.domainApi + avatar;
      } else {
        return this.defaultAvatar;
      }
    },
    sendMessage() {
      var date = new Date();
      var sendMessageHour = date.toLocaleString("pt-br", {
        hour: "2-digit",
        minute: "2-digit",
      });
      var data = {
        userSendId: this.$store.state.user.data.id,
        uniqueId: uuid.v4(),
        message: this.text,
        conversationId: this.conversationId,
        sendMessageHour: sendMessageHour,
      };

      this.messages.push(data);

      SocketioService.emit("message", data);
      this.scrollToEnd();
    },
    scrollToEnd() {
      const el = this.$refs.listMessages;
      console.log("scroll to end ");
      if (el) {
        el.scrollIntoView({
          behavior: "smooth",
          block: "end",
        });
      }
    },
  },
};
</script>
