<template>
  <base-textarea v-bind="Object.assign({}, $attrs, validationData)" :maxlength="validationData.rules.max"
                 :value="value"
                 :classes="['w-full flex flex-col good-shadow rounded-lg px-4 py-2 text-gray-600 font-light text-base']"
                 v-on="$listeners"
  >
    <base-counter :limit="validationData.rules.max" :value="vLength"/>
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
    validationData() {
      return {
        rules: {
          required: this.required,
          max: 1000
        },
        rulesMessages: {
          required: 'This field is required',
          max: 'Must be not longer then 1000 characters'
        }
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
