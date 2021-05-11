<template>
  <input-base :label="label" :name="name" :rules="rules" :rules-messages="rulesMessages" class="checkbox-group">
    <base-checkbox v-for="(option, index) in options" :key="index" v-model="vValue"
                   :item-value="option" :label="option"
    />
  </input-base>
</template>

<script>
import InputBase from './InputBase';
import BaseCheckbox from './BaseCheckbox';

export default {
  components: {InputBase, BaseCheckbox},
  props: {
    name: String,
    value: [Array, Object],
    options: {
      type: Array,
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
};
</script>
