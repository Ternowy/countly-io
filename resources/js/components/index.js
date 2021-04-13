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
import HeaderUserPicture from './common/HeaderUserPicture';
import HeaderLogo from './common/HeaderLogo';
import BaseModal from './base/modals/BaseModal';
import ConfirmationModal from './common/ConfirmationModal';
import SurveyList from './SurveyList';
import BaseSelect from './base/inputs/BaseSelect';
import BaseOptions from './base/inputs/BaseOptions';
import ColumnarChart from './base/info/charts/ColumnarChart';
import TextualChart from './base/info/charts/TextualChart';

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
    Vue.component('ColumnarChart', ColumnarChart);
    Vue.component('TextualChart', TextualChart);
    //common
    Vue.component('BaseHeader', BaseHeader);
    Vue.component('HeaderLogo', HeaderLogo);
    Vue.component('HeaderUserPicture', HeaderUserPicture)
    Vue.component('ConfirmationModal', ConfirmationModal);
    //modules
    Vue.component('SurveyBuilder', SurveyBuilder);
    Vue.component('SurveyResults', SurveyResults);
    Vue.component('SurveyPreview', SurveyPreview);
    Vue.component('SurveyList', SurveyList);
  },
};