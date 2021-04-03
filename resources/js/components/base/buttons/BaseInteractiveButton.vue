<template>
  <button v-bind="$attrs">
    <slot>
      {{ label }}
    </slot>
  </button>
</template>

<script>
export default {
  name: 'BaseInteractiveButton',
  props: {
    label: {
      type: String,
      default: 'This is a button'
    },
  }
};
</script>

<style scoped>

</style>