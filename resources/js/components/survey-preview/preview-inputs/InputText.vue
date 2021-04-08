<template>
  <base-input v-bind="Object.assign({}, $attrs, $props, {rules: vRules})" :maxlength="vRules.max" v-on="$listeners">
    <base-counter :limit="vRules.max" :value="value.length"/>
  </base-input>
</template>

<script>
export default {
  name: 'InputText',
  props: {
    required: Boolean,
    value: String,
  },
  computed: {
    vRules() {
      return {
        required: this.required,
        max: 100
      };
    },
  },
};
</script>

<style scoped>

</style>