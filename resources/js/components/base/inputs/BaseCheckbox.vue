<template>
  <input-base :name="name" :rules="rules" :rules-messages="rulesMessages" class="form-checkbox">
    <input ref="checkbox" v-model="vValue" :value="itemValue" hidden type="checkbox">
    <label @click="onLabelClick" v-html="label"/>
  </input-base>
</template>

<script>
import InputBase from './InputBase';

export default {
  name: 'BaseCheckbox',
  components: {InputBase},
  props: {
    name: String,
    value: [Array, Object],
    itemValue: {
      type: [String, Boolean, Number],
      required: true,
    },
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
  emits: ['input'],
  computed: {
    vValue: {
      get() {
        return this.value;
      },
      set(newVal) {
        this.$emit('input', newVal);
      },
    },
  },
  methods: {
    onLabelClick() {
      this.$refs.checkbox.click();
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
