<template>
  <button v-bind="$attrs">
    <slot>
      {{ label }}
    </slot>
  </button>
</template>

<script>
export default {
  name: 'BaseButton',
  props: {
    label: {
      type: String,
      default: 'This is a button'
    },
    color: {
      type: String,
      default: 'green',
      validator: (value) => ['green', 'gray', 'red'].includes(value)
    }
  }
};
</script>

<style scoped>

</style>