<template>
  <validation-observer ref="form" v-bind="$attrs" tag="form"
                       v-slot="{valid, errors}"
                       class="flex flex-col content-center justify-center items-center"
                       v-on="$listeners"
  >
    <slot v-bind="{valid, errors}"/>
  </validation-observer>
</template>

<script>
export default {
  name: 'Preview',
  methods: {
    validate() {
      return this.$refs.form.validateWithInfo();
    },
  },
};
</script>

<style scoped>

</style>
