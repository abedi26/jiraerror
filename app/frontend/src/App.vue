<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App" />
    <button @click="sendRequest">Trigger Error</button>
    <button @click="sendAnotherRequest">Trigger Another Error</button>
    <button @click="permanentInVoltro">Permanent in voltro</button>
  </div>
</template>
<script>
import HelloWorld from './components/HelloWorld.vue'
import axios from 'axios'
import ErrorService from "../local_modules/vue-jira-handler/src/handlerService"
import Vue from 'vue'
Vue.config.productionTip = false;
export default {
  name: 'App',
  components: {
    HelloWorld
  },
  methods: {
    sendRequest() {
      axios.post("https://demo.local.com/random/variables ", {
        username: "RANDOM",
        password: "RANDOM",
      })
        .then(response => {
          console.log('JIRA ticket created successfully', response)
        })
        .catch(error => {
          ErrorService.onError(error);
          // console.error('Error creating JIRA ticket:', error)
        });
    },
    sendAnotherRequest() {
      axios.post("https://demo.local.com/fake-end-point", {
        username: "RANDOM",
        password: "RANDOM",
      })
        .then(response => {
          console.log('RESPONSE', response)
        })
        .catch(error => {
          ErrorService.onError(error);
        });
    },
    permanentInVoltro() {
      axios.post("https://demo.local.com/permanent-ker-dy", {
        username: "RANDOM",
        password: "RANDOM",
      })
        .then(response => {
          console.log('RESPONSE', response)
        })
        .catch(error => {
          ErrorService.onError(error);
        });
    },
     
  },
  created() {
    console.log("whatup")
    Vue.config.errorHandler = (err, vm, info) => {
      console.log("errorHandler:", [err, vm, info]);
      // Create the JIRA ticket
      // const jiraData = {
      //   baseUrl: process.env.VUE_APP_BASEURL,
      //   key: process.env.VUE_APP_KEY,
      //   username: process.env.VUE_APP_USERNAME,  
      //   userKey: process.env.VUE_APP_USERKEY,
      //   issueType: process.env.VUE_APP_ISSUETYPE ,
      //   summary: errorMessage,
      //   stacktrace: stackTrace,
      //   environment: process.env,
      // };
      //   axios.post(`https://demo.local.com/api/issues`, jiraData)
      //     .then(response => {
      //       console.log('JIRA ticket created successfully', response)
      //     })
      //     .catch(error => {
      //       console.error('Error creating JIRA ticket:', error)
      //     });
    };
  }
}
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2C3E50;
  margin-top: 60px;
}
</style>









