import VueScrollTo from 'vue-scrollto';

export default {
  install(Vue) {
    Vue.use(VueScrollTo, {
      container: "body",
      duration: 500,
      easing: "ease",
      offset: 0,
      force: true,
      cancelable: true,
      onStart: false,
      onDone: false,
      onCancel: false,
      x: false,
      y: true
    })
  }
};
