import Vue from 'vue';
import Components from './components';
import Plugins from './plugins';
import CssVariables from './assets/variables.js';

Vue.use(Plugins);
Vue.use(Components);
Vue.mixin({
    data: ()=> {
        return {
            get variables() {
                return CssVariables;
            }
        }
    }
})
new Vue({}).$mount('#app');
