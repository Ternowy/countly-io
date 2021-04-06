<template>
  <input-base :name="name" v-bind="$attrs">

  </input-base>
</template>

<script>
export default {
  name: 'BaseOptions',
  props: {
    name: String,
    options: Array,
    multiple: {
      type: Boolean,
      default: false
    }
  }
};
</script>

<style scoped>

</style>