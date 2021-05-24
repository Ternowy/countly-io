<template>
  <base-input v-bind="Object.assign({}, $attrs, validationData)" :maxlength="validationData.rules.max"
              :value="value"
              :classes="['w-full good-shadow rounded-lg px-4 py-2 text-gray-600 font-light text-base']"
              :input-classes="vClasses"
              v-on="$listeners"
  >
    <base-counter :limit="validationData.rules.max" :value="vLength"/>
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
    validationData() {
      return {
        rules: {
          required: this.required,
          max: 100
        },
        rulesMessages: {
          required: 'This field is required',
          max: 'Must be not longer then 100 characters'
        }
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
