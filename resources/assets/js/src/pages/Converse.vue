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
    <div class="q-gutter-y-md">
      <q-card>
        <q-toolbar class="bg-primary text-white shadow-2">
          <q-toolbar-title>Conversas</q-toolbar-title>
        </q-toolbar>
        <q-tabs
          v-model="tab"
          dense
          class="text-grey"
          active-color="primary"
          indicator-color="primary"
          align="justify"
          narrow-indicator
        >
          <q-tab name="general" label="Principal" />
          <q-tab name="classes" label="Turmas" />
        </q-tabs>

        <q-separator />

        <q-tab-panels v-model="tab" animated>
          <q-tab-panel
            style="height: 70vh; display: flex; flex-direction: column"
            name="general"
          >
            <!-- <div class="q-pa-md" style="max-width: 350px"> -->
            <q-list>
              <q-item
                v-for="converse in converses"
                :key="converse._id"
                class="q-mb-sm"
                clickable
                @click="navigateToConversePrivate(converse._id)"
                v-ripple
              >
                <!-- <div @click="navigateToConversePrivate(converse._id)"> -->
                <q-item-section avatar>
                  <q-avatar>
                    <img :src="getAvatar(converse.participants)" />
                  </q-avatar>
                </q-item-section>

                <q-item-section>
                  <q-item-label>{{
                    getName(converse.participants)
                  }}</q-item-label>
                  <q-item-label caption lines="1">{{
                    converse.messages[0] ? converse.messages[0].message : ""
                  }}</q-item-label>
                </q-item-section>
                <!-- </div> -->
              </q-item>
            </q-list>
            <!-- </div> -->
          </q-tab-panel>

          <q-tab-panel
            style="height: 70vh; display: flex; flex-direction: column"
            name="classes"
          >
            <q-list>
              <q-item
                v-for="contact in groupClasses"
                :key="contact._id"
                class="q-mb-sm"
                clickable
                v-ripple
              >
                <div @click="navigateToConversePrivate(contact._id)">
                  <q-item-section avatar>
                    <q-avatar>
                      <img
                        :src="`https://cdn.quasar.dev/img/${contact.avatar}`"
                      />
                    </q-avatar>
                  </q-item-section>

                  <q-item-section>
                    <q-item-label>{{ contact.name }}</q-item-label>
                    <q-item-label caption lines="1">{{
                      contact.messages[0] ? contact.messages[0].message : ""
                    }}</q-item-label>
                  </q-item-section>

                  <q-item-section side>
                    <q-icon
                      name="chat_bubble"
                      color="green"
                      v-on:click="navigateToConversePrivate(contact._id)"
                    />
                  </q-item-section>
                </div>
              </q-item>
            </q-list>
          </q-tab-panel>
        </q-tab-panels>
        <div class="q-mb-sm" align="right" style="padding: 10px">
          <q-fab
            v-model="fab2"
            label="Iniciar uma conversa"
            external-label
            vertical-actions-align="left"
            label-position="left"
            color="primary"
            icon="chat"
            direction="up"
            align="right"
          >
            <q-fab-action
              label-class="bg-grey-3 text-grey-8"
              external-label
              color="secondary"
              icon="group"
              @click="navigateToCreateConversePrivate()"
              label-position="left"
              label="Privada"
            ></q-fab-action>
            <q-fab-action
              label-class="bg-grey-3 text-grey-8"
              external-label
              color="primary"
              label-position="left"
              icon="groups"
              label="Turma"
            ></q-fab-action>
          </q-fab>
        </div>
      </q-card>
    </div>
  </div>
</template>
<script>
import Chat from "../services/Chat";
import { mapState } from "vuex";
import domain from "../services/api";

export default {
  setup() {
    return {
      fab2: true,

      onClick() {
        console.log("Clicked on a fab action");
      },
    };
  },
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
  name: "converse",
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
    converses: [
      {
        _id: 4,
        name: "Brunhilde Panswick",
        messa: "hello",
        avatar: "avatar2.jpg",
      },
      {
        _id: 5,
        name: "Winfield Stapforth",
        email: "Olá",
        avatar: "avatar6.jpg",
      },
      {
        _id: 6,
        name: "Brunhilde Panswick",
        email: "hello",
        avatar: "avatar2.jpg",
      },
      {
        _id: 7,
        name: "Winfield Stapforth",
        email: "Olá",
        avatar: "avatar6.jpg",
      },
      {
        _id: 8,
        name: "Brunhilde Panswick",
        email: "hello",
        avatar: "avatar2.jpg",
      },
      {
        _id: 9,
        name: "Winfield Stapforth",
        email: "Olá",
        avatar: "avatar6.jpg",
      },
    ],
    groupClasses: [
      {
        _id: 4,
        name: "Monitoria Inglês",
        email: "hello",
        avatar: "avatar2.jpg",
      },
      {
        _id: 5,
        name: "Monitoria Artes",
        email: "Olá",
        avatar: "avatar6.jpg",
      },
      {
        _id: 6,
        name: "Monitoria Física",
        email: "hello",
        avatar: "avatar2.jpg",
      },
      {
        _id: 7,
        name: "Monitoria Espanhol",
        email: "Olá",
        avatar: "avatar6.jpg",
      },
      {
        _id: 8,
        name: "Monitoria Quimica",
        email: "hello",
        avatar: "avatar2.jpg",
      },
      {
        _id: 9,
        name: "Monitoria Português",
        email: "Olá",
        avatar: "avatar6.jpg",
      },
    ],
    tab: "general",
    fab2: false,
    defaultAvatar: "https://cdn.quasar.dev/img/avatar-placeholder.png",
    converses: [],
    groupClasses: [],
    domainApi: domain.domain + "/assets/uploads/avatars/",
  }),
  mounted() {
    this.getConverses();
    this.getGroups();
  },
  methods: {
    navigateToCreateConversePrivate() {
      // this.$router.push({
      //   name: "ContactsConverse",
      //   params: { title: "Nova Conversa" },
      // });
      window.location.href = "contatos-chat";
    },
    async getConverses() {
      this.loading = true;
      const result = await Chat.getConverses({
        userId: this.user.data.id,
        type: "converse",
      });
      this.loading = false;
      console.log(result, this.user.data.id);
      if (!result.success) {
        return false;
      }

      this.converses = result.converses.reverse();

      console.log("conversas", this.converses);
    },
    async getGroups() {
      this.loading = true;
      const result = await Chat.getConverses({
        userId: this.user.data.id,
        type: "group",
      });
      this.loading = false;
      console.log(result, this.user.data.id);
      if (!result.success) {
        return false;
      }

      this.groupClasses = result.converses.reverse();
    },
    navigateToConversePrivate(conversationId) {
      console.log("clika", conversationId);
      window.location.href = "chat/" + conversationId;
    },
    onContentAdded() {},
    submit() {
      // axios.post('/your-url', {name: this.name})
      // .then(res => {
      //     // do something with res
      // })
      // .catch(err => {})

      var message = this.name;
      var data = {
        message: message,
        userSendId: "6219124fc392c345cde298e6f",
        conversationId: "6219124fc392c345cde298e10",
      };

      this.items.push(data);
      this.$socket.emit("message", data);
      // this.sockets.customEmit(data)
      console.log("robinn");
    },
    getAvatar(participants) {
      const avatar = participants.find(
        (user) => user.id != this.user.data.id
      ).avatar;
      if (avatar) {
        return this.domainApi + avatar;
      } else {
        return this.defaultAvatar;
      }
    },
    getName(participants) {
      return participants.find((user) => user.id != this.user.data.id).name;
    },
  },
};
</script>
