(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[12],{"9bdf":function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"q-pa-md",staticStyle:{flex:"1"}},[a("q-toolbar",{staticClass:"bg-primary text-white shadow-2"},[a("q-toolbar-title",[e._v(e._s(this.$route.params.title))])],1),a("q-list",{attrs:{bordered:""}},e._l(e.contacts,(function(t){return a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],key:t.id,staticClass:"q-my-sm",attrs:{clickable:""}},[a("q-item-section",{attrs:{avatar:""}},[a("q-avatar",{attrs:{color:"primary","text-color":"white"}},[e._v("\n          "+e._s(t.letter)+"\n        ")])],1),a("q-item-section",[a("q-item-label",[e._v(e._s(t.name))]),a("q-item-label",{attrs:{caption:"",lines:"1"}},[e._v(e._s(t.email))])],1),a("q-item-section",{attrs:{side:""}},[a("q-icon",{attrs:{name:"chat_bubble",color:"green"},on:{click:function(a){return e.createConverse(t)}}})],1)],1)})),1)],1)},i=[],n=a("9780"),o=a("d004");console.log("fdsfdsfdsfdsfds",n["a"]);const r={get:async()=>n["a"].get("users").then((e=>({success:!0,users:e.data.users}))).catch((e=>Object(o["a"])({er:e,defaultMessage:"Não foi possível listar os contatos"})))};var c=r,l=a("a4d6"),d=a("2f62"),m={components:{},sockets:{connection:function(){console.log("socket connected KKKKKKKKKKKKKKKKKK")},customEmit:function(e){console.log('this method was fired by the socket server. eg: io.emit("customEmit", data)')}},name:"Chat",computed:{...Object(d["c"])({user:"user"})},data:()=>({conversationId:"6219124fc392c345cde298e10",items:[],publishing:!1,classData:null,loading:!0,name:"",tab:"general",fab1:!0,fab2:!1,contacts:[{id:1,name:"Ruddy Jedrzej",email:"rjedrzej0@discuz.net",letter:"R"},{id:2,name:"Mallorie Alessandrini",email:"malessandrini1@marketwatch.com",letter:"M"},{id:3,name:"Elisabetta Wicklen",email:"ewicklen2@microsoft.com",letter:"E"},{id:4,name:"Seka Fawdrey",email:"sfawdrey3@wired.com",letter:"S"}]}),mounted(){console.log(this.$route.params.title,this.$route),this.getUsers()},methods:{async getUsers(){this.loading=!0;const e=await c.get();if(this.loading=!1,!e.success)return!1;this.contacts=[],e.users.forEach((e=>{this.contacts.push({id:e.id,name:e.name,email:e.email,avatar:e.avatar,letter:e.name.charAt(0).toUpperCase()})}))},async createConverse(e){this.loading=!0,console.log("createConverse",e);const t=await l["a"].createConverse({author:this.user.data.id,participants:[this.user.data.id,parseInt(e.id)],image:e.avatar,name:e.name,type:"converse"});if(this.loading=!1,!t.success)return!1;this.navigateToCreateConversePrivate(t.converse._id)},navigateToCreateConversePrivate(e){this.$router.push({name:"ConverseDetails",params:{conversationId:e}})},onContentAdded(){},submit(){}}},u=m,h=a("2877"),v=a("65c6"),p=a("6ac5"),b=a("1c1c"),f=a("66e5"),g=a("4074"),w=a("cb32"),K=a("0170"),C=a("0016"),q=a("714f"),y=a("eebe"),_=a.n(y),k=Object(h["a"])(u,s,i,!1,null,null,null);t["default"]=k.exports;_()(k,"components",{QToolbar:v["a"],QToolbarTitle:p["a"],QList:b["a"],QItem:f["a"],QItemSection:g["a"],QAvatar:w["a"],QItemLabel:K["a"],QIcon:C["a"]}),_()(k,"directives",{Ripple:q["a"]})}}]);