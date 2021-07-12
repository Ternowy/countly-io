import {extend, ValidationObserver, ValidationProvider} from 'vee-validate';
import {max, required, oneOf, email} from 'vee-validate/dist/rules';

export default {
  install(Vue) {
    extend('required', required);
    extend('max', max);
    extend('oneOf', oneOf);
    extend('email', email);

    Vue.component('ValidationObserver', ValidationObserver);
    Vue.component('ValidationProvider', ValidationProvider);
  },
};