import Tooltip from './tippy.js';
import Lodash from './lodash.js';

export default {
  install (Vue) {
    Vue.use(Tooltip);
    Vue.use(Lodash);
  }
}