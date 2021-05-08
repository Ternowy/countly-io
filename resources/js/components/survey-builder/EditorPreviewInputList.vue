<template>
  <draggable v-bind="$attrs" v-on="$listeners">
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
};
</script>

<style scoped>

</style>
