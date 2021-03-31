import Vue from 'vue';
import SurveyBuilder from './components/SurveyBuilder.vue';
import SurveyResults from './components/SurveyResults';
import SurveyPreview from './components/SurveyPreview';

Vue.component('survey-builder', SurveyBuilder);
Vue.component('survey-results', SurveyResults);
Vue.component('survey-preview', SurveyPreview);

new Vue({}).$mount('#app');