<template>
  <input-base v-bind="$attrs" :name="name">
    <checkbox-group v-if="multiple" :options="options" :value="value" @input="onChange"/>
    <radio-group v-else :options="options" :value="value" @input="onChange"/>
  </input-base>
</template>

<script>
import CheckboxGroup from './CheckboxGroup';
import RadioGroup from './RadioGroup';

export default {
  name: 'BaseOptions',
  components: {RadioGroup, CheckboxGroup},
  props: {
    name: String,
    options: Array,
    multiple: {
      type: Boolean,
      default: false,
    },
    value: [String, Array],
  },
  emits: ['input'],
  methods: {
    onChange(value) {
      this.$emit('input', value);
    }
  },
};
</script>