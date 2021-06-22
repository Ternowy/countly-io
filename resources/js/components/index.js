import BaseHeader from './common/BaseHeader';
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
import BaseItemList from './base/info/BaseItemList';
import BaseItem from './base/info/BaseItem';
import BasePopover from './base/interactive/BasePopover';
import BaseInteractiveButton from './base/buttons/BaseInteractiveButton';
import UserPicture from './common/UserPicture';
import HeaderLogo from './common/HeaderLogo';
import BaseModal from './base/modals/BaseModal';
import ConfirmationModal from './common/ConfirmationModal';
import SurveyList from './SurveyList';
import BaseSelect from './base/inputs/BaseSelect';
import BaseOptions from './base/inputs/BaseOptions';
import BarChart from './base/info/charts/BarChart';
import TextualChart from './base/info/charts/TextualChart';
import SurveyLimit from './common/SurveyLimit';
import BaseSwitch from './base/inputs/BaseSwitch';
import HomePage from './HomePage';
import SurveyNotFound from './survey-preview/SurveyNotFound';

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
    Vue.component('BaseItemList', BaseItemList);
    Vue.component('BaseItem', BaseItem);
    Vue.component('BasePopover', BasePopover);
    Vue.component('BaseInteractiveButton', BaseInteractiveButton);
    Vue.component('BaseModal', BaseModal);
    Vue.component('BaseSelect', BaseSelect);
    Vue.component('BaseOptions', BaseOptions);
    Vue.component('BarChart', BarChart);
    Vue.component('TextualChart', TextualChart);
    Vue.component('BaseSwitch', BaseSwitch);
    //common
    Vue.component('BaseHeader', BaseHeader);
    Vue.component('HeaderLogo', HeaderLogo);
    Vue.component('UserPicture', UserPicture)
    Vue.component('ConfirmationModal', ConfirmationModal);
    Vue.component('SurveyLimit', SurveyLimit);
    //modules
    Vue.component('SurveyBuilder', SurveyBuilder);
    Vue.component('SurveyResults', SurveyResults);
    Vue.component('SurveyPreview', SurveyPreview);
    Vue.component('SurveyList', SurveyList);

    Vue.component('SurveyNotFound', SurveyNotFound);
    //Home
    Vue.component('HomePage', HomePage);
  },
};
