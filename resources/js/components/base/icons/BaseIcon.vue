<template>
  <component :is="iconName" v-bind="$attrs"/>
</template>

<script>
import IconQuit from './all/IconQuit';
import IconPlus from './all/IconPlus';
import IconPen from './all/IconPen';
import IconTrash from './all/IconTrash';
import IconAddForm from './all/IconAddForm';
import IconStats from './all/IconStats';
import IconPerson from './all/IconPerson';
import IconLeftArrow from './all/IconLeftArrow';
import IconInputCheckbox from './all/IconInputCheckbox';
import IconInputRadio from './all/IconInputRadio';
import IconInputSelect from './all/IconInputSelect';
import IconInputText from './all/IconInputText';
import IconInputTextarea from './all/IconInputTextarea';
import IconVerticalDots from './all/IconVerticalDots';
import IconCopy from './all/IconCopy';

export default {
  name: 'BaseIcon',
  components: {
    IconQuit,
    IconPlus,
    IconPen,
    IconTrash,
    IconAddForm,
    IconStats,
    IconPerson,
    IconLeftArrow,
    IconInputCheckbox,
    IconInputRadio,
    IconInputSelect,
    IconInputText,
    IconInputTextarea,
    IconVerticalDots,
    IconCopy
  },
  props: {
    name: {
      type: String,
      required: true
    }
  },
  computed: {
    iconName() {
      return `icon-${this.name}`;
    }
  }
};
</script>

<style scoped>

</style>
