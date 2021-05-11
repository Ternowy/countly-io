<template>
  <base-select v-bind="Object.assign({}, $attrs, {rules: vRules})" :options="options"
               v-on="$listeners"
  />
</template>

<script>
export default {
  name: 'InputSelect',
  props: {
    options: Array,
    required: Boolean
  },
  computed: {
    vRules() {
      return {
        oneOf: this.options,
        required: this.required
      };
    }
  }
};
</script>

<style scoped>

</style>
