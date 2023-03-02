import Vue from 'vue'
import './plugins/axios'
import App from './App.vue';
import VueJiraHandler from "../local_modules/vue-jira-handler/src/handlerPlugin";



Vue.config.productionTip = false

Vue.use(VueJiraHandler, {});

Vue.config.errorHandler = (err, vm, info) => {
  console.log("errorHandler:", [err, vm, info]);
};

// Vue.use(VueJiraHandler, {
//   opts: {
//     baseUrl: process.env.VUE_APP_BASEURL,
//     key: process.env.VUE_APP_KEY,
//     username: process.env.VUE_APP_USERNAME,
//     userKey: process.env.VUE_APP_USERKEY,
//     issueType: process.env.VUE_APP_ISSUETYPE  
//   }
// });

new Vue({
  render: h => h(App),
}).$mount('#app');
