<template>
  <validation-observer ref="form" v-bind="$attrs" tag="form" v-on="$listeners">
    <slot/>
  </validation-observer>
</template>

<script>
export default {
  name: 'Preview',
  methods: {
    validate() {
      return this.$refs.form.validate();
    },
  },
};
</script>

<style scoped>

</style>