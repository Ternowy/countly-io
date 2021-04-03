<template>
  <div>
    {{ value }} / {{ limit }}
  </div>
</template>

<script>
export default {
  name: 'BaseCounter',
  props: {
    limit: {
      type: Number,
      default: 200
    },
    value: {
      type: Number,
      default: 0
    }
  }
};
</script>

<style scoped>

</style>