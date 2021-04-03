import Header from './common/Header';
import SurveyBuilder from './SurveyBuilder';
import SurveyResults from './SurveyResults';
import SurveyPreview from './SurveyPreview';
import BaseSquareButton from './base/buttons/BaseSquareButton';
import InputBase from './base/inputs/InputBase';

export default {
  install(Vue) {
    Vue.component('Header', Header);
    Vue.component('SurveyBuilder', SurveyBuilder);
    Vue.component('SurveyResults', SurveyResults);
    Vue.component('SurveyPreview', SurveyPreview);
    Vue.component('BaseSquareButton', BaseSquareButton);
    Vue.component('InputBase', InputBase);
  }
}