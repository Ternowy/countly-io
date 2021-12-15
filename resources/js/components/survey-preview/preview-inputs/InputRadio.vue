<template>
  <base-options v-bind="Object.assign({}, $attrs, validationData)" :options="options"
                v-on="$listeners"
  />
</template>

<script>
export default {
  name: 'InputRadio',
  props: {
    options: Array,
    required: Boolean
  },
  computed: {
    validationData() {
      return {
        rules: {
          required: this.required,
          oneOf: this.options
        },
        rulesMessages: {
          required: 'This field is required',
          oneOf: 'Valid option must be selected'
        }
      };
    },
  }
};
</script>

<style scoped>

</style>