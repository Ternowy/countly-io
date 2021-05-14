<template>
  <base-input v-bind="Object.assign({}, $attrs, $props, {rules: vRules})" :maxlength="vRules.max"
              class="w-full good-shadow rounded-lg px-4 py-2 text-gray-600 font-light text-base"
              :input-classes="vClasses"
              v-on="$listeners"
  >
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
    },
    vClasses() {
      return [];
    }
  },
};
</script>

<style scoped>

</style>
