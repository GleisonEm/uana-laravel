(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[7],{"229c":function(e,a,s){"use strict";s("c9c2")},"8ef1":function(e,a,s){"use strict";s.r(a);var t=function(){var e=this,a=e.$createElement,s=e._self._c||a;return s("q-page",{staticClass:"page-center"},[s("q-card",{attrs:{id:"register-card"}},[s("q-card-section",[s("div",{staticClass:"text-h6"},[e._v("Cadastro")]),s("div",{staticClass:"text-subtitle2"},[e._v("Preencha os campos abaixo")])]),s("q-card-section",{staticClass:"q-pt-none"},[s("RegisterForm",{on:{registered:e.onRegister}}),s("br"),s("router-link",{attrs:{to:{name:"Login"}}},[e._v("\n        Já possuo uma conta\n      ")])],1)],1)],1)},r=[],i=function(){var e=this,a=e.$createElement,s=e._self._c||a;return s("q-form",{ref:"registerForm",on:{submit:e.handleSubmit}},[s("div",{staticClass:"q-gutter-md"},[s("q-input",{attrs:{outlined:"",required:"",disable:e.loading,label:"Nome completo"},model:{value:e.user.name,callback:function(a){e.$set(e.user,"name",a)},expression:"user.name"}}),s("q-input",{attrs:{outlined:"",type:"email",required:"",disable:e.loading,label:"E-mail"},model:{value:e.user.email,callback:function(a){e.$set(e.user,"email",a)},expression:"user.email"}}),s("q-input",{attrs:{outlined:"",required:"",disable:e.loading,label:"Nome de usuário"},model:{value:e.user.username,callback:function(a){e.$set(e.user,"username",a)},expression:"user.username"}}),s("q-input",{directives:[{name:"mask",rawName:"v-mask",value:"##/##/####",expression:"'##/##/####'"}],attrs:{outlined:"",required:"",disable:e.loading,label:"Data de Nascimento"},model:{value:e.user.birthDate,callback:function(a){e.$set(e.user,"birthDate",a)},expression:"user.birthDate"}}),s("q-select",{attrs:{outlined:"",required:"",disable:e.loading,options:e.availableTrainingAreas,label:"Área de formação"},model:{value:e.user.trainingArea,callback:function(a){e.$set(e.user,"trainingArea",a)},expression:"user.trainingArea"}}),s("q-input",{attrs:{type:"password",outlined:"",required:"",disable:e.loading,label:"Senha"},model:{value:e.user.password,callback:function(a){e.$set(e.user,"password",a)},expression:"user.password"}}),s("q-input",{attrs:{type:"password",outlined:"",required:"",disable:e.loading,label:"Confirmação de senha"},model:{value:e.user.passwordConfirmation,callback:function(a){e.$set(e.user,"passwordConfirmation",a)},expression:"user.passwordConfirmation"}}),s("q-input",{attrs:{type:"password",outlined:"",disable:e.loading,label:"Código da turma (opcional)"},model:{value:e.classCode,callback:function(a){e.classCode=a},expression:"classCode"}}),s("q-btn",{attrs:{type:"submit",color:"green","text-color":"white",label:"Finalizar cadastro",disable:e.loading,loading:e.loading}})],1)])},n=[],o=s("d1dd"),l=s("2a19"),u=s("2f62"),d={name:"RegisterForm",data:()=>({user:{name:"",username:"",email:"",birthDate:"",password:"",passwordConfirmation:"",trainingArea:null},classCode:"",availableTrainingAreas:[{label:"Matemática",value:1},{label:"Geografia",value:2},{label:"História",value:3}],loading:!1}),methods:{...Object(u["b"])("user",["setData","setLogged"]),async handleSubmit(){this.loading=!0;const e=await o["a"].register({...this.user,password_confirmation:this.user.passwordConfirmation});if(this.loading=!1,!e.success)return l["a"].create({message:e.message||"Não foi possível realizar o cadastro. Tente novamente mais tarde",type:"error"}),!1;this.setData(e.user),this.setLogged(),this.$router.push({name:"Home"})}}},c=d,m=s("2877"),p=s("0378"),b=s("27f9"),g=s("ddd8"),f=s("9c40"),v=s("eebe"),h=s.n(v),q=Object(m["a"])(c,i,n,!1,null,"43f5cca2",null),w=q.exports;h()(q,"components",{QForm:p["a"],QInput:b["a"],QSelect:g["a"],QBtn:f["a"]});var C={name:"Register",components:{RegisterForm:w},methods:{onRegister(){this.$router.push({name:"Home"})}}},x=C,k=(s("229c"),s("9989")),$=s("f09f"),_=s("a370"),y=Object(m["a"])(x,t,r,!1,null,"4e03d47f",null);a["default"]=y.exports;h()(y,"components",{QPage:k["a"],QCard:$["a"],QCardSection:_["a"]})},c9c2:function(e,a,s){}}]);