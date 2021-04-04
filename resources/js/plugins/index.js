import Tooltip from './tippy.js';
import Lodash from './lodash.js';
import VueModal from './vue-modal.js';

export default {
  install (Vue) {
    Vue.use(Tooltip);
    Vue.use(Lodash);
    Vue.use(VueModal);
  }
}