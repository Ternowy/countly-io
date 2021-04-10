<template>
  <base-textarea v-bind="Object.assign({}, $attrs, $props, {rules: vRules})" :maxlength="vRules.max" v-on="$listeners">
    <base-counter :limit="vRules.max" :value="vLength"/>
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
    vLength() {
      return this.value ? this.value.length : 0;
    }
  },
};
</script>

<style scoped>

</style>