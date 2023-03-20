/* eslint-disable */
import handlerService from "./handlerService";

const VueJiraHandler = {
  install: (Vue, { opts }) => {
    if (!handlerService) {
      throw new Error("handlerService is undefined. Make sure it is exported from handlerService");
    }
    handlerService.initHandler(opts);
    Vue.config.errorHandler = (err) => handlerService.onError(err);         
  }
}

export default VueJiraHandler;
