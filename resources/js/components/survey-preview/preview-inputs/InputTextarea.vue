<template>
  <base-textarea v-bind="Object.assign({}, $attrs, $props, {rules: vRules})" :maxlength="vRules.max" v-on="$listeners">
    <base-counter :limit="vRules.max" :value="value.length"/>
  </base-textarea>
</template>

<script>
export default {
  name: 'InputTextarea',
  props: {
    required: Boolean,
    value: String
  },
  computed: {
    vRules() {
      return {
        required: this.required,
        max: 1000,
      };
    },
  },
};
</script>

<style scoped>

</style>