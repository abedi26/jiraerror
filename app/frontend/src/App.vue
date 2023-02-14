<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App" />
    <button @click="testError">Trigger Error</button>
  </div>
</template>
<script>
import HelloWorld from './components/HelloWorld.vue'
import axios from 'axios'
import Vue from 'vue'
Vue.config.productionTip = false;
export default {
  name: 'App',
  components: {
    HelloWorld
  },
  methods: {
  testError() {
    throw new Error("Test Error");
  }
},
  created() {
  console.log("whatup")
  Vue.config.errorHandler = (err) => {
    // Get the error details
    const errorMessage = err.message;
    const stackTrace = err.stack;
    console.error("error from vue event handler ===>", errorMessage, stackTrace);

    // Create the JIRA ticket
    const data = {
      fields: {
        project: {
          key: 'EE'
        },
        summary: errorMessage,
        description: stackTrace.toString(),
        issuetype: {
          name: 'bug',
          id:'10004'
        }
      }
    };
    axios.post(`https://demo.local.com/api/issues`, data)
      .then(response => {
        console.log('JIRA ticket created successfully', response)
      })
      .catch(error => {
        console.error('Error creating JIRA ticket:', error)
      });
  };
}

};
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









