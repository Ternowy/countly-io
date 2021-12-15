<template>
  <draggable v-bind="$attrs" v-on="$listeners" :handle="handle">
    <transition-group>
      <slot/>
    </transition-group>
  </draggable>
</template>

<script>
import draggable from 'vuedraggable';

export default {
  name: 'EditorPreviewInputList',
  components: {
    draggable
  },
  props: {
    handle: {
      type: String,
      default: '.handle'
    }
  }
};
</script>

<style scoped>

</style>
