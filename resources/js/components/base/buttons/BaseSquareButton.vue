<template>
  <div class="button" :class="classes">
    <slot>
      <base-icon v-if="icon" :name="icon"/>
    </slot>
  </div>
</template>

<script>
export default {
  name: 'BaseSquareButton',
  props: {
    icon: String,
    selected: Boolean
  },
  computed: {
    classes() {
      let classes = [];

      if (this.selected) {
        classes.push('selected')
      }

      return classes;
    }
  }
};
</script>

<style lang="scss" scoped>
.button {
  height: 30px;
  width: 30px;

  .selected {
    background-color: #1a202c;
  }
}
</style>