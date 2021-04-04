import VModal from 'vue-js-modal';

export default {
  install(Vue) {
    Vue.use(VModal, {
      dynamicDefault: { draggable: true, resizable: false }
    });
  },
};