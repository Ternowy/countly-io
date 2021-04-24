<template>
  <component :is="iconName" v-bind="$attrs"/>
</template>

<script>
import IconQuit from './all/IconQuit';
import IconPlus from './all/IconPlus';
import IconPen from './all/IconPen';
import IconTrash from './all/IconTrash';
import IconAddForm from './all/IconAddForm';

export default {
  name: 'BaseIcon',
  components: {
    IconQuit,
    IconPlus,
    IconPen,
    IconTrash,
    IconAddForm
  },
  props: {
    name: {
      type: String,
      required: true
    }
  },
  computed: {
    iconName() {
      return `icon-${this.name}`
    }
  }
};
</script>

<style scoped>

</style>