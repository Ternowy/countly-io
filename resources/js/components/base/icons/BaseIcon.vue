<template>
  <component :is="iconName" :height="height" :width="width" :fill="fill"/>
</template>

<script>
import Chart from './individualIcons/Chart';
import Dots from './individualIcons/Dots';
import Exit from './individualIcons/Exit';
import Form from './individualIcons/Form';
import Pen from './individualIcons/Pen';
import Person from './individualIcons/Person';
import Plus from './individualIcons/Plus';
import Trash from './individualIcons/Trash';
export default {
  name: 'BaseIcons',
  components: {
    Chart,
    Dots,
    Exit,
    Form,
    Pen,
    Person,
    Plus,
    Trash,
  },
  props: {
    fill: {
      type: String,
      default: 'brown',
    },
    icon: {
      type: String,
      required: true,
    },
    height: Number,
    width: Number,
  },
  computed: {
    iconName() {
      return this.icon[0].toUpperCase() + this.icon.slice(1);
    },
  },
};
</script>

<style lang="scss" scoped>
@media (max-width: 560px) {
    svg {
        height: 14px;
        width: auto;
    }
}
</style>
