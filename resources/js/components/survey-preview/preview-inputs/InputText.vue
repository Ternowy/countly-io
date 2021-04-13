<template>
  <base-input v-bind="Object.assign({}, $attrs, $props, {rules: vRules})" :maxlength="vRules.max" v-on="$listeners">
    <base-counter :limit="vRules.max" :value="vLength"/>
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
    vLength() {
      return this.value ? this.value.length : 0;
    }
  },
};
</script>

<style scoped>

</style>