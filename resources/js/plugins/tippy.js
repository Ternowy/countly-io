import VueTippy, { TippyComponent } from 'vue-tippy';

export default {
  install (Vue) {
    Vue.use(VueTippy, {
      directive: "tooltip",
      flipDuration: 0,
      popperOptions: {
        modifiers: {
          preventOverflow: {
            enabled: false
          }
        }
      }
    });
    Vue.component('Tooltip', TippyComponent);
  }
};

import "tippy.js/themes/light.css";