import {extend, ValidationObserver, ValidationProvider} from 'vee-validate';
import {max, required, oneOf} from 'vee-validate/dist/rules';

export default {
  install(Vue) {
    extend('required', required);
    extend('max', max);
    extend('oneOf', oneOf);

    Vue.component('ValidationObserver', ValidationObserver);
    Vue.component('ValidationProvider', ValidationProvider);
  },
};