<template>
  <validation-provider ref="provider" v-slot="{ errors }" :custom-messages="rulesMessages"
                       :name="name" :rules="rules" tag="div" class="w-full"
  >
    <label v-if="label" :class="{error: errors.length > 0}">
      {{ label }}
    </label>
    <slot v-bind="{ errors }"/>
  </validation-provider>
</template>

<script>
export default {
  name: 'InputBase',
  props: {
    name: String,
    label: String,
    rules: {
      type: Object,
      default: () => ({}),
    },
    rulesMessages: {
      type: Object,
      default: () => ({}),
    },
  },
  methods: {
    validate() {
      return this.$refs.provider.validate();
    }
  }
};
</script>

<style scoped>

</style>
