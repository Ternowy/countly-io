<template>
  <base-textarea v-bind="Object.assign({}, $attrs, $props, {rules: vRules})" :maxlength="vRules.max"
                 class="w-full flex good-shadow rounded-lg px-4 py-2 text-gray-600 font-light text-base"
                 v-on="$listeners"
  >
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
