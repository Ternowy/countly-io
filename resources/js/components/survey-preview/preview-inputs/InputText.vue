<template>
  <base-input v-bind="Object.assign({}, $attrs, {rules: vRules})" v-on="$listeners"/>
</template>

<script>
export default {
  name: 'InputText',
  props: {
    required: Boolean,
  },
  computed: {
    vRules() {
      return {
        'required': this.required,
      };
    },
  },
};
</script>

<style scoped>

</style>