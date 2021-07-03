<template>
  <component :is="iconName" v-bind="Object.assign({}, $attrs, sizes)" :class="classes"/>
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
import IconDrag from './all/IconDrag';
import IconCloudCheckmark from './all/IconCloudCheckmark';
import IconCloudUpload from './all/IconCloudUpload';
import IconAlert from './all/IconAlert';

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
    IconCopy,
    IconDrag,
    IconCloudCheckmark,
    IconCloudUpload,
    IconAlert
  },
  props: {
    name: {
      type: String,
      required: true,
    },
    size: {
      type: String,
      default: 'medium',
      validator: value => ['small', 'medium', 'large'].includes(value)
    },
    clickable: Boolean,
  },
  computed: {
    iconName() {
      return `icon-${this.name}`;
    },
    sizes() {
      const sizes = {
        small: {
          height: 15,
          width: 15,
        },
        medium: {
          height: 18,
          width: 18,
        },
        large: {
          height: 25,
          width: 25,
        },
      };

      return sizes[this.size];
    },
    classes() {
      let classes = [];

      if (this.clickable) {
        classes.push('cursor-pointer');
      }

      return classes;
    },
  },
};
</script>
