import VueLodash from 'vue-lodash';
import debounce from 'lodash/debounce.js';

export default {
  install(Vue) {
    Vue.use(VueLodash, { name: 'custom', lodash: { debounce } });
  }
};