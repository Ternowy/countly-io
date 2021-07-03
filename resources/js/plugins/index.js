import Tooltip from './tippy.js';
import Lodash from './lodash.js';
import VueModal from './vue-modal.js';
import VeeValidate from './vee-validate.js';
import WCharts from './wcharts.js';
import Clipboard from 'v-clipboard';
import ScrollTo from './scroll-to';

export default {
  install (Vue) {
    Vue.use(Tooltip);
    Vue.use(Lodash);
    Vue.use(VueModal);
    Vue.use(VeeValidate);
    Vue.use(WCharts);
    Vue.use(Clipboard);
    Vue.use(ScrollTo);
  }
}
