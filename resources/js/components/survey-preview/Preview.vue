<template>
  <validation-observer ref="form" tag="form">
    <slot/>
  </validation-observer>
</template>

<script>
export default {
  name: 'Preview',
  methods: {
    validate() {
      return this.$refs.form.validate();
    }
  }
};
</script>

<style scoped>

</style>