import Header from './common/Header';
import SurveyBuilder from './SurveyBuilder';
import SurveyResults from './SurveyResults';
import SurveyPreview from './SurveyPreview';
import BaseSquareButton from './base/buttons/BaseSquareButton';
import InputBase from './base/inputs/InputBase';
import BaseIcon from './base/icons/BaseIcon';
import BaseInput from './base/inputs/BaseInput';
import BaseCounter from './base/info/BaseCounter';
import BaseTextarea from './base/inputs/BaseTextarea';
import BaseButton from './base/buttons/BaseButton';
import Base3DotsMenu from './base/interactive/Base3DotsMenu';
import BaseItemList from './base/info/BaseItemList';
import BaseItem from './base/info/BaseItem';

export default {
  install(Vue) {
    //base
    Vue.component('BaseSquareButton', BaseSquareButton);
    Vue.component('BaseButton', BaseButton);
    Vue.component('InputBase', InputBase);
    Vue.component('BaseIcon', BaseIcon);
    Vue.component('BaseInput', BaseInput);
    Vue.component('BaseCounter', BaseCounter);
    Vue.component('BaseTextarea', BaseTextarea);
    Vue.component('Base3DotsMenu', Base3DotsMenu);
    Vue.component('BaseItemList', BaseItemList);
    Vue.component('BaseItem', BaseItem);
    //common
    Vue.component('Header', Header);
    //modules
    Vue.component('SurveyBuilder', SurveyBuilder);
    Vue.component('SurveyResults', SurveyResults);
    Vue.component('SurveyPreview', SurveyPreview);
  }
}