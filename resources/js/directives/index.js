import ClickOutside from './click-outside.js';

export default {
  install (Vue) {
    Vue.directive('click-outside', ClickOutside);
  }
};