import {extend, ValidationObserver, ValidationProvider} from 'vee-validate';
import {max, required} from 'vee-validate/dist/rules';

export default {
  install(Vue) {
    extend('required', required);
    extend('max', max);

    Vue.component('ValidationObserver', ValidationObserver);
    Vue.component('ValidationProvider', ValidationProvider);
  },
};