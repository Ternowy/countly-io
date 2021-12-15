import Vue from 'vue';
import Components from './components';
import Plugins from './plugins';

Vue.use(Plugins);
Vue.use(Components);

new Vue({}).$mount('#app');
