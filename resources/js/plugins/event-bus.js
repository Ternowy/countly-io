export default {
  install(Vue) {
    Vue.prototype.$eventBus = new Vue();
    Vue.prototype.$eventBusEvents = {
      LOADING: 'loading-started',
      LOADED: 'loading-ended'
    };
  }
};