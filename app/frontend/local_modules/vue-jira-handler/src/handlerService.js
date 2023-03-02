import axios from "axios";

const options = {
  baseUrl: process.env.VUE_APP_BASEURL,
  key: process.env.VUE_APP_KEY,
  username: process.env.VUE_APP_USERNAME,
  userKey: process.env.VUE_APP_USERKEY,
  issueType: process.env.VUE_APP_ISSUETYPE,
  environment: process.env,
};

export default class ErrorService {
  static async initHandler(opts) {
    // handle null options scenario

    // initialize options
    Object.assign(options, opts);


    // wait for validation results
    // Can be acheived by callback functions, promises, async/await
    // Callback function -> callback hell
    // validate options
    await this.validateOptions();

    // initialization
    this.client = axios.create({
      baseURL: options.baseUrl,
      auth: {
        username: options.username,
        userKey: options.userKey
      }
    });
  }

  static validateOptions() {
    // check environment variable
    // if required options are missing, throw error 
    // and the service should not be useable
    if (!options.baseUrl) {
      throw new Error("The 'baseUrl' option is required");
    }
    if (!options.key) {
      throw new Error("The 'key' option is required");
    }
    if (!options.username) {
      throw new Error("The 'username' option is required");
    }
    if (!options.userKey) {
      throw new Error("The 'userKey' option is required");
    }
  }

  static async createJiraTicket(payload={}) {
    return await this.client.post(`https://demo.local.com/api/issues`, payload);
  }

  static async onError(err) {
    let errorPayload = {message: err.message, status: err.response.status, stacktrace: err.response.data};

    //let errorPayload = {message: err.message, status: err.response.status, stacktrace: err.response.data};

    const payload = {
        baseUrl: process.env.VUE_APP_BASEURL,
        key: process.env.VUE_APP_KEY,
        username: process.env.VUE_APP_USERNAME,  
        userKey: process.env.VUE_APP_USERKEY,
        issueType: process.env.VUE_APP_ISSUETYPE ,
        environment: process.env.NODE_ENV,
        summary: errorPayload.message,
        stacktrace: errorPayload.stacktrace.toString(),
      };
      console.log("errorPayload:", payload);
    let response = await this.createJiraTicket(payload);
    console.log("response:", response);

    // Send Error to backend service
    // const jiraData = {
    //   summary: err.message,
    //   stacktrace: err.stack.toString(),
    //   ...options
    // };

    // console.log("SENDING ERROR DATA", jiraData);

    // this.client.post(`https://demo.local.com/api/issues`, jiraData)
    //   .then(response => {
    //     console.log('JIRA ticket created successfully', response)
    //   })
    //   .catch(error => {
    //     console.error('Error creating JIRA ticket:', error)
    //   });

    // this.client.post("errorgene.atlassian.net/rest/api/2/issue", {
    //   fields: {
    //     project: {
    //       key: jiraData.key
    //     },
    //     summary: jiraData.summary,
    //     description: jiraData.stacktrace,
    //     issuetype: {
    //       id: jiraData.issueType
    //     }
    //   }
    // })
    //   .then(function (response) {
    //     console.log("Error reported to JIRA with issue key " + response.data.key);
    //   })
    //   .catch(function (error) {
    //     console.log("Error reporting error to JIRA: " + error);
    //   });
  }
}