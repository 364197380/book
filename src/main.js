// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import vuex from 'vuex';

Vue.config.productionTip = false

/* eslint-disable no-new */
Vue.use(vuex);
let store = new vuex.Store({
    state:{
        username:null,
        password:null,
        id:null,
        type:null,
        sex:null,
        nickname:null,
        desc:null
    },
    mutations:{
        LogingAgree(state,can){
            state.username = can.username;
            state.password = can.password;
            state.id = can.id;
            state.type = can.type;
            state.sex = can.sex;
            state.nickname = can.nickname;
            state.desc = can.desc;
        },
        update(state,can){
            state.sex = can.sex;
            state.nickname = can.nickname;
            state.desc = can.desc;
        }
    }
});

new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
