<template>
  <div class="checkbox-group">
    <base-checkbox v-for="(option, index) in options" :key="index" v-model="vValue" :name="name"
                   :item-value="option" :label="option"
    />
  </div>
</template>

<script>
import BaseCheckbox from './BaseCheckbox';

export default {
  components: {BaseCheckbox},
  props: {
    name: String,
    value: [Array, Object],
    options: {
      type: Array,
      required: true,
    },
    label: String,
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
